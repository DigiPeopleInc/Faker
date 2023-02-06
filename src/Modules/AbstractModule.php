<?php

namespace Digipeopleinc\Faker\Modules;

use Digipeopleinc\Faker\Generators\IGenerator;
use Digipeopleinc\Faker\Helpers\Html;
use Digipeopleinc\Faker\Helpers\Xml;
use Closure;
use Exception;

class AbstractModule
{
    /**
     * Данные локализации модуля
     *
     * @var array
     */
    protected array $localeData;
    protected string $localeName;
    private static array $moduleCache = [];

    protected IGenerator $generator;

    /**
     * Установить кеш модуля
     * @param string $type
     * @param string $key
     * @param mixed $value
     * @return void
     */
    protected function setCacheItem(string $type, string $key, mixed $value): void
    {
        if (!array_key_exists($type, self::$moduleCache)) {
            self::$moduleCache[$type] = [];
        }
        if (!array_key_exists($key, self::$moduleCache[$type])) {
            self::$moduleCache[$type][$key] = [];
        }
        if (!array_key_exists($this->getLocaleName(), self::$moduleCache[$type][$key])) {
            self::$moduleCache[$type][$key][$this->getLocaleName()] = [];
        }
        self::$moduleCache[$type][$key][$this->getLocaleName()] = $value;
    }

    /**
     * Получить данные кеша
     * @param string $type
     * @param string $key
     * @return mixed
     */
    protected function getCache(string $type, string $key): mixed
    {
        return self::$moduleCache[$type][$key][$this->getLocaleName()] ?? null;
    }

    /**
     * Получить закешированные данные ресурса по ключу, если конкретный вид данных внутри ресурса не найден - то смешать все виды данных в пределах ресурса
     * @param string $resourceKey
     * @param string $type
     * @return mixed
     */
    protected function getCachedResourceMixed(string $resourceKey, string $type): mixed
    {
        $cache = $this->getCache($resourceKey, $type);
        if (is_null($cache)) {
            $resource = $this->getResourceByKey($resourceKey) ?? [];
            if (!empty($type) && array_key_exists($type, $resource)) {
                $this->setCacheItem($resourceKey, $type, $resource[$type]);
            } else {
                $resource = array_merge(...array_values($resource));
                $this->setCacheItem($resourceKey, $type, array_unique($resource));
            }
        }
        return $this->getCache($resourceKey, $type);
    }

    /**
     * @param array|null $localeData
     */
    public function __construct(?array $localeData)
    {
        $this->localeData = $localeData;
    }

    /**
     * @param IGenerator $generator
     * @return void
     */
    public function setGenerator(IGenerator $generator): void
    {
        $this->generator = $generator;
    }

    /**
     * @return IGenerator
     */
    public function getGenerator(): IGenerator
    {
        return $this->generator;
    }

    /**
     * Установить название локали
     * @param string $localeName
     */
    public function setLocaleName(string $localeName): void
    {
        $this->localeName = $localeName;
    }

    /**
     * Получить название локали
     * @return string
     */
    public function getLocaleName(): string
    {
        return $this->localeName;
    }

    /**
     * Получить данные ресурса под ключём
     * @param string $key
     * @return mixed|null
     */
    public function getResourceByKey(string $key): mixed
    {
        return $this->localeData[$key] ?? null;
    }

    /**
     * Получить массив с $times количеством элементов
     * @param array|string|int|float|bool|Closure|null $source - из чего сделать массив - что угодно + функция для получений результата
     * @param int $times - количество элементов в массиве
     * @param bool $useKeys - использовать ассоциативы?
     * @param string $keyName - Префикс ключа ассоциативного массива
     * @return array
     */
    public function arrayOf(array|string|int|float|bool|null|Closure $source, int $times = 1, bool $useKeys = false, string $keyName = "Key"): array
    {
        $result = [];
        for($i=0; $i < $times; $i++) {
            $data = $source instanceof Closure ? $source() : $source;
            if ($useKeys) {
                $result[$keyName.$i] = $data;
            } else {
                $result[] = $data;
            }
        }
        return $result;
    }

    /**
     * Оттегировать результат
     * @param string|array|Closure $source - результат в виде строки, массива либо функции
     * @param string $tag - обозначение тега
     * @param string|array|Closure|null $properties - свойства для тега
     * @return string|array
     */
    public function tag(string|array|Closure $source, string $tag = "", null|string|array|Closure $properties = null): string|array
    {
        $item = $source instanceof Closure ? $source() : $source;
        $result = Html::tagItem($item, tag: $tag, properties: $properties);
        return (is_array($result)) ? $result : (string)$result;
    }

    /**
     * Вывод в строку html
     * @param string|array|Closure $source - источник, который нужно превратить в html - строка, массив или функция
     * @param string|null $template - шаблон html, обязательно должны быть области {{result}} - результат функции (текст), {{locale}} - указанная локаль Faker
     * Если null - то оборачивающий шаблон не используется, если указана пустая строка - то берется шаблон html по-умолчанию
     * @return string
     */
    public function html(string|array|Closure $source, ?string $template = null): string
    {
        return Html::injectToHtml(
            result: Html::html($source instanceof Closure ? $source() : $source, key: ""),
            locale: $this->getLocaleName(),
            template: $template
        );
    }

    /**
     * Вывод в строку json
     * @param array|string|int|float|bool|Closure|null $source - источник данных для json - что угодно + функция
     * @return string
     */
    public function json(array|string|int|float|bool|null|Closure $source): string
    {
        return json_encode($source instanceof Closure ? $source() : $source, JSON_PRETTY_PRINT);
    }

    /**
     * Вывод в строку xml
     * @param array|Closure $source - источник данных для xml - либо массив либо результат функции, который преобразуется в массив
     * @return string
     * @throws Exception
     */
    public function xml(array|Closure $source): string
    {
        return Xml::arrayToXml($source instanceof Closure ? (array)$source() : $source);
    }

    /**
     * Преобразовать в base64
     * @param mixed $source
     * @return string
     */
    public function base64(mixed $source): string
    {
        if ($source instanceof Closure) {
            $source = $source();
        }
        if (!is_scalar($source)) {
            $source = serialize($source);
        }
        return base64_encode($source);
    }
}
