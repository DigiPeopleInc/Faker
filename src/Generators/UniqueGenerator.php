<?php
namespace Digipeopleinc\Faker\Generators;

use Exception;

class UniqueGenerator implements IGenerator
{
    /**
     * Уникальные использованные значения
     *
     * @var array
     */
    private array $uniques = [];

    /**
     * Генератор
     *
     * @var Generator
     */
    private IGenerator $generator;

    public function __construct(IGenerator $generator, array &$uniques)
    {
        $this->generator = $generator;
        $this->uniques = &$uniques;
    }

    /**
     * Проверяет наличие вызываемого метода в модулях
     * Подгружает ресурсные файлы и выполняет метод
     *
     * @throws Exception
     *
     * @param string $methodName
     * @param array $arguments
     *
     * @return mixed
     */
    public function __call(string $methodName, array $arguments) {
        $i = 0;
        while(true) {
            $res = call_user_func_array([$this->generator, $methodName], $arguments);
            if(in_array($res, $this->uniques)) {
                if($i > 10000) {
                    throw new Exception('Уникальное значение не найдено');
                }
                $i++;
            } else {
                $this->uniques[] = $res;
                return $res;
            }
        }
    }

    /**
     * Обнулить унивельные значения
     */
    public function reset()
    {
        $this->uniques = [];
    }
}
