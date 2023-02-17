<?php

namespace Digipeopleinc\Faker\Test;

use DateTime;
use Exception;

class DateTest extends AbstractTestFaker
{
    /**
     * @return void
     */
    public function testTime(): void
    {
        $time = $this->getEnFaker()->time("H", 2, 2);
        $this->assertEquals(2, (int)$time);

        $time = $this->getEnFaker()->time("i");
        $this->assertGreaterThanOrEqual(0, $time);
        $this->assertLessThanOrEqual(59, $time);

        $time = $this->getEnFaker()->time("s");
        $this->assertGreaterThanOrEqual(0, $time);
        $this->assertLessThanOrEqual(59, $time);
    }

    public function testWorkTime(): void
    {
        $time = $this->getEnFaker()->workTime("H");
        $this->assertGreaterThanOrEqual(9, $time);
        $this->assertLessThanOrEqual(18, $time);
    }

    /**
     * @return void
     */
    public function testFormatTimestamp(): void
    {
        $date = $this->getEnFaker()->formatTimestamp(format: "l F", time: 100000);
        $this->assertEquals('Friday January', $date);

        $date = $this->getRuFaker()->formatTimestamp(format: "l {F}", time: 100000);
        $this->assertEquals('Пятница Января', $date);

        $date = $this->getRuFaker()->formatTimestamp(format: "Y", time: 100000);
        $this->assertEquals(1970, $date);
    }

    /**
     * @return void
     */
    public function testRandomSeconds(): void
    {
        $seconds = $this->getEnFaker()->randomSeconds();
        $this->assertGreaterThanOrEqual(0, $seconds);
        $this->assertLessThanOrEqual(59, $seconds);
    }

    /**
     * @return void
     */
    public function testRandomMinutes(): void
    {
        $minutes = $this->getEnFaker()->randomMinutes();
        $this->assertGreaterThanOrEqual(0, $minutes);
        $this->assertLessThanOrEqual(3600, $minutes);
    }

    /**
     * @return void
     */
    public function testRandomHours(): void
    {
        $hours = $this->getEnFaker()->randomHours();
        $this->assertGreaterThanOrEqual(0, $hours);
        $this->assertLessThanOrEqual(86400, $hours);
    }

    /**
     * @return void
     */
    public function testDate(): void
    {
        $date = $this->getEnFaker()->date("Y", (new DateTime())->setDate(2001, 1, 1), (new DateTime())->setDate(2015, 1, 1));
        $this->assertGreaterThanOrEqual(2001, $date);
        $this->assertLessThanOrEqual(2015, $date);

        $date = $this->getEnFaker()->date("Y", 0, 86400);
        $this->assertEquals(1970, $date);

        $currentYear = date("Y");
        $date = $this->getEnFaker()->date("Y", "+1 year", "+1 year");
        $this->assertEquals((int)$currentYear + 1, $date);
    }

    /**
     * @return void
     */
    public function testDateOfCentury(): void
    {
        $date = $this->getEnFaker()->dateOfCentury("Y", 19);
        $this->assertGreaterThanOrEqual(1800, $date);
        $this->assertLessThanOrEqual(1899, $date);
    }

    /**
     * @throws Exception
     */
    public function testDateOfDecade(): void
    {
        $date = $this->getEnFaker()->dateOfDecade("Y", 20, 5);
        $this->assertGreaterThanOrEqual(1940, $date);
        $this->assertLessThanOrEqual(1949, $date);
    }

    /**
     * @return void
     */
    public function testDateOfYear(): void
    {
        $date = $this->getEnFaker()->dateOfYear("Y", 2022);
        $this->assertEquals(2022, $date);

        $date = $this->getEnFaker()->dateOfYear("Y");
        $this->assertEquals(date("Y"), $date);
    }

    /**
     * @return void
     */
    public function testDateOfMonth(): void
    {
        $date = $this->getEnFaker()->dateOfMonth("mY", 12, 1999);
        $this->assertEquals("121999", $date);
    }

    /**
     * @throws Exception
     */
    public function testTimeZone(): void
    {
        $timeZone = $this->getEnFaker()->timeZone("arctic");
        $this->assertIsString($timeZone);
        $this->assertEquals('Arctic/Longyearbyen', $timeZone);
    }

    /**
     * @return void
     */
    public function testBirthDay(): void
    {
        $currentYear = (int)date("Y");
        $date = $this->getEnFaker()->birthDay("Y", 10, 10);
        $this->assertEquals($currentYear - 10, $date);
    }
}
