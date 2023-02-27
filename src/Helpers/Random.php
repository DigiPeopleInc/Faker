<?php

namespace Digipeopleinc\Faker\Helpers;

use Digipeopleinc\Faker\ResourceManager;
use Exception;
use ReflectionException;

class Random
{
    /**
     * Случайный символ числа
     * @return int
     */
    public static function oneDigit(): int
    {
        return rand(0,9);
    }

    /**
     * Случайное число с плавающей точкой
     * @param int $min
     * @param int $max
     * @return float
     */
    public static function float(int $min = 0, int $max = 1): float
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }

    /**
     * @throws Exception
     */
    public static function elementFromArray(array $array): mixed
    {
        if (empty($array)) {
            throw new Exception("Массив для выборки пуст");
        }
        return $array[array_rand($array)];
    }

    /**
     * @throws Exception
     */
    public static function elementFromNullableArray(?array $array = null): mixed
    {
        if (empty($array)) {
            return "";
        }
        return $array[array_rand($array)];
    }

    /**
     * Случайная буква Английского алфавита
     * @param float $capitalChance - шанс заглавной буквы от 0 до 1 (100%)
     * @return string
     * @throws ReflectionException
     */
    public static function oneEnglishLetter(float $capitalChance = 0.5): string
    {
        $resource = ResourceManager::getResource("Text", "en_US") ?? [];
        if (!empty($resource["upperCaseCharacters"]) && !empty($resource["lowerCaseCharacters"])) {
            $resource = rand(
                0,
                10
            ) / 10 < $capitalChance ? $resource["upperCaseCharacters"] : $resource["lowerCaseCharacters"];
            return $resource[array_rand($resource)];
        }
        return "";
    }

    /**
     * Случайная буква Русского алфавита
     * @param float $capitalChance - шанс заглавной буквы от 0 до 1 (100%)
     * @return string
     * @throws ReflectionException
     */
    public static function oneRussianLetter(float $capitalChance = 0.5): string
    {
        $resource = ResourceManager::getResource("Text", "ru_RU") ?? [];
        if (!empty($resource["upperCaseCharacters"]) && !empty($resource["lowerCaseCharacters"])) {
            $resource = rand(
                0,
                10
            ) / 10 < $capitalChance ? $resource["upperCaseCharacters"] : $resource["lowerCaseCharacters"];
            return $resource[array_rand($resource)];
        }
        return "";
    }

    /**
     * Один любой символ
     * @return string
     * @throws ReflectionException
     */
    public static function oneLetter(): string
    {
        return self::oneEnglishLetter();
    }

    /**
     * Случайный символ ASCII
     * @return string
     */
    public static function oneAscii(): string
    {
        return chr(mt_rand(33, 126));
    }

    /**
     * Случайный true или false
     * @return bool
     */
    public static function bool(): bool
    {
        return rand(0, 10)/10 >= 0.5;
    }

    /**
     * Regexp
     * @param string $regex - строка с регулярным выражением
     * @param callable|null $letterFunc - колбэк на возврат случайного символа
     * @return string
     * @throws Exception
     */
    public static function regexp(string $regex, ?Callable $letterFunc = null): string
    {
        $regex = preg_replace('/^\/?\^?/', '', $regex);
        $regex = preg_replace('/\$?\/?$/', '', $regex);
        $regex = preg_replace('/\{(\d+)\}/', '{\1,\1}', $regex);
        $regex = preg_replace('/(?<!\\\)\?/', '{0,1}', $regex);
        $regex = preg_replace('/(?<!\\\)\*/', '{0,' . Random::oneDigit() . '}', $regex);
        $regex = preg_replace('/(?<!\\\)\+/', '{1,' . Random::oneDigit() . '}', $regex);
        $regex = preg_replace_callback('/(\[[^\]]+\])\{(\d+),(\d+)\}/', function ($matches) {
            return str_repeat($matches[1], Random::elementFromArray(range($matches[2], $matches[3])));
        }, $regex);
        $regex = preg_replace_callback('/(\([^\)]+\))\{(\d+),(\d+)\}/', function ($matches) {
            return str_repeat($matches[1], Random::elementFromArray(range($matches[2], $matches[3])));
        }, $regex);
        $regex = preg_replace_callback('/(\\\?.)\{(\d+),(\d+)\}/', function ($matches) {
            return str_repeat($matches[1], Random::elementFromArray(range($matches[2], $matches[3])));
        }, $regex);
        $regex = preg_replace_callback('/\((.*?)\)/', function ($matches) {
            return Random::elementFromArray(explode('|', str_replace(array('(', ')'), '', $matches[1])));
        }, $regex);
        $regex = preg_replace_callback('/\[([^\]]+)\]/', function ($matches) {
            return '[' . preg_replace_callback('/(\w|\d)\-(\w|\d)/', function ($range) {
                    return implode('', range($range[1], $range[2]));
                }, $matches[1]) . ']';
        }, $regex);
        $regex = preg_replace_callback('/\[([^\]]+)\]/', function ($matches) {
            return Random::elementFromArray(str_split($matches[1]));
        }, $regex);
        // replace \d with number and \w with letter and . with ascii
        $regex = preg_replace_callback('/\\\w/', is_null($letterFunc) ? 'static::oneLetter' : $letterFunc, $regex);
        $regex = preg_replace_callback('/\\\d/', 'static::oneDigit', $regex);
        $regex = preg_replace_callback('/(?<!\\\)\./', 'static::oneAscii', $regex);
        // remove remaining backslashes
        // phew
        return str_replace('\\', '', $regex);
    }
}
