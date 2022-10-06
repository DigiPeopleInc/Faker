<?php
namespace Digipeopleinc\Faker\Generators;

use Digipeopleinc\Faker\Faker;
use Digipeopleinc\Faker\Modules\AbstractModule;
use Digipeopleinc\Faker\ResourceManager;
use Exception;

class Generator implements IGenerator
{
    /**
     * Локаль
     *
     * @var string
     */
    private string $locale;

    public function __construct(string $locale)
    {
        $this->locale = $locale;
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
    function __call(string $methodName, array $arguments) {
        foreach(Faker::$modules as $module) {
            if (method_exists($module, $methodName)) {
                $moduleName = (new \ReflectionClass($module))->getShortName();
                $moduleLocaleData = ResourceManager::getResource($moduleName, $this->locale);
                /**
                 * @var AbstractModule $moduleObject
                 */
                $moduleObject = new $module($moduleLocaleData);
                if (method_exists($moduleObject, "setLocaleName")) {
                    $moduleObject->setLocaleName($this->locale);
                }
                if (method_exists($moduleObject, "setGenerator")) {
                    $moduleObject->setGenerator($this);
                }
                return call_user_func_array([$moduleObject, $methodName], $arguments);
            }
        }
        throw new Exception('Метод не найден');
    }
}
