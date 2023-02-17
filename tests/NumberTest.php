<?php

namespace Digipeopleinc\Faker\Test;

use Throwable;

class NumberTest extends AbstractTestFaker
{
    /**
     * @return void
     */
    public function testIntegers(): void
    {
        $firstNumber = $this->getEnFaker()->randomInteger(min: 5, max: 6);
        $this->assertIsInt($firstNumber);
        $this->assertGreaterThanOrEqual(5, $firstNumber);
        $this->assertLessThanOrEqual(6, $firstNumber);

        $secondNumber = $this->getEnFaker()->randomInteger(min: 1.25, max: 1.5);
        $this->assertIsInt($secondNumber);
        $this->assertEquals(1, $secondNumber);

        $this->expectException(Throwable::class);
        $this->getEnFaker()->randomInteger(min: -123123123123123123123123123123123, max: -12312312313123123123123123123123123123123123);
    }

    /**
     * @return void
     */
    public function testFloats(): void
    {
        $firstNumber = $this->getEnFaker()->randomFloat(0, 10, 0);
        $this->assertIsFloat($firstNumber);
        $this->assertGreaterThanOrEqual(0, $firstNumber);
        $this->assertLessThanOrEqual(10, $firstNumber);

        $secondNumber = $this->getEnFaker()->randomFloat(1, 9, 10);
        $this->assertEquals(12, strlen($secondNumber));

        $arrayOfFloats = $this->getEnFaker()->arrayOf(
            fn() => $this->getEnFaker()->randomFloat(),
            times: 15
        );
        $this->assertContainsOnly("float", $arrayOfFloats);
    }
}
