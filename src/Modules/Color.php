<?php

namespace Digipeopleinc\Faker\Modules;

use Exception;
use Digipeopleinc\Faker\Helpers;

class Color extends AbstractModule
{
    /**
     * Получить случайный цвет в HEX из группы цвета
     * @param string $colorGroup - группа цвета (yellow, blue, green и т.д.)
     * @param string|null $outKey - указатель на переменную куда запишется название цвета
     * @return string
     */
    private function getColorHexByGroup(string $colorGroup, ?string &$outKey = null): string
    {
        $resource = $this->getCachedResourceMixed("colorTable", mb_strtolower($colorGroup)) ?? [];
        $key = array_rand($resource);
        if (!is_null($outKey)) {
            $outKey = $key;
        }
        return $resource[$key];
    }

    /**
     * Случайный цвет в HEX
     * @return string
     */
    private function randomHexColor(): string
    {
        return strtoupper(str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT).
            str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT).
            str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT)
        );
    }

    /**
     * Hex цвета
     * @param string|null $colorGroup - группа цвета (yellow, blue, green и т.д.)
     * @return string
     */
    public function colorHex(string $colorGroup = null): string
    {
        return is_null($colorGroup) ? $this->randomHexColor() : $this->getColorHexByGroup($colorGroup);
    }

    /**
     * Hex цвета, пригодный для указания в css (добавляется #)
     * @param string|null $colorGroup - группа цвета (yellow, blue, green и т.д.)
     * @return string
     */
    public function colorHexCss(string $colorGroup = null): string
    {
        return "#".$this->colorHex($colorGroup);
    }

    /**
     * RGB в виде массива
     * @param string|null $colorGroup - группа цвета (yellow, blue, green и т.д.)
     * @return array
     */
    public function rgbArray(string $colorGroup = null): array
    {
        $color = is_null($colorGroup) ? $this->randomHexColor() : $this->getColorHexByGroup($colorGroup);
        return [
            hexdec(substr($color, 0, 2)),
            hexdec(substr($color, 2, 2)),
            hexdec(substr($color, 4, 2))
        ];
    }

    /**
     * RGB перечисление оттенков в виде строки
     * @param string|null $colorGroup - группа цвета (yellow, blue, green и т.д.)
     * @return string
     */
    public function rgb(string $colorGroup = null): string
    {
        return implode(",", $this->rgbArray($colorGroup));
    }

    /**
     * Строка RGB цвета для css
     * @param string|null $colorGroup - группа цвета (yellow, blue, green и т.д.)
     * @return string
     */
    public function rgbCss(string $colorGroup = null): string
    {
        return "rgb(".$this->rgb($colorGroup).")";
    }

    /**
     * RGB в виде массива с альфа каналом
     * @param string|null $colorGroup - группа цвета (yellow, blue, green и т.д.)
     * @param float|null $alpha - прозрачность от 0 до 1
     * @return array
     * @throws Exception
     */
    public function rgbaArray(string $colorGroup = null, ?float $alpha = null): array
    {
        $result = $this->rgbArray($colorGroup);
        if (!is_null($alpha) && ($alpha < 0 || $alpha > 1)) {
            throw new Exception("Прозрачность не должна быть в пределах 0 и 1");
        }
        $alpha = $alpha ?: rand(0, 10) / 10;
        $alpha = number_format($alpha, 1 );
        $alpha = match($alpha) {
            "0.0" => 0,
            "1.0" => 1,
            default => (float)$alpha
        };
        $result[] = $alpha;
        return $result;
    }

    /**
     * RGB перечисление оттенков в виде строки с альфа каналом
     * @param string|null $colorGroup - группа цвета (yellow, blue, green и т.д.)
     * @param float|null $alpha - прозрачность от 0 до 1
     * @return string
     * @throws Exception
     */
    public function rgba(string $colorGroup = null, ?float $alpha = null): string
    {
        return implode(",", $this->rgbaArray($colorGroup, $alpha));
    }

    /**
     * RGB перечисление оттенков в виде строки с альфа каналом для css
     * @param string|null $colorGroup - группа цвета (yellow, blue, green и т.д.)
     * @param float|null $alpha - прозрачность от 0 до 1
     * @return string
     * @throws Exception
     */
    public function rgbaCss(string $colorGroup = null, ?float $alpha = null): string
    {
        return "rgba(".$this->rgba($colorGroup, $alpha).")";
    }

    /**
     * CMYK цвет в виде массива
     * @param string|null $colorGroup - группа цвета (yellow, blue, green и т.д.)
     * @return array
     */
    public function cmykArray(string $colorGroup = null): array
    {
        return Helpers\Color::rgbToCmyk(...$this->rgbArray($colorGroup));
    }

    /**
     * CMYK цвет ввиде строки
     * @param string|null $colorGroup - группа цвета (yellow, blue, green и т.д.)
     * @return string
     */
    public function cmyk(string $colorGroup = null): string
    {
        $result = $this->cmykArray($colorGroup);
        foreach ($result as &$color) {
            if (empty($color)) {
                $color = "0";
            } else {
                $color = round($color)."%";
            }
        }
        return implode(",", $result);
    }

    /**
     * CMYK цвет для css
     * @param string|null $colorGroup - группа цвета (yellow, blue, green и т.д.)
     * @return string
     */
    public function cmykCss(string $colorGroup = null): string
    {
        return "device-cmyk(".str_replace(",", " ", $this->cmyk($colorGroup)).")";
    }

    /**
     * Получить название цвета
     * @param string|null $colorGroup - группа цвета (yellow, blue, green и т.д.)
     * @return string
     */
    public function colorName(string $colorGroup = null): string
    {
        $result = "";
        $this->getColorHexByGroup($colorGroup ?? "", $result);
        return $result;
    }
}
