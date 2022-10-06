<?php

namespace Digipeopleinc\Faker\Helpers;

use Transliterator;

class Strings
{
    /**
     * Преобразует первый символ multi byte строки в верхний регистр
     * @param string $string
     * @return string
     */
    public static function mb_ucfirst(string $string): string
    {
        $firstChar = mb_substr($string, 0, 1);
        $then = mb_substr($string, 1);
        return mb_strtoupper($firstChar) . $then;
    }

    /**
     * Преобразует первый символ multi byte строки в нижний регистр
     * @param string $string
     * @return string
     */
    public static function mb_lcfirst(string $string): string
    {
        $firstChar = mb_substr($string, 0, 1);
        $then = mb_substr($string, 1);
        return mb_strtoupper($firstChar) . $then;
    }

    /**
     * Склонение слов в зависимости от числа
     * @param int $value - значение числа
     * @param array $words - массив из трёх элементов, представляющих склонение
     * @param bool $include - включать ли числовое значение в результат, по умолчанию - нет
     * @return string
     */
    public static function numberWords(int $value, array $words, bool $include = false): string
    {
        $num = $value % 100;
        if ($num > 19) {
            $num = $num % 10;
        }
        $out = ($include) ?  $value . ' ' : '';
        $out .= match ($num) {
            1 => $words[0],
            2, 3, 4 => $words[1],
            default => $words[2],
        };
        return $out;
    }

    /**
     * Транслит всего
     * @param string $string
     * @return string
     */
    public static function transliterate(string $string): string
    {
        return Transliterator::create("Any-Latin;")->transliterate(str_replace(
            [
                'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п', 'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я', 'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П', 'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
            ],
            [
                'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p', 'r','s','t','u','f','h','ts','ch','sh','shch','a','i','y','e','yu','ya', 'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P', 'R','S','T','U','F','H','Ts','Ch','Sh','Shch','A','I','Y','e','Yu','Ya'
            ],
            $string
        ));
    }
}
