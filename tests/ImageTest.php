<?php

namespace Digipeopleinc\Faker\Test;

use Exception;

class ImageTest extends AbstractTestFaker
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->clearTemp();
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        $this->clearTemp();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testImageJpegByTheme(): void
    {
        $file = $this->getTestRoot()."cat.jpg";
        $image = $this->getEnFaker()->imageJpegByTheme(width: 320, height: 240, theme: "cat");
        $this->getEnFaker()->saveAsFileTo($image, $file);
        $this->assertFileExists($file);
        [$width, $height] = getimagesize($file) ?? [];
        $this->assertEquals(320, $width);
        $this->assertEquals(240, $height);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testImage(): void
    {
        $file = $this->getTestRoot()."red_box_with_white_text.png";
        $image = $this->getEnFaker()->image(
            width: 1024,
            height: 1024,
            backgroundColor: "FF0000",
            extension: "png",
            text: "Test white text on red background",
            textColor: "#FFFFFF"
        );
        $this->getEnFaker()->saveAsFileTo($image, $file);
        $this->assertFileExists($file);
        [$width, $height] = getimagesize($file) ?? [];
        $this->assertEquals(1024, $width);
        $this->assertEquals(1024, $height);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testWrongExtension(): void
    {
        $this->expectException(Exception::class);
        $this->getEnFaker()->image(
            width: 128,
            height: 128,
            backgroundColor: "000000",
            extension: "docx",
            text: "test",
            textColor: "FFFFFF"
        );
    }
}
