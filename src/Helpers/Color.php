<?php

namespace Digipeopleinc\Faker\Helpers;

class Color
{
    /**
     * Преобразовать RGB в CMYK
     * @param $r
     * @param $g
     * @param $b
     * @return array
     */
    public static function rgbToCmyk($r, $g, $b): array
    {
        $c = (255 - $r) / 255.0 * 100;
        $m = (255 - $g) / 255.0 * 100;
        $y = (255 - $b) / 255.0 * 100;
        $k = min(array($c, $m, $y));
        $c = $c - $k;
        $m = $m - $k;
        $y = $y - $k;
        return [$c, $m, $y, $k];
    }
}
