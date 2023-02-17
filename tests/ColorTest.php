<?php

namespace Digipeopleinc\Faker\Test;

use Exception;

class ColorTest extends AbstractTestFaker
{
    /**
     * @return void
     */
    public function testColorHex(): void
    {
        $color = $this->getEnFaker()->colorHex();
        $this->assertIsString($color);
        $this->assertIsHex($color, 6);

        $color = $this->getEnFaker()->colorHex("red");
        $this->assertIsString($color);
        $this->assertIsHex($color, 6);
    }

    /**
     * @return void
     */
    public function testColorHexCss(): void
    {
        $color = $this->getEnFaker()->colorHexCss();
        $this->assertIsString($color);
        $this->assertEquals("#", $color[0] ?? "");
        $this->assertIsHex(substr($color, 1), 6);

        $color = $this->getEnFaker()->colorHexCss("green");
        $this->assertIsString($color);
        $this->assertEquals("#", $color[0] ?? "");
        $this->assertIsHex(substr($color, 1), 6);
    }

    /**
     * @return void
     */
    public function testRgbArray(): void
    {
        $color = $this->getEnFaker()->rgbArray("blue");
        $this->assertIsArray($color);
        $this->assertCount(3, $color);
        $this->assertContainsOnly("integer", $color);
        foreach ($color as $item) {
            $this->assertGreaterThanOrEqual(0, $item);
            $this->assertLessThanOrEqual(255, $item);
        }
    }

    /**
     * @param string|null $color
     * @return void
     */
    public function testRgb(?string $color = null): void
    {
        $color = $color ?: $this->getEnFaker()->rgb();
        $this->assertIsString($color);
        $color = array_map(fn($item) => (int)$item, explode(",", $color));
        $this->assertIsArray($color);
        $this->assertCount(3, $color);
        foreach ($color as $item) {
            $this->assertGreaterThanOrEqual(0, $item);
            $this->assertLessThanOrEqual(255, $item);
        }
    }

    /**
     * @return void
     */
    public function testRgbCss(): void
    {
        $color = $this->getEnFaker()->rgbCss();
        $this->assertIsString($color);
        $regExp = '/rgb\((.*)\)/m';
        $this->assertMatchesRegularExpression($regExp, $color);
        $color = preg_replace($regExp, '$1', $color);
        $this->testRgb($color);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testRgbaArray(): void
    {
        $color = $this->getEnFaker()->rgbaArray("orange", 0.4);
        $this->assertIsArray($color);
        $this->assertCount(4, $color);
        $this->assertContainsOnly("integer", array_slice($color, 0, 3));
        $this->assertContainsOnly("float", array_slice($color, 3, 1));
        foreach (array_slice($color, 0, 3) as $item) {
            $this->assertGreaterThanOrEqual(0, $item);
            $this->assertLessThanOrEqual(255, $item);
        }
        foreach (array_slice($color, 3, 1) as $item) {
            $this->assertGreaterThanOrEqual(0, $item);
            $this->assertLessThanOrEqual(1, $item);
        }
    }

    /**
     * @param string|null $color
     * @return void
     * @throws Exception
     */
    public function testRgba(?string $color = null): void
    {
        $color = $color ?: $this->getEnFaker()->rgba();
        $this->assertIsString($color);
        $colors = explode(",", $color);
        $alpha = array_map(fn($item) => (float)$item, array_slice($colors, 3, 1));
        $colors = array_map(fn($item) => (int)$item, array_slice($colors, 0, 3));
        $this->assertIsArray($colors);
        $this->assertCount(3, $colors);
        $this->assertCount(1, $alpha);
        $this->assertContainsOnly("integer", $colors);
        $this->assertContainsOnly("float", $alpha);
        foreach ($colors as $item) {
            $this->assertGreaterThanOrEqual(0, $item);
            $this->assertLessThanOrEqual(255, $item);
        }
        foreach ($alpha as $item) {
            $this->assertGreaterThanOrEqual(0, $item);
            $this->assertLessThanOrEqual(1, $item);
        }
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testRgbaCss(): void
    {
        $color = $this->getEnFaker()->rgbaCss();
        $this->assertIsString($color);
        $regExp = '/rgba\((.*)\)/m';
        $this->assertMatchesRegularExpression($regExp, $color);
        $color = preg_replace($regExp, '$1', $color);
        $this->testRgba($color);
    }

    /**
     * @return void
     */
    public function testCmykArray(): void
    {
        $color = $this->getEnFaker()->cmykArray("pink");
        $this->assertIsArray($color);
        $this->assertCount(4, $color);
        $this->assertContainsOnly("float", $color);
        foreach ($color as $item) {
            $this->assertGreaterThanOrEqual(0, $item);
            $this->assertLessThanOrEqual(100, $item);
        }
    }

    /**
     * @param string|null $color
     * @return void
     */
    public function testCmyk(?string $color = null): void
    {
        $color = $color ?: $this->getEnFaker()->cmyk();
        $this->assertIsString($color);
        $color = array_map(fn($item) => (float)$item, explode(",", $color));
        $this->assertIsArray($color);
        $this->assertCount(4, $color);
        foreach ($color as $item) {
            $this->assertGreaterThanOrEqual(0, $item);
            $this->assertLessThanOrEqual(100, $item);
        }
    }

    /**
     * @return void
     */
    public function testCmykCss(): void
    {
        $color = $this->getEnFaker()->cmykCss();
        $this->assertIsString($color);
        $regExp = '/device-cmyk\((.*)\)/m';
        $this->assertMatchesRegularExpression($regExp, $color);
        $color = preg_replace($regExp, '$1', $color);
        $color = array_map(fn($item) => (float)$item, explode(" ", $color));
        $this->assertIsArray($color);
        $this->assertCount(4, $color);
        foreach ($color as $item) {
            $this->assertGreaterThanOrEqual(0, $item);
            $this->assertLessThanOrEqual(100, $item);
        }
    }

    /**
     * @return void
     */
    public function testColorName(): void
    {
        $colorName = $this->getEnFaker()->colorName("black");
        $this->assertIsString($colorName);
    }
}
