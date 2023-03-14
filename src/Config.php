<?php

namespace Digipeopleinc\Faker;

define('DGPPL_FAKER_ROOT_DIR', __DIR__);

class Config
{
    const AVAILABLE_LOCALES = ['ru_RU', 'en_US'];
    const TEST_TMP_PATH = "tests" .DIRECTORY_SEPARATOR ."tmp".DIRECTORY_SEPARATOR;
    const SAMPLE_FILES_PATH = "files".DIRECTORY_SEPARATOR;
    const PICTURE_FONT_PATH = "fonts".DIRECTORY_SEPARATOR."arial.ttf";
    const PICTURE_MAX_WIDTH = 4096;
    const PICTURE_MAX_HEIGHT = 4096;
    const LOREMFLICKR_PICTURE_MAX_WIDTH = 1280;
    const LOREMFLICKR_PICTURE_MAX_HEIGHT = 1280;

    /**
     * Faker root dir
     * @return string
     */
    public static function getRoot(): string
    {
        return DGPPL_FAKER_ROOT_DIR.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;
    }

    /**
     * Test tmp path
     * @return string
     */
    public static function getTestTmpPath(): string
    {
        return self::getRoot().DIRECTORY_SEPARATOR.self::TEST_TMP_PATH;
    }

    /**
     * Sample files path
     * @return string
     */
    public static function getSampleFilesPath(): string
    {
        return self::getRoot().DIRECTORY_SEPARATOR.self::SAMPLE_FILES_PATH;
    }

    /**
     * Font path
     * @return string
     */
    public static function getFontPath(): string
    {
        return self::getRoot().DIRECTORY_SEPARATOR.self::PICTURE_FONT_PATH;
    }
}
