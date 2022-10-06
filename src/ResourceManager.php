<?php
namespace Digipeopleinc\Faker;

use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

class ResourceManager
{
    /**
     * Кеш ресурсов
     *
     * @var array
     */
    private static array $cache = [];

    /**
     * Загрузить данные php модуля и локали
     * @throws ReflectionException
     */
    private static function loadPhpResource(string $module, string $locale): void
    {
        $className = __NAMESPACE__."\\Locales\\".$locale."\\".$module;
        if (class_exists($className)) {
            $class = (new ReflectionClass($className));
            foreach ($class->getMethods(ReflectionMethod::IS_STATIC) as $reflectionMethod) {
                $methodName = $reflectionMethod->getName();
                if (!$reflectionMethod->isPublic() || !str_starts_with($methodName, "resource")) {
                    continue;
                }
                $methodName = lcfirst(substr($methodName, 8));
                self::$cache[$locale][$module][$methodName] = $reflectionMethod->invoke(null) ?? null;
            }
        }
    }

    /**
     * Загрузить ресурс исходя из названия модуля
     *
     * @param string $module - короткое название модуля
     * @throws ReflectionException
     */
    public static function getResource(string $module, string $locale): ?array
    {
        if(!key_exists($locale, self::$cache)) {
            self::$cache[$locale] = [];
        }
        if(!key_exists($module, self::$cache[$locale])) {
            self::$cache[$locale][$module] = [];
            self::loadPhpResource($module, $locale);
        }
        return self::$cache[$locale][$module];
    }
}
