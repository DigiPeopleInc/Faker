<?php

namespace Digipeopleinc\Faker\Helpers;

use Closure;

class Html
{
    public static string $genericHtmlTemplate = <<<EOT
<!DOCTYPE html>
<html lang="{{locale}}">
<body>{{result}}
</body>
</html>
EOT;

    /**
     * Присвоить тег значениям в массиве или строке
     * @param mixed $item - данные для тега
     * @param string $tag - обозначение тега
     * @param string|array|Closure|null $properties - свойства для тега
     * @return string|array|bool|int|float
     */
    public static function tagItem(mixed &$item, string $tag, null|string|array|Closure $properties = null): string|array|bool|int|float
    {
        if (!(is_scalar($item) || is_array($item))) {
            return "";
        }
        if ($properties instanceof Closure) {
            $properties = $properties();
            if (!is_array($properties) && !is_string($properties) && !is_null($properties)) {
                $properties = (string)$properties;
            }
        }
        $props = match(gettype($properties)) {
            "string" => " ".$properties,
            "array" => array_reduce(
                array_keys($properties),
                fn($item, $key) => $item .= (!is_array($properties[$key])) ?
                    ' '.(!array_is_list($properties) ? $key.'="' : "").$properties[$key].(!array_is_list($properties) ? '"' : "")
                    : ""
            ),
            default => ""
        };
        if (is_array($item)) {
            foreach ($item as &$value) {
                if (is_array($value)) {
                    $value = self::tagItem($value, tag: $tag);
                } else {
                    $value = "<$tag$props>$value</$tag>";
                }
            }
        } else {
            $item = "<$tag$props>$item</$tag>";
        }
        return $item;
    }

    /**
     * Построить html из массива
     * @param mixed $item
     * @param string $key
     * @param int $tabs
     * @return string
     */
    public static function html(mixed $item, string $key = "span", int $tabs = 0): string
    {
        if (!(is_scalar($item) || is_array($item))) {
            return "";
        }
        $result = "";
        $oneTab = "\t";
        $tabsStr = str_repeat($oneTab, $tabs);
        if (is_array($item)) {
            if (!empty($key)) {
                $result .= "\n".$tabsStr."<$key>";
            }
            foreach ($item as $k => $value) {
                if (is_array($value)) {
                    $result .= self::html($value, is_numeric($k) ? "" : $k, $tabs+1);
                } else {
                    $result .= is_numeric($k) ? "\n".$tabsStr.$oneTab.$value : "\n$tabsStr<$k>\n$tabsStr$oneTab$value\n$tabsStr</$k>";
                }
            }
            if (!empty($key)) {
                $result .= "\n".$tabsStr."</$key>";
            }
        } else {
            $result = ($tabs > 0 ? "\n" : "").$tabsStr."<$key>$item</$key>";
        }
        return $result;
    }

    /**
     * Возвратить html внутри шаблона
     * @param string $result
     * @param string $locale
     * @param string|null $template
     * @return string
     */
    public static function injectToHtml(string $result = "", string $locale = "", ?string $template = ""): string
    {
        if (is_null($template)) {
            $template = "{{result}}";
        } elseif (empty($template) || $template === "default") {
            $template = self::$genericHtmlTemplate;
        }
        return trim(str_replace(["{{result}}", "{{locale}}"], [$result, $locale], $template));
    }
}
