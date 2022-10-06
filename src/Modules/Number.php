<?php
namespace Digipeopleinc\Faker\Modules;

class Number extends AbstractModule
{
    /**
     * Возвращает случайное число в заданном интервале
     *
     * @param int $min
     * @param int $max
     *
     * @return int
     */
    public function randomInteger(int $min = 0, int $max = 100) :int
    {
        return rand($min, $max);
    }

    /**
     * Возвращает случайное число с точкой
     *
     * @param float $min
     * @param float $max
     * @param int $comma - кол-во знаков после запятой
     *
     * @return float
     */
    public function randomFloat(float $min = 0, float $max = 100, int $comma = 1): float
    {
        $delta = $max - $min;
        $multi = mt_rand() / mt_getrandmax();
        $result = $min + $delta * $multi;
        return round($result, $comma);
    }
}
