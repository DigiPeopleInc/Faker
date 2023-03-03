<?php

namespace Digipeopleinc\Faker\Test;

use Exception;

class InternetTest extends AbstractTestFaker
{
    /**
     * @throws Exception
     */
    public function testEmail(): void
    {
        $email = $this->getEnFaker()->email();
        $this->assertIsString($email);
        $this->assertSame($email, filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    /**
     * @throws Exception
     */
    public function testEmailName(): void
    {
        $email = $this->getEnFaker()->emailName();
        $this->assertIsString($email);
        $email .= "@gmail.com";
        $this->assertSame($email, filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    /**
     * @throws Exception
     */
    public function testDomain(): void
    {
        $domain = $this->getEnFaker()->domain(3);
        $this->assertIsString($domain);
        $this->assertSame($domain, filter_var($domain, FILTER_VALIDATE_DOMAIN));
        $this->assertCount(3, explode(".", $domain));
        $domain = $this->getEnFaker()->domain(2, "");
        $this->assertIsString($domain);
        $this->expectException(Exception::class);
        $this->getEnFaker()->domain(1);
    }

    /**
     * @throws Exception
     */
    public function testSlug(): void
    {
        $slug = $this->getEnFaker()->slug(2);
        $this->assertIsString($slug);
        $slug = $this->getEnFaker()->slug(0);
        $this->assertIsString($slug);
        $this->assertEquals("", $slug);
        $slug = $this->getEnFaker()->slug(3, "_");
        $this->assertIsString($slug);
        $this->assertCount(3, explode("_", $slug));
    }

    /**
     * @throws Exception
     */
    public function testUrl(): void
    {
        $url = $this->getEnFaker()->url();
        $this->assertIsString($url);
        $this->assertSame($url, filter_var($url, FILTER_VALIDATE_URL));
    }

    /**
     * @throws Exception
     */
    public function testPassword(): void
    {
        $password = $this->getEnFaker()->password(10);
        $this->assertIsString($password);
        $this->assertEquals(10, mb_strlen($password));
    }

    /**
     * @return void
     */
    public function testIpv4(): void
    {
        $ip = $this->getEnFaker()->ipv4();
        $this->assertIsString($ip);
        $this->assertSame($ip, filter_var($ip, FILTER_VALIDATE_IP));
    }

    /**
     * @return void
     */
    public function testIpv4Local(): void
    {
        $ip = $this->getEnFaker()->ipv4Local();
        $this->assertIsString($ip);
        $this->assertSame($ip, filter_var($ip, FILTER_VALIDATE_IP));
    }

    /**
     * @return void
     */
    public function testIpv6(): void
    {
        $ip = $this->getEnFaker()->ipv6();
        $this->assertIsString($ip);
        $this->assertSame($ip, filter_var($ip, FILTER_VALIDATE_IP));
    }

    /**
     * @return void
     */
    public function testMac(): void
    {
        $mac = $this->getEnFaker()->mac();
        $this->assertIsString($mac);
        $this->assertSame($mac, filter_var($mac, FILTER_VALIDATE_MAC));
    }

    /**
     * @throws Exception
     */
    public function testPhone(): void
    {
        $phone = $this->getRuFaker()->phone();
        $this->assertIsString($phone);
        $this->assertEquals("+", $phone[0]);
        $this->assertEquals("7", $phone[1]);
        $this->assertCount(12, str_split($phone));
    }

    /**
     * @throws Exception
     */
    public function testCompany(): void
    {
        $company = $this->getEnFaker()->company();
        $this->assertIsString($company);
        $this->assertNotEmpty($company);
    }

    /**
     * @throws Exception
     */
    public function testCountry(): void
    {
        $country = $this->getEnFaker()->country();
        $this->assertIsString($country);
        $this->assertNotEmpty($country);
    }

    /**
     * @throws Exception
     */
    public function testCity(): void
    {
        $city = $this->getEnFaker()->city();
        $this->assertIsString($city);
        $this->assertNotEmpty($city);
    }

    /**
     * @throws Exception
     */
    public function testStreetName(): void
    {
        $streetName = $this->getEnFaker()->streetName();
        $this->assertIsString($streetName);
        $this->assertNotEmpty($streetName);
    }

    /**
     * @return void
     */
    public function testLat(): void
    {
        $lat = $this->getEnFaker()->lat();
        $this->assertIsFloat($lat);
        $this->assertGreaterThanOrEqual(-90, $lat);
        $this->assertLessThanOrEqual(90, $lat);
    }

    /**
     * @return void
     */
    public function testLng(): void
    {
        $lng = $this->getEnFaker()->lng();
        $this->assertIsFloat($lng);
        $this->assertGreaterThanOrEqual(-180, $lng);
        $this->assertLessThanOrEqual(180, $lng);
    }

    /**
     * @throws Exception
     */
    public function testAddress(): void
    {
        $address = $this->getRuFaker()->address();
        $this->assertIsString($address);
        $this->assertStringContainsString(",", $address);
    }

    /**
     * @throws Exception
     */
    public function testAddressShort(): void
    {
        $addressShort = $this->getRuFaker()->address();
        $this->assertIsString($addressShort);
        $this->assertStringContainsString(",", $addressShort);
    }
}