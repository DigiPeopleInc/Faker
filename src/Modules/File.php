<?php

namespace Digipeopleinc\Faker\Modules;
use Closure;
use Digipeopleinc\Faker\Config;
use Digipeopleinc\Faker\Helpers\Random;
use Exception;

class File extends AbstractModule
{
    /**
     * Случайный тип mime
     * @throws Exception
     */
    public function mimeType(): string
    {
        return Random::elementFromArray(array_keys($this->getResourceByKey("mimes") ?? []));
    }

    /**
     * Случайное расширение файла
     * @param string $mimeType - тип mime
     * @return string
     * @throws Exception
     */
    public function fileExtension(string $mimeType = ""): string
    {
        return Random::elementFromArray($this->getCachedResourceMixed("mimes", $mimeType));
    }

    /**
     * Текстовый файл определенной длины (поддерживается локализация)
     * @param int $length
     * @return string
     * @throws Exception
     */
    public function textFile(int $length = 50): string
    {
        return $this->getGenerator()->regexpLocalized(str_repeat('\w', $length));
    }

    /**
     * Получить файл-пример
     * @throws Exception
     */
    public function fileSample(?string $extension = null, ?string $mimeType = null): string
    {
        if (empty($extension) && empty($mimeType)) {
            throw new Exception("Не указано расширение или mime файла");
        }
        $resource = $this->getCachedResourceMixed("mimes", (string)$mimeType) ?? [];
        if (!is_null($extension) && !in_array($extension, $resource)) {
            throw new Exception("Такого расширения не существует");
        }
        if (is_null($extension)) {
            $extension = null;
            foreach ($resource as $fileExtension) {
                if (file_exists(Config::getSampleFilesPath()."sample.".$fileExtension)) {
                    $extension = $fileExtension;
                    break;
                }
            }
        }
        if (empty($extension) || !file_exists(Config::getSampleFilesPath()."sample.".$extension)) {
            throw new Exception("Файла примера не существует");
        }
        return file_get_contents(Config::getSampleFilesPath()."sample.".$extension);
    }

    /**
     * Сохранить бинарные данные в файл
     * @param string|Closure $binary - данные
     * @param string $path - путь сохранения с названием файла
     * @param string|null $extension - расширение файла
     * @param string|null $mimeType - тип файла
     * @return void
     * @throws Exception
     */
    public function saveAsFileTo(string|Closure $binary, string $path, ?string $extension = null, ?string $mimeType = null): void
    {
        if ($binary instanceof Closure) {
            $binary = (string)$binary();
        }
        if (!empty($mimeType)) {
            $resource = $this->getCachedResourceMixed("mimes", $mimeType);
            if (empty($resource)) {
                throw new Exception("Такого типа файла не существует");
            }
            $extension = reset($resource);
        }
        file_put_contents($path.(!empty($extension) ? ".".$extension : ""), $binary, LOCK_EX);
    }
}
