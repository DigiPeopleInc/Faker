<?php

namespace Digipeopleinc\Faker\Test;

use DateTime;
use Digipeopleinc\Faker\Modules\Text;
use Exception;

class PaymentTest extends AbstractTestFaker
{
    /**
     * @throws Exception
     */
    public function testCreditCardType(): void
    {
        $cards = $this->getEnFaker()->creditCardType();
        $this->assertIsString($cards);
        $cards = $this->getRuFaker()->creditCardType();
        $this->assertIsString($cards);
    }

    /**
     * @throws Exception
     */
    public function testCreditCardNumber(): void
    {
        $visa = $this->getEnFaker()->creditCardNumber("Visa");
        $this->assertIsString($visa);
        $this->assertStringStartsWith("4", $visa);
        $this->assertEquals(16, strlen($visa));
    }

    /**
     * @return void
     */
    public function testCreditCardExpiration(): void
    {
        $expiration = $this->getEnFaker()->creditCardExpiration("my", toDate: "+0 days");
        $this->assertEquals(date("my"), $expiration);
        $now = new DateTime();
        $expiration = $this->getEnFaker()->creditCardExpiration("U", toDate: "+36 months");
        $this->assertIsNumeric($expiration);
        $this->assertGreaterThanOrEqual($now->getTimestamp(), (int)$expiration);
        $now->modify("+36 months")->getTimestamp();
        $this->assertLessThanOrEqual($now->getTimestamp(), (int)$expiration);
    }

    /**
     * @return void
     */
    public function testCreditCardExpirationExpired(): void
    {
        $expired = $this->getEnFaker()->creditCardExpirationExpired("U");
        $now = time();
        $this->assertLessThan($now, (int)$expired);
    }

    /**
     * @throws Exception
     */
    public function testCreditCardPerson(): void
    {
        $person = $this->getEnFaker()->creditCardPerson(Text::GENDER_MALE);
        $this->assertIsString($person);
        $this->assertStringContainsString(" ", $person);
        $this->assertGreaterThanOrEqual(3, mb_strlen($person));
        $person = $this->getRuFaker()->creditCardPerson(Text::GENDER_FEMALE | Text::GENDER_MALE);
        $this->assertIsString($person);
        $this->assertStringContainsString(" ", $person);
        $this->assertGreaterThanOrEqual(3, mb_strlen($person));
    }

    /**
     * @throws Exception
     */
    public function testBankName(): void
    {
        $bank = $this->getEnFaker()->bankName();
        $this->assertIsString($bank);
        $bank = $this->getRuFaker()->bankName();
        $this->assertIsString($bank);
    }

    /**
     * @throws Exception
     */
    public function testSwiftBic(): void
    {
        $swiftBic = $this->getEnFaker()->swiftBic();
        $this->assertIsString($swiftBic);
        $this->assertGreaterThanOrEqual(8, mb_strlen($swiftBic));
        $this->assertLessThanOrEqual(11, mb_strlen($swiftBic));
    }

    /**
     * @return void
     */
    public function testRegionCode(): void
    {
        $regionCode = $this->getEnFaker()->regionCode();
        $this->assertIsString($regionCode);
        $this->assertIsNumeric($regionCode);
        $this->assertLessThanOrEqual(3, mb_strlen($regionCode));
    }

    /**
     * @return void
     */
    public function testRegistrationYear(): void
    {
        $registrationYear = $this->getEnFaker()->registrationYear();
        $this->assertIsString($registrationYear);
        $this->assertIsNumeric($registrationYear);
        $this->assertLessThanOrEqual((int)date("y"), (int)$registrationYear);
    }

    /**
     * @throws Exception
     */
    public function testInnCompany(): void
    {
        $innCompany = $this->getEnFaker()->innCompany();
        $this->assertIsString($innCompany);
        $this->assertIsNumeric($innCompany);
        $this->assertEquals(10, mb_strlen($innCompany));
    }

    /**
     * @throws Exception
     */
    public function testInnPersonal(): void
    {
        $innPersonal = $this->getEnFaker()->innPersonal();
        $this->assertIsString($innPersonal);
        $this->assertIsNumeric($innPersonal);
        $this->assertEquals(12, mb_strlen($innPersonal));
    }

    /**
     * @throws Exception
     */
    public function testKpp(): void
    {
        $kpp = $this->getEnFaker()->kpp();
        $this->assertIsString($kpp);
        $this->assertIsNumeric($kpp);
        $this->assertEquals(9, mb_strlen($kpp));
    }

    /**
     * @throws Exception
     */
    public function testOgrn(): void
    {
        $ogrn = $this->getEnFaker()->ogrn();
        $this->assertIsString($ogrn);
        $this->assertIsNumeric($ogrn);
        $this->assertEquals(13, mb_strlen($ogrn));
    }

    /**
     * @return void
     */
    public function testOgrnIp(): void
    {
        $ogrnIp = $this->getEnFaker()->ogrnIp();
        $this->assertIsString($ogrnIp);
        $this->assertIsNumeric($ogrnIp);
        $this->assertEquals(15, mb_strlen($ogrnIp));
    }

    /**
     * @throws Exception
     */
    public function testSnils(): void
    {
        $snils = $this->getEnFaker()->snils();
        $this->assertIsString($snils);
        $this->assertIsNumeric($snils);
        $this->assertEquals(11, mb_strlen($snils));
    }

    /**
     * @throws Exception
     */
    public function testBik(): void
    {
        $bik = $this->getEnFaker()->bik();
        $this->assertIsString($bik);
        $this->assertIsNumeric($bik);
        $this->assertEquals(9, mb_strlen($bik));
        $this->assertContains($bik[0], ["0", "1", "2"]);
    }

    /**
     * @throws Exception
     */
    public function testCorrespondentAccount(): void
    {
        $correspondentAccount = $this->getEnFaker()->correspondentAccount();
        $this->assertIsString($correspondentAccount);
        $this->assertIsNumeric($correspondentAccount);
        $this->assertEquals(20, mb_strlen($correspondentAccount));
        $this->assertStringStartsWith("30101", $correspondentAccount);
        $this->expectException(Exception::class);
        $this->getEnFaker()->correspondentAccount("123123123123123123123123");
    }

    /**
     * @throws Exception
     */
    public function testCheckingAccount(): void
    {
        $checkingAccount = $this->getEnFaker()->checkingAccount();
        $this->assertIsString($checkingAccount);
        $this->assertIsNumeric($checkingAccount);
        $this->assertEquals(20, mb_strlen($checkingAccount));
        $this->assertStringStartsWith("4", $checkingAccount);
        $this->expectException(Exception::class);
        $this->getEnFaker()->checkingAccount("p12o3j09123u80192312-3123123");
    }
}