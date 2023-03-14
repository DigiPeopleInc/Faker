<?php

namespace Digipeopleinc\Faker\Modules;

use Digipeopleinc\Faker\Config;
use Digipeopleinc\Faker\Helpers;
use Exception;

class Image extends AbstractModule
{
    /**
     * Получить изображение на тему
     * @param int $width - ширина изображения
     * @param int $height - высота изображения
     * @param string $theme - тема изображения (на любом языке)
     * @return string
     * @throws Exception
     */
    public function imageJpegByTheme(int $width = 1280, int $height = 720, string $theme = "all"): string
    {
        if (str_contains($theme, ",")) {
            $theme .= "/all";
        }
        $url = "https://loremflickr.com/g/$width/$height/$theme";
        if ($width < 1 || $height < 1) {
            throw new Exception("Размер не может быть меньше 1");
        }
        if ($width > Config::LOREMFLICKR_PICTURE_MAX_WIDTH || $height > Config::LOREMFLICKR_PICTURE_MAX_HEIGHT) {
            throw new Exception(
                "Размер изображения должен быть не более ".Config::LOREMFLICKR_PICTURE_MAX_WIDTH."x".Config::LOREMFLICKR_PICTURE_MAX_HEIGHT
            );
        }

        return Helpers\ExternalSource::get($url);
    }

    /**
     * Изображение с указанными параметрами
     * @param int $width
     * @param int $height
     * @param string $backgroundColor
     * @param string $extension
     * @return string
     * @throws Exception
     */
    public function image(
        int $width = 512,
        int $height = 512,
        string $backgroundColor = "808080",
        string $extension = "jpg",
        string $text = "",
        string $textColor = "000000"
    ): string {
        $backgroundColor = str_replace("#", "", $backgroundColor);
        $textColor = str_replace("#", "", $textColor);
        $allowedExtensions = [
            "bmp",
            "gif",
            "jpg",
            "jpeg",
            "png",
            "webp",
        ];
        $r = (int)hexdec(substr($backgroundColor, 0, 2));
        $g = (int)hexdec(substr($backgroundColor, 2, 2));
        $b = (int)hexdec(substr($backgroundColor, 4, 2));
        if ($width < 1 || $height < 1) {
            throw new Exception("Размер не может быть меньше 1");
        }
        if ($width > Config::PICTURE_MAX_WIDTH || $height > Config::PICTURE_MAX_HEIGHT) {
            throw new Exception(
                "Размер изображения должен быть не более ".Config::PICTURE_MAX_WIDTH."x".Config::PICTURE_MAX_HEIGHT
            );
        }
        if (!in_array($extension, $allowedExtensions)) {
            throw new Exception(
                "Расширение изображения не поддерживается, доступные расширения: ".implode(", ", $allowedExtensions)
            );
        }
        $image = imageCreate($width, $height);
        $background = imageColorAllocate($image, $r, $g, $b);
        imageFilledRectangle($image, 0, 0, $width, $height, $background);
        if (!empty($text)) {
            $font = Config::getFontPath();
            $rText = (int)hexdec(substr($textColor, 0, 2));
            $gText = (int)hexdec(substr($textColor, 2, 2));
            $bText = (int)hexdec(substr($textColor, 4, 2));
            $foreground = imageColorAllocate($image, $rText, $gText, $bText);
            $fontSize = max(min($width / mb_strlen($text) * 1.15, $height * 0.5), 5);
            $textBox = Helpers\Image::TextBox($fontSize, $font, $text);
            $textWidth = ceil(($textBox[4] - $textBox[1]) * 1.07);
            $textHeight = ceil((abs($textBox[7]) + abs($textBox[1])) * 1);
            $textX = ceil(($width - $textWidth) / 2);
            $textY = ceil(($height - $textHeight) / 2 + $textHeight);
            imagettftext($image, $fontSize, 0, $textX, $textY, $foreground, $font, $text);
        }
        ob_start();
        switch ($extension) {
            case 'bmp':
            {
                imagebmp($image);
                break;
            }
            case 'gif':
            {
                imagegif($image);
                break;
            }

            case 'png':
            {
                imagepng($image);
                break;
            }
            case 'jpg':
            case 'jpeg':
            {
                imagejpeg($image);
                break;
            }
            case 'webp':
            {
                imagewebp($image);
                break;
            }
        }
        $result = ob_get_contents();
        ob_end_clean();

        return $result;
    }
}
