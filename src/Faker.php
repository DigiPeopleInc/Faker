<?php
namespace Digipeopleinc\Faker;

use Digipeopleinc\Faker\Generators\Generator;
use Digipeopleinc\Faker\Generators\IGenerator;
use Digipeopleinc\Faker\Generators\NullableGenerator;
use Digipeopleinc\Faker\Generators\UniqueGenerator;
use Exception;

/**
 * @mixin IGenerator
 */
class Faker implements IGenerator
{
    /**
     * Список всех модулей доступных для поиска методов
     *
     * @var array
     */
    public static array $modules;

    /**
     * Локаль
     *
     * @var string
     */
    public string $locale;

    /**
     * Генератор обычных значений
     *
     * @var IGenerator
     */
    private IGenerator $generator;

    /**
     * Хранит примененые модификаторы
     * Сбрысываются после генерации
     *
     * @item unique => [reset => false] - уникальность
     * @item nullable => [weight => 0.5] - возможность тула
     *
     * @var array
     */
    private array $modifiers = [];

    /**
     * Уже выданные уникальные результаты
     *
     * @var array
     */
    private array $uniques = [];

    /**
     * Конструктор класса Faker
     *
     * @param string $locale - выбор локализации, по умолчанию Русский
     * @param int|null $seed - изменяет начальное число генератора псевдослучайных чисел
     *
     * @throws Exception
     */
    public function __construct(string $locale = 'ru_RU', ?int $seed = null)
    {
        if(!in_array($locale, Config::AVAILABLE_LOCALES)) {
            throw new Exception('Выбранная локализация не существует');
        }
        if (!is_null($seed)) {
            srand($seed);
        }
        self::$modules = $this->loadModules();
        $this->generator = new Generator(locale: $locale);
        $this->locale = $locale;
    }

    /**
     * Подключает модули из папки /Modules
     *
     * @return array
     */
    private function loadModules() : array
    {
        $modules = [];
        $directory = __DIR__ . '/Modules';
        foreach (scandir($directory) as $filename) {
            if (str_starts_with($filename, 'Abstract')) {
                continue;
            }
            if (str_ends_with($filename, '.php')) {
                $modules[] = 'Digipeopleinc\\Faker\\Modules\\'. substr($filename, 0, -4);
            }
        }
        return $modules;
    }

    /**
     * Ставит в модификаторы уникальность
     *
     * @param bool $reset - сбросить сохраненые ответы
     *
     * @return Faker
     */
    public function unique(bool $reset = false) :Faker
    {
        $this->modifiers['unique'] = ['reset' => $reset];

        return $this;
    }

    /**
     * Ставит в модификаторы шанс null
     *
     * @param float $weight - шанс нула от 0 (0%) до 1 (100%)
     *
     * @return Faker
     */
    public function nullable(float $weight = 0.5) :Faker
    {
        $this->modifiers['nullable'] = ['weight' => $weight];

        return $this;
    }

    /**
     * Вызов функций генератора, если методов нет
     *
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     */
    public function __call(string $name, array $arguments) : mixed
    {
        // Будет переопределяться в дальнейшем, то есть реализованные генераторы будут выполнять
        // все функции предыдуших, то есть в Unique передаем Nullable и получаем  UniqueNullable
        $generator = $this->generator;

        if(isset($this->modifiers['nullable'])) {
            $generator = new NullableGenerator(generator:  $generator, weight: $this->modifiers['nullable']['weight']);
        }
        if(isset($this->modifiers['unique'])) {
            $generator = new UniqueGenerator(generator:  $generator, uniques: $this->uniques);
        }

        $this->modifiers = [];
        return call_user_func_array([$generator, $name], $arguments);
    }
}
