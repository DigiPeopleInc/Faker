<?php

namespace Digipeopleinc\Faker\Test;

use Digipeopleinc\Faker\Modules\Text;
use Exception;
use ReflectionException;

class TextTest extends AbstractTestFaker
{
    public function testDigit(): void
    {
        $digit = $this->getEnFaker()->digit();
        $this->assertIsInt($digit);
        $this->assertGreaterThanOrEqual(0, $digit);
        $this->assertLessThanOrEqual(9, $digit);
    }

    /**
     * @throws ReflectionException
     */
    public function testEnglishLetter(): void
    {
        $englishLetter = $this->getRuFaker()->englishLetter();
        $this->assertIsString($englishLetter);
        $this->assertEquals(1, mb_strlen($englishLetter));
        $this->assertMatchesRegularExpression('/[A-Za-z]/u', $englishLetter);
    }

    /**
     * @throws Exception
     */
    public function testChar(): void
    {
        $char = $this->getEnFaker()->char(["a"], Text::LOWER_CASE);
        $this->assertIsString($char);
        $this->assertEquals(1, mb_strlen($char));
        $this->assertNotEquals("a", $char);
        $this->assertMatchesRegularExpression('/[a-z]/u', $char);

        $char = $this->getRuFaker()->char(["Б"], Text::UPPER_CASE);
        $this->assertIsString($char);
        $this->assertEquals(1, mb_strlen($char));
        $this->assertNotEquals("Б", $char);
        $this->assertMatchesRegularExpression('/[А-ЯЁ]/u', $char);
    }

    /**
     * @throws Exception
     */
    public function testCharUpperCase(): void
    {
        $charUpperCase = $this->getEnFaker()->charUpperCase(["Z"]);
        $this->assertIsString($charUpperCase);
        $this->assertEquals(1, mb_strlen($charUpperCase));
        $this->assertNotEquals("Z", $charUpperCase);
        $this->assertMatchesRegularExpression('/[A-Z]/u', $charUpperCase);
    }

    /**
     * @throws Exception
     */
    public function testCharLowerCase(): void
    {
        $charLowerCase = $this->getRuFaker()->charLowerCase(["г"]);
        $this->assertIsString($charLowerCase);
        $this->assertEquals(1, mb_strlen($charLowerCase));
        $this->assertNotEquals("г", $charLowerCase);
        $this->assertMatchesRegularExpression('/[а-яё]/u', $charLowerCase);
    }

    /**
     * @throws Exception
     */
    public function testMask(): void
    {
        $mask = $this->getEnFaker()->mask("?#");
        $this->assertIsString($mask);
        $this->assertEquals(2, mb_strlen($mask));
        $this->assertMatchesRegularExpression('/[a-zA-z]/u', $mask[0]);
        $this->assertIsNumeric($mask[1]);

        $mask = $this->getRuFaker()->mask("?#", true);
        $this->assertIsString($mask);
        $this->assertEquals(2, mb_strlen($mask));
        $this->assertMatchesRegularExpression('/[а-яА-ЯЁё]/u', mb_substr($mask, 0, 1));
        $this->assertIsNumeric(mb_substr($mask, 1, 1));
    }

    /**
     * @return void
     */
    public function testDigitMaskNotZero(): void
    {
        $digitMaskNotZero = $this->getEnFaker()->digitMaskNotZero("#######");
        $this->assertIsString($digitMaskNotZero);
        $this->assertEquals(7, mb_strlen($digitMaskNotZero));
        $this->assertIsNumeric($digitMaskNotZero);
        $this->assertGreaterThan(0, (int)$digitMaskNotZero);
    }

    /**
     * @throws Exception
     */
    public function testMaskLocalized(): void
    {
        $maskLocalized = $this->getRuFaker()->maskLocalized("?");
        $this->assertIsString($maskLocalized);
        $this->assertEquals(1, mb_strlen($maskLocalized));
        $this->assertMatchesRegularExpression('/[а-яА-ЯЁё]/u', $maskLocalized);
    }

    /**
     * @throws Exception
     */
    public function testWord(): void
    {
        $word = $this->getEnFaker()->word();
        $this->assertIsString($word);
        $word = $this->getRuFaker()->word();
        $this->assertIsString($word);
    }

    /**
     * @return void
     */
    public function testWords(): void
    {
        $words = $this->getEnFaker()->words(3);
        $this->assertIsString($words);
        $this->assertCount(3, explode(" ", $words));

        $words = $this->getRuFaker()->words(3);
        $this->assertIsString($words);
        $this->assertCount(3, explode(" ", $words));
    }

    /**
     * @return void
     */
    public function testSentence(): void
    {
        $sentence = $this->getEnFaker()->sentence(maxWords: 6, maxChars: 1000);
        $this->assertIsString($sentence);
        $this->assertLessThanOrEqual(6, count(explode(" ", $sentence)));
        $this->assertLessThanOrEqual(1000, mb_strlen($sentence));
    }

    /**
     * @return void
     */
    public function testTextReal(): void
    {
        $textReal = $this->getRuFaker()->textReal(maxWords: 5, maxChars: 150);
        $this->assertIsString($textReal);
        $this->assertGreaterThan(0, mb_strlen($textReal));
    }

    /**
     * @throws Exception
     */
    public function testParagraph(): void
    {
        $paragraph = $this->getEnFaker()->paragraph(maxWords: 20);
        $this->assertIsString($paragraph);
        $this->assertGreaterThan(0, mb_strlen($paragraph));
        $this->expectException(Exception::class);
        $this->getEnFaker()->paragraph(maxWords: 1);
    }

    /**
     * @throws Exception
     */
    public function testRegexp(): void
    {
        $regexp = $this->getRuFaker()->regexp('/\w\d/');
        $this->assertIsString($regexp);
        $this->assertEquals(2, mb_strlen($regexp));
        $this->assertMatchesRegularExpression('/[a-zA-z]/u', $regexp[0]);
        $this->assertIsNumeric($regexp[1]);
    }

    /**
     * @throws Exception
     */
    public function testRegexpLocalized(): void
    {
        $regexpLocalized = $this->getRuFaker()->regexpLocalized('/\w\d/');
        $this->assertIsString($regexpLocalized);
        $this->assertEquals(2, mb_strlen($regexpLocalized));
        $this->assertMatchesRegularExpression('/[а-яА-ЯЁё]/u', mb_substr($regexpLocalized, 0, 1));
        $this->assertIsNumeric(mb_substr($regexpLocalized, 1, 1));
    }

    /**
     * @return void
     */
    public function testBool(): void
    {
        $bool = $this->getEnFaker()->bool();
        $this->assertIsBool($bool);
    }

    /**
     * @return void
     */
    public function testString(): void
    {
        $string = $this->getEnFaker()->string(length: 10);
        $this->assertIsString($string);
        $this->assertEquals(10, mb_strlen($string));
    }

    /**
     * @throws Exception
     */
    public function testPerson(): void
    {
        $person = $this->getEnFaker()->person("{LName} {FName}", Text::GENDER_FEMALE);
        $this->assertIsString($person);
        $this->assertCount(2, explode(" ", $person));

        $person = $this->getRuFaker()->person("{LName} {FName} {SName}", Text::GENDER_MALE | Text::GENDER_FEMALE);
        $this->assertIsString($person);
        $this->assertCount(3, explode(" ", $person));
    }

    /**
     * @throws Exception
     */
    public function testQuote(): void
    {
        $quote = $this->getEnFaker()->quote();
        $this->assertIsString($quote);
        $this->assertGreaterThan(0, mb_strlen($quote));
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testPriceInCurrency(): void
    {
        $priceInCurrency = $this->getEnFaker()->priceInCurrency(currency: "US");
        $this->assertIsString($priceInCurrency);
        $this->assertStringContainsString("$", $priceInCurrency);
        $this->expectException(Exception::class);
        $this->getEnFaker()->priceInCurrency(currency: "NO");
    }
}