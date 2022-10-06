<?php
namespace Digipeopleinc\Faker\Generators;

class NullableGenerator implements IGenerator
{
    private float $weight;

    /**
     * Генератор
     *
     * @param Generator
     *
     * @var Generator
     */
    private IGenerator $generator;

    public function __construct(IGenerator $generator, float $weight)
    {
        $this->weight = $weight;
        $this->generator = $generator;
    }

    /**
     * Проверяет наличие вызываемого метода в модулях
     * Подгружает ресурсные файлы и выполняет метод
     *
     * @throws \Exception
     *
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     */
    public function __call(string $name, array $arguments) {

        if(rand(0, 10)/10 >= $this->weight) {
            $result = call_user_func_array([$this->generator, $name], $arguments);
        } else {
            $result = null;
        }

        return $result;
    }
}
