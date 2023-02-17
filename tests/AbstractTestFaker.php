<?php

namespace Digipeopleinc\Faker\Test;

use Digipeopleinc\Faker\Config;
use Digipeopleinc\Faker\Faker;
use PHPUnit\Framework\TestCase;

class AbstractTestFaker extends TestCase
{
    private ?Faker $enFaker = null;
    private ?Faker $ruFaker = null;

    /**
     * @return Faker
     */
    protected function getEnFaker(): Faker
    {
        if (is_null($this->enFaker)) {
            $this->enFaker = new Faker("en_US");
        }
        return $this->enFaker;
    }

    /**
     * @return Faker
     */
    protected function getRuFaker(): Faker
    {
        if (is_null($this->ruFaker)) {
            $this->ruFaker = new Faker("ru_RU");
        }
        return $this->ruFaker;
    }

    /**
     * Место сохранения файлов тестов
     * @return string
     */
    protected function getTestRoot(): string
    {
        return Config::getTestTmpPath();
    }

    /**
     * Действия перед тестами
     * @return void
     */
    protected function clearTemp(): void
    {
        $files = glob(Config::getRoot().'/tests/tmp/*'); // get all file names
        foreach($files as $file){
            if(is_file($file)) {
                unlink($file);
            }
        }
    }

    /**
     * Проверка на шестнадцатиричную строку
     * @param string $string
     * @param int|null $length
     * @return void
     */
    protected function assertIsHex(string $string, ?int $length = null): void
    {
        if (is_int($length)) {
            $this->assertEquals($length, mb_strlen($string));
        }
        $this->assertTrue(ctype_xdigit($string));
    }
}
