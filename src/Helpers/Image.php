<?php

namespace Digipeopleinc\Faker\Helpers;

class Image
{
    /**
     * @param int|float $size
     * @param string $fontFile
     * @param string $text
     * @return array
     * @author http://ruquay.com/sandbox/imagettf/
     */
    public static function TextBox(int|float $size, string $fontFile, string $text): array
    {
        $coords = imagettfbbox($size, 0, $fontFile, $text);
        $angle = deg2rad(0);
        $cosAngle = cos($angle);
        $sinAngle = sin($angle);
        $return = [];
        for ( $i = 0; $i < 7; $i += 2 ) {
            $return[$i] = round($coords[$i] * $cosAngle + $coords[$i + 1] * $sinAngle);
            $return[$i + 1] = round($coords[$i + 1] * $cosAngle - $coords[$i] * $sinAngle);
        }
        return $return;
    }
}
