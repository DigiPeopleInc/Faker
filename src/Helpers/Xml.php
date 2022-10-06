<?php

namespace Digipeopleinc\Faker\Helpers;

use Exception;
use SimpleXMLElement;

class Xml
{
    protected array $multiProps = [];
    protected SimpleXMLElement $xmlObject;

    /**
     * @throws Exception
     */
    public function __construct(
        protected string $rootElement
    ) {
        $this->cleanXml();
    }

    /**
     * Перезаписать чистный xml
     * @return void
     * @throws Exception
     */
    private function cleanXml(): void
    {
        $this->xmlObject = new SimpleXMLElement(
            '<?xml version="1.0" encoding="utf-8"?>'.'<'.$this->rootElement.'></'.$this->rootElement.'>'
        );
    }

    /**
     * Окончательная обработка XML и получение результативной строки
     * @param bool $formatted - отформатированный вид?
     * @return string
     * @throws Exception
     */
    public function getResult(bool $formatted = true): string
    {
        $xml = $this->xmlObject->asXML();
        if (!empty($this->multiProps)) {
            foreach ($this->multiProps as $prop) {
                $xml = str_replace(
                    [
                        '<'.$prop.'><'.$prop.'>',
                        '</'.$prop.'></'.$prop.'>',
                    ],
                    [
                        '<'.$prop.'>',
                        '</'.$prop.'>',
                    ],
                    $xml
                );
            }
        }
        if ($formatted) {
            $dom = dom_import_simplexml(new SimpleXMLElement($xml))->ownerDocument;
            $dom->formatOutput = true;
            $xml = $dom->saveXML();
        }
        return (string)$xml;
    }

    /**
     * Использовать массив в качестве данных
     * @param array $data
     * @return $this
     * @throws Exception
     */
    public function useArray(array $data): self
    {
        $this->cleanXml();
        $this->converter($data, $this->xmlObject);
        return $this;
    }

    /**
     * Преобразовать массив в xml
     * @param array $data
     * @param SimpleXMLElement $xmlData
     * @param bool $dontGoFurther
     * @param mixed $prevKey
     * @return void
     */
    public function converter(array $data, SimpleXMLElement $xmlData, bool $dontGoFurther = false, mixed $prevKey = false): void
    {
        foreach ($data as $key => $value) {
            if ($value === '' || $value === null || $value === false) {
                continue;
            }
            if (is_numeric($key)) {
                if ($prevKey === false) {
                    $key = 'item'.$key;
                } else {
                    $key = $prevKey;
                    $this->multiProps[] = $prevKey;
                }
            } else {
                $prevKey = $key;
            }
            if (is_array($value)) {
                if ($dontGoFurther !== false) {
                    $subnode = $xmlData->addChild($dontGoFurther);
                    foreach ($value as $k => $val) {
                        if (is_array($val)) {
                            $subnode2 = $subnode->addChild($k);
                            $this->converter($val, $subnode2, false, $prevKey);
                        } else {
                            $subnode->addChild("$k", htmlspecialchars("$val"));
                        }
                    }
                } else {
                    $subnode = $xmlData->addChild($key);
                    $this->converter($value, $subnode, false, $prevKey);
                }
            } else {
                $xmlData->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

    /**
     * Построить XML из данных
     * @param array $array - входящий массив для преобразования
     * @param string $rootElement - от какого корневого тега начинать
     * @param bool $formatted - выдать в виде красивой строки?
     * @return string
     * @throws Exception
     */
    public static function arrayToXml(array $array, string $rootElement = "root", bool $formatted = true): string
    {
        return (new self($rootElement))->useArray($array)->getResult($formatted);
    }
}
