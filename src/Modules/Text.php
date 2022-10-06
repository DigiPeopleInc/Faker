<?php

namespace Digipeopleinc\Faker\Modules;

use Digipeopleinc\Faker\Helpers\Random;
use Digipeopleinc\Faker\Helpers\Strings;
use Exception;
use ReflectionException;

class Text extends AbstractModule
{
    const LOWER_CASE = 0x1;
    const UPPER_CASE = 0x2;
    const LC_FIRST = 0x4;
    const UC_FIRST = 0x8;

    const GENDER_MALE = 0x1;
    const GENDER_FEMALE = 0x2;

    /**
     * Получить массив слов на тему, либо на любую тему
     * @param string $topic - тема слов (доступны: news, it)
     * @return array
     */
    private function getWordsByTopic(string $topic = ""): array
    {
        return $this->getCachedResourceMixed("wordsByTopic", $topic);
    }

    /**
     * Получить массив слов текста на тему, либо на любую тему
     * @param string $topic - тема
     * @param bool $unique - составлять уникальный словарь данных?
     * @return array
     */
    private function getTextByTopic(string $topic = "", bool $unique = false): array
    {
        $cacheType = "textsByTopicExploded".($unique ? "_unique" : "");
        $cache = $this->getCache($cacheType, $topic);
        if (is_null($cache)) {
            $resource = $this->getResourceByKey("textsByTopicExploded") ?? [];
            if (!empty($topic) && array_key_exists($topic, $resource)) {
                $this->setCacheItem($cacheType, $topic, $resource[$topic]);
            } else {
                $this->setCacheItem($cacheType, $topic, array_merge(...array_values($resource)));
            }
        }
        return $this->getCache($cacheType, $topic);
    }

    /**
     * Список букв
     * @return array
     */
    private function getAllLetters(): array
    {
        $cacheType = "letters";
        $cache = $this->getCache($cacheType, "all");
        if (is_null($cache)) {
            $this->setCacheItem($cacheType, "all", array_unique(array_merge(
                $this->getResourceByKey("upperCaseCharacters") ?? [],
                $this->getResourceByKey("lowerCaseCharacters") ?? [],
            )));
        }
        return $this->getCache($cacheType, "all");
    }

    /**
     * Список символов
     * @return array
     */
    private function getAllSymbols(): array
    {
        $cacheType = "symbols";
        $cache = $this->getCache($cacheType, "all");
        if (is_null($cache)) {
            $this->setCacheItem($cacheType, "all", array_unique(array_merge(
                $this->getResourceByKey("upperCaseCharacters") ?? [],
                $this->getResourceByKey("lowerCaseCharacters") ?? [],
                $this->getResourceByKey("numbers") ?? [],
                $this->getResourceByKey("symbols") ?? [],
            )));
        }
        return $this->getCache($cacheType, "all");
    }

    /**
     * Список данных по персонам
     * @param int $gender - пол Text::GENDER_MALE или Text::GENDER_FEMALE
     * @return array
     */
    private function getPersonData(int $gender = 0): array
    {
        $cacheType = "persons";
        $cache = $this->getCache($cacheType, $gender);
        if (is_null($cache)) {
            $resource = $this->getResourceByKey($gender === self::GENDER_MALE ? "malePersons" : "femalePersons") ?? [];
            $this->setCacheItem($cacheType, $gender, $resource);
        }
        return $this->getCache($cacheType, $gender);
    }

    /**
     * Обработка регистра строк
     * @param string $string
     * @param int  - флаги регистра Text::LOWER_CASE - нижний регистр, Text::UPPER_CASE - верхний регистр,
     * Text::LC_FIRST - первая буква в нижнем регистре, Text::UC_FIRST - первая буква в верхнем регистре
     * @return string
     */
    private function stringCase(string &$string, int $flags = 0): string
    {
        if (!empty($flags)) {
            if ($flags & self::LOWER_CASE) {
                $string = mb_strtolower($string);
            }
            if ($flags & self::UPPER_CASE) {
                $string = mb_strtoupper($string);
            }
            if ($flags & self::LC_FIRST) {
                $string = Strings::mb_lcfirst($string);
            }
            if ($flags & self::UC_FIRST) {
                $string = Strings::mb_ucfirst($string);
            }
        }
        return $string;
    }

    /**
     * Возвращает случайное число от 0 до 9
     *
     * @return int
     */
    public function digit() :int
    {
        return Random::oneDigit();
    }

    /**
     * Случайная буква Английского алфавита
     * @param float $capitalChance
     * @return string
     * @throws ReflectionException
     */
    public function englishLetter(float $capitalChance = 0) :string
    {
        return Random::oneEnglishLetter($capitalChance);
    }

    /**
     * Случайная буква в любом регистре
     * @param array $except - массив символов для исключения
     * @param int $flags - флаги регистра Text::LOWER_CASE - нижний регистр, Text::UPPER_CASE - верхний регистр, по умолчанию - все регистры
     * @return string
     * @throws Exception
     */
    public function char(array $except = [], int $flags = self::LOWER_CASE | self::UPPER_CASE): string
    {
        $resource = [];
        if ($flags & self::LOWER_CASE) {
            $resource = array_merge($resource, $this->getResourceByKey("lowerCaseCharacters") ?? []);
        }
        if ($flags & self::UPPER_CASE) {
            $resource = array_merge($resource, $this->getResourceByKey("upperCaseCharacters") ?? []);
        }
        if (!empty($except)) {
            $resource = array_diff($resource, $except);
        }
        return !empty($resource) ? $resource[array_rand($resource)] : throw new Exception("Список символов для выборки пуст");
    }

    /**
     * Случайная буква в верхнем регистре
     * @param array $except - массив символов для исключения
     * @return string
     * @throws Exception
     */
    public function charUpperCase(array $except = []): string
    {
        return $this->char(except: $except, flags: self::UPPER_CASE);
    }

    /**
     * Случайная буква в нижнем регистре
     * @param array $except - массив символов для исключения
     * @return string
     * @throws Exception
     */
    public function charLowerCase(array $except = []): string
    {
        return $this->char(except: $except, flags: self::LOWER_CASE);
    }

    /**
     * Выставить строку по маске
     * @param string $mask - шаблон маски
     * @param bool $localized - локализовать в зависимости от загруженной локали символ ?
     * @return string
     * @throws Exception
     */
    public function mask(string $mask = "", bool $localized = false): string
    {
        $result = "";
        foreach (mb_str_split($mask) as $char) {
            $result .= match($char) {
                "?" => $localized ? $this->char() : Random::oneEnglishLetter(),
                "#" => Random::oneDigit(),
                '*' => Random::oneAscii(),
                "&" => rand(0, 10)/10 >= 0.5 ? Random::oneDigit() : ($localized ? $this->char() : Random::oneEnglishLetter()),
                default => $char
            };
        }
        return $result;
    }

    /**
     * Только числовая маска, где результат никогда не может быть одними нулями
     * @param string $mask - строка маски, заменяемый символ только один - # - число от 0 до 9
     * @return string
     */
    public function digitMaskNotZero(string $mask = ""): string
    {
        $result = "";
        foreach (mb_str_split($mask) as $char) {
            $result .= match($char) {
                "#" => Random::oneDigit(),
                default => $char
            };
        }
        if ((int)$result < 1) {
            $result[-1] = 1;
        }
        return $result;
    }

    /**
     * Выставить строку по маске (локализованная версия - символ ? заменяется на случайную букву выбранной локали)
     * @param string $mask
     * @return string
     * @throws Exception
     */
    public function maskLocalized(string $mask = ""): string
    {
        return $this->mask(mask: $mask, localized: true);
    }

    /**
     * Случайное слово с возможностью задать тему
     * @param string $topic - тема случайного слова
     * @return string
     * @throws Exception
     */
    public function word(string $topic = ""): string
    {
        $resource = $this->getWordsByTopic(topic: $topic);
        return !empty($resource) ? $resource[array_rand($resource)] : throw new Exception("Список слов для выборки пуст");
    }

    /**
     * Несколько слов, не связанные никак
     * @param int $count - количество слов
     * @param int $flags - флаги регистра Text::LOWER_CASE - нижний регистр, Text::UPPER_CASE - верхний регистр,
     * Text::LC_FIRST - первая буква первого слово в нижнем регистре, Text::UC_FIRST - первая буква первого слова в верхнем регистре, по умолчанию - все в нижнем регистре
     * @param string $topic - тема слов
     * @return string
     */
    public function words(int $count = 2, int $flags = Text::LOWER_CASE, string $topic = ""): string
    {
        $result = [];
        $resource = $this->getWordsByTopic(topic: $topic);
        $wordsCount = 0;
        while ($wordsCount < $count) {
            if (!empty($resource)) {
                $randomWordKey = array_rand($resource);
                $result[] = $resource[$randomWordKey];
                unset($resource[$randomWordKey]);
            }
            $wordsCount++;
        }
        $result = implode(" ", $result);
        return $this->stringCase(string: $result, flags: $flags);
    }

    /**
     * Предложение из заданного количества слов, символов
     * @param int $maxWords - максимальное кол-во слов
     * @param int $maxChars - максимальное кол-во символов
     * @param string $topic - тема текста
     * @param bool $unique - использовать уникальные слова
     * @return string
     */
    public function sentence(int $maxWords = 10, int $maxChars = 100, string $topic = "", bool $unique = true): string
    {
        $result = [];
        $resource = $this->getTextByTopic(topic: $topic, unique: $unique) ?? [];
        if (!empty($resource)) {
            $charsCount = 0;
            $nearStart = 0;
            while (count($result) < $maxWords && $charsCount < $maxChars) {
                $wordKey = array_rand($resource);
                $word = $resource[$wordKey];
                $result[] = preg_replace('/[^\p{L}\p{N}\s,]/u', '', $word);
                unset($resource[$wordKey]);
                $nearStart++;
            }
        }
        $lastWordKey = count($result) - 1;
        $lastWord = $result[$lastWordKey];
        if (!str_ends_with($lastWord, ".") && !str_ends_with($lastWord, "!") && !str_ends_with($lastWord, "?")) {
            $lasts = [".", ".", ".", ".", "!", "?"];
            $result[$lastWordKey] .= $lasts[array_rand($lasts)];
        }
        return Strings::mb_ucfirst(mb_strtolower(implode(" ", $result)));
    }

    /**
     * Генерация псевдореалистичного текста
     * @param int $maxWords - ~максимальное кол-во слов
     * @param int $maxChars - ~максимальное кол-во символов
     * @param string $topic - тема текста
     * @param bool $searchForEndChar - искать ли принудительно окончание предложения?
     * @param int $searchWordsForUpperCaseLimit - максимальный разброс поиска слова, которое начинается с заглавной буквы
     * @return string
     */
    public function textReal(int $maxWords = 10, int $maxChars = 100, string $topic = "", bool $searchForEndChar = false, int $searchWordsForUpperCaseLimit = 30): string
    {
        $result = [];
        $resource = $this->getTextByTopic(topic: $topic) ?? [];
        $maxAllowedWords = count($resource);
        $nearWord = rand(0, $maxAllowedWords - $maxWords - $searchWordsForUpperCaseLimit);
        if ($nearWord < 0) {
            $nearWord = 0;
        }
        //Попытка найти символ с высшим регистром
        $searchUpperWordKey = $nearWord;
        while ($searchUpperWordKey < $nearWord + $searchWordsForUpperCaseLimit) {
            if (preg_match('/^\p{Lu}/u', $resource[$searchUpperWordKey])) {
                break;
            }
            $searchUpperWordKey++;
        }
        $wordsCount = 0;
        $charsCount = 0;
        $breakSearch = false;
        while (!$breakSearch) {
            if ($searchUpperWordKey >= $maxAllowedWords) {
                $searchUpperWordKey = 0;
            }
            $word = $resource[$searchUpperWordKey];
            $wordLength = mb_strlen($word);
            if ($wordsCount >= $maxWords && $charsCount >= $maxChars) {
                if ($searchForEndChar && !str_ends_with($word, ".") && !str_ends_with($word, "!") && !str_ends_with($word, ".")) {
                    $maxWords++;
                    $maxChars += $wordLength;
                } else {
                    $breakSearch = true;
                }
            }
            $wordsCount++;
            $charsCount += $wordLength;
            $result[] = $word;
            $searchUpperWordKey++;
        }
        return Strings::mb_ucfirst(implode(" ", $result));
    }

    /**
     * Абзац текста
     * @param int $maxWords - максимальное кол-во слов
     * @param string $topic - тема текста
     * @return string
     * @throws Exception
     */
    public function paragraph(int $maxWords = 10, string $topic = ""): string
    {
        if ($maxWords < 5) {
            throw new Exception("Количество слов не может быть меньше 5");
        }
        return $this->textReal(maxWords: $maxWords, maxChars: 1, topic: $topic, searchForEndChar: true);
    }

    /**
     * Regexp
     * @param string $string - строка регулярного выражения
     * @return string
     * @throws Exception
     */
    public function regexp(string $string): string
    {
        return Random::regexp($string);
    }

    /**
     * Локализированный Regexp
     * @param string $string - строка регулярного выражения
     * @return string
     * @throws Exception
     */
    public function regexpLocalized(string $string): string
    {
        return Random::regexp($string, fn() => Random::elementFromArray($this->getAllLetters()));
    }

    /**
     * Генерация true, false
     * @return bool
     */
    public function bool(): bool
    {
        return Random::bool();
    }

    /**
     * Генерация строки : буквы, символы, цифры
     * @param int $length - длина строки
     * @param bool $unique - использовать не повторяющиеся символы
     * @return string
     */
    public function string(int $length = 16, bool $unique = false): string
    {
        $result = "";
        $resource = $this->getAllSymbols();
        $count = 0;
        while ($count < $length) {
            if (empty($resource)) {
                break;
            }
            $key = array_rand($resource);
            $result .= $resource[$key];
            if ($unique) {
                unset($resource[$key]);
            }
            $count++;
        }
        return $result;
    }

    /**
     * Случайная персона
     * @param string $template - шаблон вывода строки с именем, используются теги:
     * {LName} - Фамилия
     * {FName} - Имя
     * {SName} - Отчество
     * {LNameShort} - Первая буква фамилии
     * {FNameShort} - Первая буква имени
     * {SNameShort} - Первая буква отчества (или среднего имени)
     * @param int $gender - пол Text::GENDER_MALE или Text::GENDER_FEMALE
     * @return string
     * @throws Exception
     */
    public function person(string $template = "{LName} {FName} {SName}", int $gender = self::GENDER_MALE | self::GENDER_FEMALE): string
    {
        $result = $template;
        if (empty($gender)) {
            throw new Exception("Пол не может быть пустым");
        }
        $genders = [];
        if ($gender & self::GENDER_MALE) {
            $genders[] = self::GENDER_MALE;
        }
        if ($gender & self::GENDER_FEMALE) {
            $genders[] = self::GENDER_FEMALE;
        }
        $gender = $genders[array_rand($genders)];
        $resource = $this->getPersonData($gender);
        if (empty($resource) || empty($result)) {
            return "";
        }
        $result = preg_replace_callback(
            '/{FName}/m', fn($match) => Random::elementFromArray($resource["firstNames"]), $result
        );
        $result = preg_replace_callback(
            '/{LName}/m', fn($match) => Random::elementFromArray($resource["lastNames"]), $result
        );
        $result = preg_replace_callback(
            '/{SName}/m', fn($match) => Random::elementFromArray($resource["secondNames"]), $result
        );
        $result = preg_replace_callback(
            '/{FNameShort}/m', fn($match) => mb_substr(Random::elementFromArray($resource["firstNames"]),0, 1), $result
        );
        $result = preg_replace_callback(
            '/{LNameShort}/m', fn($match) => mb_substr(Random::elementFromArray($resource["lastNames"]),0, 1), $result
        );
        return preg_replace_callback(
            '/{SNameShort}/m', fn($match) => mb_substr(Random::elementFromArray($resource["secondNames"]),0, 1), $result
        );
    }

    /**
     * Случайная цитата
     * @param string $template - шаблон вывода строки с цитатой, доступны переменные: {Quote} - цитата, {Author} - автор
     * @return string
     * @throws Exception
     */
    public function quote(string $template = "«{Quote}» {Author}"): string
    {
        $resource = $this->getResourceByKey("quotes") ?? [];
        if (empty($resource)) {
            throw new Exception("Список цитат для выборки пуст");
        }
        [$quote, $author] = $resource[array_rand($resource)];
        $result = $template;
        $result = preg_replace_callback(
            '/{Quote}/m', fn($match) => $quote, $result
        );
        return preg_replace_callback(
            '/{Author}/m', fn($match) => $author, $result
        );
    }

    /**
     * Вывести строку со случайной ценой в определенной валюте с определенным шаблоном
     * @param string $currency - код валюты, например RU, US, EU
     * @param int $min - минимальный порог случайной цены
     * @param int $max - максимальный порог случайной цены
     * @param string $template - шаблон вывода, доступны переменные: {Number} - случайная цена, {Symbol} - символ валюты, {Text} - слово валюты с правильным окончанием
     * @return string
     * @throws Exception
     */
    public function priceInCurrency(string $currency, int $min = 1, int $max = 16777216, string $template = "{Number}{Symbol}"): string
    {
        $resource = ($this->getResourceByKey("currency") ?? [])[$currency] ?? [];
        if (empty($resource)) {
            throw new Exception("Валюта не найдена");
        }
        $number = rand($min, $max);
        $symbol = $resource["symbol"] ?? "";
        $words = $resource["words"] ?? [];
        $result = $template;
        $result = preg_replace_callback(
            '/{Number}/m', fn($match) => $number, $result
        );
        $result = preg_replace_callback(
            '/{Symbol}/m', fn($match) => $symbol, $result
        );
        return preg_replace_callback(
            '/{Text}/m', fn($match) => Strings::numberWords($number, $words), $result
        );
    }
}
