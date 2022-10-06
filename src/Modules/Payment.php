<?php

namespace Digipeopleinc\Faker\Modules;

use Digipeopleinc\Faker\Helpers\Random;
use Digipeopleinc\Faker\Helpers\Strings;
use DateTime;
use Exception;

class Payment extends AbstractModule
{
    /**
     * Получить данные по кредитным картам
     * @param string $type
     * @return array
     */
    private function getCreditCardsData(string $type = ""): array
    {
        return $this->getCachedResourceMixed("creditCards", $type);
    }

    /**
     * Тип кредитной карты (например: Visa, Mir и т.д.)
     * @return string
     * @throws Exception
     */
    public function creditCardType(): string
    {
        $resource = array_keys($this->getResourceByKey("creditCards") ?? []);
        if (empty($resource)) {
            throw new Exception("Данные о кредитных картах отсутствуют");
        }
        return $resource[array_rand($resource)];
    }

    /**
     * Номер кредитной карты
     * @param string $type - тип кредитной карты (например: Visa, Mir и т.д.)
     * @return string
     * @throws Exception
     */
    public function creditCardNumber(string $type = ""): string
    {
        $resource = $this->getCreditCardsData($type);
        return $this->getGenerator()->maskLocalized($resource[array_rand($resource)]);
    }

    /**
     * Дата годности кредитной карты
     * @param string $format - формат, по умолчанию m/y
     * @param string|null $fromDate - дата от
     * @param string|null $toDate - дата до
     * @return string
     */
    public function creditCardExpiration(string $format = "m/y", ?string $fromDate = null, ?string $toDate = null): string
    {
        $from = new DateTime();
        $to = new DateTime();
        if (!is_null($fromDate)) {
            $from->modify($fromDate);
        }
        $to->modify($toDate ?? "+36 months");
        return date($format, rand($from->getTimestamp(), $to->getTimestamp()));
    }

    /**
     * Дата просроченной кредитной карты
     * @param string $format - формат, по умолчанию m/y
     * @return string
     */
    public function creditCardExpirationExpired(string $format = "m/y"): string
    {
        return $this->creditCardExpiration(format: $format, fromDate: "-60 months", toDate: "-1 month");
    }

    /**
     * @throws Exception
     */
    public function creditCardPerson(int $gender = Text::GENDER_MALE | Text::GENDER_FEMALE): string
    {
        return Strings::transliterate($this->getGenerator()->person("{FName} {LName}", $gender));
    }

    /**
     * Генерация названия банка
     * @return string
     * @throws Exception
     */
    public function bankName(): string
    {
        $templates = $this->getResourceByKey("bankNameTemplates") ?? [];
        $names = $this->getResourceByKey("bankNames") ?? [];
        if (empty($templates)) {
            throw new Exception("Шаблоны названий банков не найдены");
        }
        if (empty($names)) {
            throw new Exception("Элементы названий банков не найдены");
        }
        $result = $templates[array_rand($templates)];
        return preg_replace_callback(
            '/{[A-z]+}/m', function ($matches) use ($names) {
                $match = reset($matches);
                $match = str_replace(["{", "}"], "", $match);
                return array_key_exists($match, $names) ? $names[$match][array_rand($names[$match])] : "";
            }, $result
        );
    }

    /**
     * Идентификатор участника финансовых расчётов
     * @throws Exception
     */
    public function swiftBic(): string
    {
        return $this->getGenerator()->regexp("^([A-Z]){4}([A-Z]){2}([0-9A-Z]){2}([0-9A-Z]{3})?$");
    }

    /**
     * Код региона
     * @return string
     */
    public function regionCode(): string
    {
        return sprintf("%02d", rand(1, 92));
    }

    /**
     * Актуальный год регистрации
     * @return string
     */
    public function registrationYear(): string
    {
        return sprintf("%02d", rand(1, (int)date("y")));
    }

    /**
     * ИНН компании
     * @return string
     * @throws Exception
     */
    public function innCompany(): string
    {
        $region = $this->regionCode();
        $number = $this->getGenerator()->digitMaskNotZero("##").
            $this->getGenerator()->digitMaskNotZero("#####");
        $result = $region.$number;
        $check = ((
            2*$result[0] + 4*$result[1] + 10*$result[2] +
            3*$result[3] + 5*$result[4] + 9*$result[5] +
            4*$result[6] + 6*$result[7] + 8*$result[8]
        ) % 11) % 10;
        return $result.$check;
    }

    /**
     * ИНН физического лица
     * @return string
     * @throws Exception
     */
    public function innPersonal(): string
    {
        $region = $this->regionCode();
        $number = $this->getGenerator()->digitMaskNotZero("##").
            $this->getGenerator()->digitMaskNotZero("######");
        $result = $region.$number;
        $check1 = ((
            7*$result[0] + 2*$result[1] + 4*$result[2] +
            10*$result[3] + 3*$result[4] + 5*$result[5] +
            9*$result[6] + 4*$result[7] + 6*$result[8] +
            8*$result[9]
        ) % 11) % 10;
        $result .= $check1;
        $check2 = ((
            3*$result[0] +  7*$result[1] + 2*$result[2] +
            4*$result[3] + 10*$result[4] + 3*$result[5] +
            5*$result[6] +  9*$result[7] + 4*$result[8] +
            6*$result[9] +  8*$result[10]
        ) % 11) % 10;
        return $result.$check2;
    }

    /**
     * КПП
     * @return string
     * @throws Exception
     */
    public function kpp(): string
    {
        $region = $this->regionCode();
        $number = $this->getGenerator()->digitMaskNotZero("##");
        return $region.$number.match(rand(0, 3)){
            1 => "43",
            2 => "44",
            3 => "45",
            default => "01"
        }.$this->getGenerator()->digitMaskNotZero("###");
    }

    /**
     * Номер ОГРН
     * @return string
     * @throws Exception
     */
    public function ogrn(): string
    {
        $type = rand(1, 9);
        $year = $this->registrationYear();
        $region = $this->regionCode();
        $number = $this->getGenerator()->digitMaskNotZero("##").
            $this->getGenerator()->digitMaskNotZero("#####");
        $result = $type.$year.$region.$number;
        $result .= ((int)$result % 11) % 10;
        return $result;
    }

    /**
     * Номер ОГРНИП
     * @return string
     */
    public function ogrnIp(): string
    {
        $type = 3;
        $year = $this->registrationYear();
        $region = $this->regionCode();
        $number = $this->getGenerator()->digitMaskNotZero("##").
            $this->getGenerator()->digitMaskNotZero("#######");
        $result = $type.$year.$region.$number;
        $result .= ((int)$result % 13) % 10;
        return $result;
    }

    /**
     * СНИЛС
     * @return string
     * @throws Exception
     */
    public function snils(): string
    {
        $firstNumber = sprintf("%03d", rand(2, 999));
        $result = $firstNumber.
            $this->getGenerator()->digitMaskNotZero("###").
            $this->getGenerator()->digitMaskNotZero("###");
        $check = 9*$result[0] + 8*$result[1] + 7*$result[2] +
            6*$result[3] + 5*$result[4] + 4*$result[5] +
            3*$result[6] + 2*$result[7] + 1*$result[8];
        $check = match(true) {
            $check > 101 => ($check % 101) > 99 ? "00" : sprintf("%02d", $check % 101),
            $check < 100 => $check,
            default => "00"
        };
        return $result.$check;
    }

    /**
     * Сгенерировать БИК
     * @return string
     * @throws Exception
     */
    public function bik(): string
    {
        return Random::elementFromArray([0, 1, 2]).$this->getGenerator()->digitMaskNotZero("########");
    }

    /**
     * @param string $bik
     * @return void
     * @throws Exception
     */
    public function validateBik(string $bik): void
    {
        if (preg_match('/\D/', $bik)) {
            throw new Exception("БИК может состоять только из цифр");
        } elseif (strlen($bik) !== 9) {
            throw new Exception("БИК может состоять только из 9 цифр");
        }
    }

    /**
     * Получить контрольное число для проверочного номера расчетного/корреспондентского счета в виде строки
     * @param string $numberToCheck - проверочный к/с или р/с
     * @return string
     * @throws Exception
     */
    public function getAccountNumberCheckDigit(string $numberToCheck): string
    {
        if (strlen($numberToCheck) != 23) {
            throw new Exception("Номер проверочного счета должен быть длинной 23");
        }
        return (string)((($numberToCheck[0]*7 + $numberToCheck[1]*1 + $numberToCheck[2]*3 +
            $numberToCheck[3]*7 + $numberToCheck[4]*1 + $numberToCheck[5]*3 +
            $numberToCheck[6]*7 + $numberToCheck[7]*1 + $numberToCheck[8]*3 +
            $numberToCheck[9]*7 + $numberToCheck[10]*1 + 0*3 +
            $numberToCheck[12]*7 + $numberToCheck[13]*1 + $numberToCheck[14]*3 +
            $numberToCheck[15]*7 + $numberToCheck[16]*1 + $numberToCheck[17]*3 +
            $numberToCheck[18]*7 + $numberToCheck[19]*1 + $numberToCheck[20]*3 +
            $numberToCheck[21]*7 + $numberToCheck[22]*1) % 10) * 3);
    }

    /**
     * Корреспондентский счёт
     * @param string|null $bik - БИК (если не указано - случайный)
     * @return string
     * @throws Exception
     */
    public function correspondentAccount(?string $bik = null): string
    {
        if (is_null($bik)) {
            $bik = $this->bik();
        } else {
            $this->validateBik($bik);
        }
        $result = "30101".$this->getGenerator()->digitMaskNotZero("###X########").substr($bik, -3);
        $numberToCheck = "0".$bik[4].$bik[5].$result;
        $check = $this->getAccountNumberCheckDigit($numberToCheck);
        return str_replace("X", $check[-1], $result);
    }

    /**
     * Расчетный счёт
     * @param string|null $bik - БИК (если не указано - случайный)
     * @return string
     * @throws Exception
     */
    public function checkingAccount(?string $bik = null): string
    {
        if (is_null($bik)) {
            $bik = $this->bik();
        } else {
            $this->validateBik($bik);
        }
        $result = Random::elementFromArray(["407","408","420","421","422","423"]).
            Random::elementFromArray(["01","02","03"]).
            Random::elementFromArray(["810","840","978"]).
            "X".
            $this->getGenerator()->digitMaskNotZero("####").
            $this->getGenerator()->digitMaskNotZero("#######");
        $numberToCheck = $bik[6].$bik[7].$bik[8].$result;
        $check = $this->getAccountNumberCheckDigit($numberToCheck);
        return str_replace("X", $check[-1], $result);
    }
}
