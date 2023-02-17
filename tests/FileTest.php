<?php

namespace Digipeopleinc\Faker\Test;

use Exception;

class FileTest extends AbstractTestFaker
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
     * Проверка работы base64
     * @return void
     */
    public function testBase64(): void
    {
        $this->assertEquals(123, base64_decode($this->getEnFaker()->base64(123)));
        $this->assertEquals("2345", base64_decode($this->getEnFaker()->base64("2345")));
        $this->assertEquals([], unserialize(base64_decode($this->getEnFaker()->base64([]))));
        $this->assertEquals("test", base64_decode($this->getEnFaker()->base64(
            fn() => "test"
        )));
    }

    /**
     * Проверка сохранения файла
     * @return void
     * @throws Exception
     */
    public function testSaveAsFileTo(): void
    {
        $file = $this->getTestRoot()."123.txt";
        $this->getEnFaker()->saveAsFileTo("123", $file);
        $this->assertFileExists($file);
        $this->assertStringEqualsFile($file, "123");
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testMimeType(): void
    {
        $mime = $this->getEnFaker()->mimeType();
        $this->assertIsString($mime);
        $this->assertStringContainsString("/", $mime);
    }

    /**
     * @throws Exception
     */
    public function testFileExtension(): void
    {
        $this->assertNotEmpty($this->getEnFaker()->fileExtension());
        $this->assertEquals("psd", $this->getEnFaker()->fileExtension("image/vnd.adobe.photoshop"));
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testTextFile(): void
    {
        $length = 256;
        $fileEn = $this->getTestRoot()."test_en.txt";
        $fileRu = $this->getTestRoot()."test_ru.txt";
        $contentEn = $this->getEnFaker()->textFile($length);
        $contentRu = $this->getRuFaker()->textFile($length);
        $this->getEnFaker()->saveAsFileTo($contentEn, $fileEn);
        $this->getEnFaker()->saveAsFileTo($contentRu, $fileRu);
        $this->assertFileExists($fileEn);
        $this->assertFileExists($fileRu);
        $this->assertStringEqualsFile($fileEn, $contentEn);
        $this->assertStringEqualsFile($fileRu, $contentRu);
        $this->assertEquals(filesize($fileEn), $length);
        $this->assertEquals(filesize($fileRu), $length * 2);
    }

    public function testFileSampleNoFile(): void
    {
        $this->expectException(Exception::class);
        $this->getEnFaker()->fileSample(extension: "png123123");
        $this->getEnFaker()->fileSample(mimeType: "application/vnd.jisp");
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testFileSample(): void
    {
        $file = $this->getTestRoot()."test.pdf";
        $this->getEnFaker()->saveAsFileTo($this->getEnFaker()->fileSample(mimeType: "application/vnd.ms-excel"), $file);
        $this->assertFileExists($file);
        $base64 = $this->getEnFaker()->base64($this->getEnFaker()->fileSample(extension: "png"));
        $this->assertEquals($this->getEnFaker()->fileSample(extension: "png"), base64_decode($base64));
    }
}
