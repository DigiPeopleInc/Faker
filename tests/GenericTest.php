<?php

namespace Digipeopleinc\Faker\Test;

use Exception;
use PHPUnit\Util\Xml\Loader as XmlLoader;

class GenericTest extends AbstractTestFaker
{
    /**
     * @return void
     */
    public function testArrayOf(): void
    {
        $array = $this->getEnFaker()->arrayOf(
            fn() => true,
            times: 50
        );
        $this->assertIsArray($array);
        $this->assertCount(50, $array);
        $this->assertContainsOnly("bool", $array);
    }

    /**
     * @return void
     */
    public function testTag(): void
    {
        $source = "true";
        $tag = $this->getEnFaker()->tag($source, "div", ["id" => "test_id", "class" => "test_class"]);
        $this->assertIsString($tag);
        $this->assertMatchesRegularExpression('/<(.*)id="test_id"(.*)class="test_class"(.*)>true<(.*)>/m', $tag);
    }

    /**
     * @return void
     */
    public function testHtml(): void
    {
        $html = $this->getEnFaker()->html([
            "p" => "test"
        ]);
        $this->assertIsString($html);
        $this->assertEquals("<p>test</p>", preg_replace('/\s+/', '', $html));
    }

    /**
     * @return void
     */
    public function testJson(): void
    {
        $original = (object)["property" => true];
        $json = $this->getEnFaker()->json(fn() => $original);
        $this->assertJson($json);
        $decoded = json_decode($json);
        $this->assertObjectHasAttribute("property", $decoded);
        $this->assertTrue($decoded->property);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testXml(): void
    {
        $xml = $this->getEnFaker()->xml([
            "items" => [
                "item1" => [
                    "name" => "name1",
                    "value" => 1
                ],
                "item2" => [
                    "name" => "name2",
                    "value" => 2
                ]
            ]
        ]);
        $xmlObject = (new XmlLoader)->load($xml);
        $this->assertCount(1, $xmlObject->childNodes);
        foreach ($xmlObject->childNodes->getIterator() as $item) {
            $this->assertEquals("root", $item->tagName);
            $this->assertCount(1, $item->childNodes);
            foreach ($item->childNodes->getIterator() as $subItem) {
                $this->assertCount(2, $subItem->childNodes);
                $this->assertEquals("items", $subItem->tagName);
                $firstItem = $subItem?->firstChild;
                $this->assertEquals("item1", $firstItem?->tagName);
                $this->assertCount(2, $firstItem?->childNodes);
                $this->assertEquals("name1", $firstItem?->firstChild?->nodeValue);
                $this->assertEquals(1, $firstItem?->lastChild?->nodeValue);
            }
        }
    }

    /**
     * @return void
     */
    public function testBase64(): void
    {
        $original = "123";
        $base64 = $this->getEnFaker()->base64($original);
        $this->assertIsString($base64);
        $this->assertEquals($original, base64_decode($base64));
    }
}
