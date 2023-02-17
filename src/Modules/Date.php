<?php

namespace Digipeopleinc\Faker\Modules;

use DateTime;
use DateTimeZone;
use Exception;

class Date extends AbstractModule
{
    protected static array $formats = [];

    /**
     * Получить формат по умолчанию
     * @param string $type
     * @return string
     */
    private function getFormat(string $type): string
    {
        if (array_key_exists($type, self::$formats)) {
            return self::$formats[$type];
        }
        $cacheType = "defaultFormats";
        $cache = $this->getCache($cacheType, $type);
        if (is_null($cache)) {
            $resource = $this->getResourceByKey($cacheType) ?? [];
            $this->setCacheItem($cacheType, $type, $resource[$type]);
        }
        return $this->getCache($cacheType, $type);
    }

    /**
     * Установить формат времени для инстанса
     * @param string $format
     * @return $this
     */
    public function setTimeFormat(string $format): self
    {
        self::$formats["time"] = $format;
        return $this;
    }

    /**
     * Сбросить инстансный формат для времени
     * @return $this
     */
    public function resetTimeFormat(): self
    {
        if (array_key_exists("time", self::$formats)) {
            unset(self::$formats["time"]);
        }
        return $this;
    }

    /**
     * Установить формат даты для инстанса
     * @param string $format
     * @return $this
     */
    public function setDateFormat(string $format): self
    {
        self::$formats["date"] = $format;
        return $this;
    }

    /**
     * Сбросить инстансный формат для даты
     * @return $this
     */
    public function resetDateFormat(): self
    {
        if (array_key_exists("date", self::$formats)) {
            unset(self::$formats["date"]);
        }
        return $this;
    }

    /**
     * Получить массив таймзон
     * @param string $type - тип таймзоны (примеры: africa, america, asia, europe и т.д.)
     * @return array
     */
    private function getTimeZonesByType(string $type = ""): array
    {
        return $this->getCachedResourceMixed("timeZones", $type);
    }

    /**
     * Форматировать дату
     * @param string $format - как у date(), но всё локализируется + добавлены: {F} - месяц в род. падеже, {M} - месяц (3 символа) в род. падеже
     * @param int $time - timestamp
     * @param string|DateTimeZone|null $timeZone - таймзона
     * @return string
     */
    public function formatTimestamp(string $format, int $time, string|DateTimeZone|null $timeZone = null): string
    {
        $format = str_replace([
            "D", "l", "{F}", "{M}", "F", "M",
        ], [
            "{%0%}", "{%1%}", "{%2%}", "{%3%}", "{%4%}", "{%5%}"
        ], $format);
        $date = new DateTime();
        $date->setTimestamp($time);
        if (is_string($timeZone)) {
            $timeZone = new DateTimeZone($timeZone);
        }
        if (!is_null($timeZone)) {
            $date->setTimezone($timeZone);
        }
        $dayNum = $date->format("N");
        $monthNum = $date->format("n");
        $result = $date->format($format);
        $resource = $this->getResourceByKey("formatNames") ?? [];
        $result = preg_replace_callback(
            '/{%0%}/m', fn($match) => $resource["daysShort"][$dayNum] ?? "", $result
        );
        $result = preg_replace_callback(
            '/{%1%}/m', fn($match) => $resource["days"][$dayNum] ?? "", $result
        );
        $result = preg_replace_callback(
            '/{%2%}/m', fn($match) => $resource["monthGenitive"][$monthNum] ?? "", $result
        );
        $result = preg_replace_callback(
            '/{%3%}/m', fn($match) => $resource["monthGenitiveShort"][$monthNum] ?? "", $result
        );
        $result = preg_replace_callback(
            '/{%4%}/m', fn($match) => $resource["month"][$monthNum] ?? "", $result
        );
        $result = preg_replace_callback(
            '/{%5%}/m', fn($match) => $resource["monthShort"][$monthNum] ?? "", $result
        );
        if (str_starts_with($result, "!!!")) {
            $result = mb_strtolower(str_replace("!!!", "", $result));
        }
        return $result;
    }

    /**
     * Случайно количество секунд в int
     * @return int
     */
    public function randomSeconds(): int
    {
        return rand(0,59);
    }

    /**
     * Случайное количество минут
     * @return int
     */
    public function randomMinutes(): int
    {
        return 60 * rand(0,60);
    }

    /**
     * Случайное количество часов
     * @param int $min - минимальный час для случайной выборки
     * @param int $max - максимальный час для случайной выборки
     * @return int
     */
    public function randomHours(int $min = 0, int $max = 24): int
    {
        return 3600 * rand($min, $max);
    }

    /**
     * Случайная дата в указанном формате
     * @param string|null $format - формат времени (см. у date() для времени)
     * @param int $minHour - минимальный случайный час
     * @param int $maxHour - максимальный случайный час
     * @return string
     */
    public function time(?string $format = null, int $minHour = 0, int $maxHour = 24): string
    {
        return $this->formatTimestamp($format ?? $this->getFormat("time"), rand(3600 * $minHour, 3600 * $maxHour));
    }

    /**
     * Случайное рабочее время
     * @param string|null $format - формат (см formatTimestamp())
     * @return string
     */
    public function workTime(?string $format = null): string
    {
        return $this->time($format ?? $this->getFormat("time"), minHour: 9, maxHour: 18);
    }

    /**
     * Случайная дата с указанием пределов дат в любом формате (timestamp, "modify", DateTime)
     * @param string|null $format - формат (см formatTimestamp())
     * @param int|string|DateTime|null $dateFrom - дата от
     * @param int|string|DateTime|null $dateTo - дата до
     * @param string|DateTimeZone|null $timeZone - таймзона
     * @return string
     */
    public function date(?string $format = null, int|string|DateTime|null $dateFrom = null, int|string|DateTime|null $dateTo = null, string|DateTimeZone|null $timeZone = null): string
    {
        $from = new DateTime();
        $to = new DateTime();
        if (is_null($dateFrom) && is_null($dateTo)) {
            $from->setTimestamp(0);
        }
        if (is_int($dateFrom)) {
            $from->setTimestamp($dateFrom);
        }
        if (is_string($dateFrom)) {
            $from->modify($dateFrom);
        }
        if ($dateFrom instanceof DateTime) {
            $from = $dateFrom;
        }
        if (is_int($dateTo)) {
            $to->setTimestamp($dateTo);
        }
        if (is_string($dateTo)) {
            $to->modify($dateTo);
        }
        if ($dateTo instanceof DateTime) {
            $to = $dateTo;
        }
        return $this->formatTimestamp($format ?? $this->getFormat("date"), rand($from->getTimestamp(), $to->getTimestamp()), $timeZone);
    }

    /**
     * Случайная дата в веке
     * @param string|null $format - формат (см formatTimestamp())
     * @param int|null $century - век, если не указано - текущий век
     * @param string|DateTimeZone|null $timeZone - таймзона
     * @return string
     */
    public function dateOfCentury(?string $format = null, ?int $century = null, string|DateTimeZone|null $timeZone = null): string
    {
        $centuryFrom = !empty($century) ? $century - 1 : ceil((int)date("Y")/100) - 1;
        $centuryTo = $centuryFrom + 1;
        $from = new DateTime();
        $from->setDate($centuryFrom*100, 1, 1)->setTime(0, 0);
        $to = new DateTime();
        $to->setDate(($centuryTo*100)-1, 12, 31)->setTime(23, 59, 59);
        return $this->formatTimestamp($format ?? $this->getFormat("date"), rand($from->getTimestamp(), $to->getTimestamp()), $timeZone);
    }

    /**
     * Случайная дата декады века
     * @param string|null $format - формат (см formatTimestamp())
     * @param int|null $century - век (или текущий)
     * @param int|null $decade - декада века (или текущая)
     * @param string|DateTimeZone|null $timeZone - таймзона
     * @return string
     * @throws Exception
     */
    public function dateOfDecade(?string $format = null, ?int $century = null, ?int $decade = null, string|DateTimeZone|null $timeZone = null): string
    {
        $currentCentury = ceil((int)date("Y")/100);
        if (!is_null($century) && is_null($decade) && $century != $currentCentury) {
            throw new Exception("Не указана декада лет не текущего века");
        }
        if (is_null($century)) {
            $century = $currentCentury;
        }
        if (is_null($decade)) {
            $decade = (int)((string)(ceil(date("Y")/10) * 10))[-2];
        }
        $from = new DateTime();
        $from->setDate((($century-1)*100)+(($decade-1)*10), 1, 1)->setTime(0, 0);
        $to = new DateTime();
        $to->setDate((($century-1)*100)+(($decade)*10)-1, 12, 31)->setTime(23, 59, 59);
        return $this->formatTimestamp($format ?? $this->getFormat("date"), rand($from->getTimestamp(), $to->getTimestamp()), $timeZone);
    }

    /**
     * Случайная дата года
     * @param string|null $format - формат (см formatTimestamp())
     * @param int|null $year - указанный год, либо текущий
     * @param string|DateTimeZone|null $timeZone - таймзона
     * @return string
     */
    public function dateOfYear(?string $format = null, ?int $year = null, string|DateTimeZone|null $timeZone = null): string
    {
        $year = $year ?? (int)date("Y");
        $from = new DateTime();
        $from->setDate($year, 1, 1)->setTime(0, 0);
        $to = new DateTime();
        $to->setDate($year, 12, 31)->setTime(23, 59, 59);
        return $this->formatTimestamp($format ?? $this->getFormat("date"), rand($from->getTimestamp(), $to->getTimestamp()), $timeZone);
    }

    /**
     * Случайная дата месяца
     * @param string|null $format - формат (см formatTimestamp())
     * @param int|null $month - месяц
     * @param int|null $year - год
     * @param string|DateTimeZone|null $timeZone - таймзона
     * @return string
     */
    public function dateOfMonth(?string $format = null, ?int $month = null, ?int $year = null, string|DateTimeZone|null $timeZone = null): string
    {
        $from = new DateTime();
        $from->setDate($year ?? (int)date("Y"), $month ?? (int)$month, 1);
        $from->modify("first day of this month");
        $to = (clone $from)->modify("last day of this month");
        return $this->formatTimestamp($format ?? $this->getFormat("date"), rand($from->getTimestamp(), $to->getTimestamp()), $timeZone);
    }

    /**
     * Сгенерировать случайную таймзону
     * @param string $type - тип таймзоны (примеры: africa, america, asia, europe и т.д.)
     * @return string
     * @throws Exception
     */
    public function timeZone(string $type = ""): string
    {
        $resource = $this->getTimeZonesByType($type) ?? [];
        if (empty($resource)) {
            throw new Exception("Список таймзон для выборки пуст");
        }
        return $resource[array_rand($resource)];
    }

    /**
     * Случайная дата ДР
     * @param string|null $format - формат (см formatTimestamp())
     * @param int $fromAge - минимальное кол-во лет
     * @param int $toAge - максимальное кол-во лет
     * @param string|DateTimeZone|null $timeZone - таймзона
     * @return string
     */
    public function birthDay(?string $format = null, int $fromAge = 0, int $toAge = 100, string|DateTimeZone|null $timeZone = null): string
    {
        $from = new DateTime();
        $to = new DateTime();
        if (!empty($fromAge)) {
            $to->modify("-$fromAge year");
        }
        if (!empty($toAge)) {
            $from->modify("-$toAge year");
        }
        return $this->formatTimestamp($format ?? $this->getFormat("date"), rand($from->getTimestamp(), $to->getTimestamp()), $timeZone);
    }
}
