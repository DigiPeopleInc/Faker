<?php

namespace Digipeopleinc\Faker\Modules;

use Digipeopleinc\Faker\Helpers\Random;
use Digipeopleinc\Faker\Helpers\Strings;
use Exception;

class Internet extends AbstractModule
{
    /**
     * Случайная безопасная почта
     * @throws Exception
     */
    public function email(): string
    {
        $firstPart = match(rand(0, 1)){
            1 => null,
            default => $this->emailName()
        };
        if (is_null($firstPart)) {
            $firstPart = $this->getGenerator()->regexp(str_repeat("\w", rand(5, 12)))
                .$this->getGenerator()->digitMaskNotZero(Random::elementFromArray(["_#", "#", "", "", "_##", "##", "", ""]));
        }
        $domainPart = match(rand(0, 1)){
            2 => "example2TODO",
            default => "example".".".Random::elementFromArray($this->getCachedResourceMixed("domainEnd", "all"))
        };
        return $firstPart."@".$domainPart;
    }

    /**
     * Имя пользователя как часть email
     * @throws Exception
     */
    public function emailName(): string
    {
        $name = match(rand(0, 3)){
            1 => $this->getGenerator()->person("{LName}.{FName}".$this->getGenerator()->digitMaskNotZero(Random::elementFromArray(["_#", "#", "", ""]))),
            2 => $this->getGenerator()->person("{FName}".$this->getGenerator()->digitMaskNotZero(Random::elementFromArray(["_###", "_##", "###", "###"]))),
            3 => $this->getGenerator()->person("{LName}".$this->getGenerator()->digitMaskNotZero(Random::elementFromArray(["_###", "_##", "####", "###"]))),
            default => $this->getGenerator()->person("{FName}.{LName}".$this->getGenerator()->digitMaskNotZero(Random::elementFromArray(["_#", "#", "", ""])))
        };
        return mb_strtolower(Strings::transliterate($name));
    }

    /**
     * Доменное имя
     * @throws Exception
     */
    public function domain(int $levels = 2, ?string $delimiter = "."): string
    {
        if ($levels < 2) {
            throw new Exception("Уровень домена не может быть меньше двух");
        }
        $result = [];
        $domain = ".".Random::elementFromArray($this->getCachedResourceMixed("domainEnd", "all"));
        while($levels-- > 1) {
            $result[] = match($levels) {
                2 => Random::elementFromArray($this->getCachedResourceMixed("businessParts", "endingPart")),
                default => Random::elementFromArray($this->getCachedResourceMixed("businessParts", "leadingPart"))
            };
        }
        $delimiter = $delimiter ?: Random::elementFromArray([
            "",
            "-",
            "_"
        ]);
        return mb_strtolower(Strings::transliterate(implode($delimiter, $result).$domain));
    }

    /**
     * Slug
     * @throws Exception
     */
    public function slug(int $count = 1, string $delimiter = "-"): string
    {
        if ($count < 1) {
            return "";
        }
        $result = [];
        for($i = 0; $i < $count; $i++)
        {
            $result[] = Random::elementFromArray($this->getCachedResourceMixed("slugs", "all"));
        }
        return implode($delimiter, $result);
    }

    /**
     * Генерация URL по шаблону
     * @param string $template
     * @return string
     * @throws Exception
     */
    public function url(string $template = "https://{domain}/{category}/{slug}.html"): string
    {
        $result = $template;
        $result = preg_replace_callback(
            '/{category}/m', fn($match) => Random::elementFromArray($this->getCachedResourceMixed("categories", "all")), $result
        );
        $result = preg_replace_callback(
            '/{slug}/m', fn($match) => $this->slug(mt_rand(1, 5)), $result
        );
        return preg_replace_callback(
            '/{domain}/m', fn($match) => $this->domain(mt_rand(2, 5), "-"), $result
        );
    }

    /**
     * Генерация пароля
     * @param int $length - длина
     * @return string
     * @throws Exception
     */
    public function password(int $length = 8): string
    {
        if ($length < 8) {
            throw new Exception("пароль не может быть длиной меньше 8");
        }
        $alphabet = '#abcdefghilkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_=+!-';
        $result = [];
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < $length; $i++) {
            $n = mt_rand(0, $alphaLength);
            $result[] = $alphabet[$n];
        }
        return implode($result);
    }

    /**
     * IPv4 адрес
     * @return string
     */
    public function ipv4(): string
    {
        return mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
    }

    /**
     * IPv4 локальный адрес
     * @return string
     */
    public function ipv4Local(): string
    {
        return "192.168.".mt_rand(0, 255).".".mt_rand(0, 255);
    }

    /**
     * IPv6 адрес
     * @return string
     */
    public function ipv6(): string
    {
        $result = [];
        for ($i = 0; $i < 8; $i++) {
            $result[] = dechex(mt_rand(0, "65535"));
        }
        return join(':', $result);
    }

    /**
     * MAC-адрес
     * @return string
     */
    public function mac(): string
    {
        return implode(':', str_split(str_pad(base_convert(mt_rand(0, 0xffffff), 10, 16) . base_convert(mt_rand(0, 0xffffff), 10, 16), 12, '0'), 2));
    }

    /**
     * Телефон
     * @throws Exception
     */
    public function phone(?string $format = null): string
    {
        $format = $format ?: Random::elementFromArray($this->getCachedResourceMixed("phone", "default"));
        return $this->getGenerator()->mask($format);
    }

    /**
     * Компания
     * @throws Exception
     */
    public function company(?bool $usePrefix = null): string
    {
        $usePrefix = $usePrefix ?: (bool)mt_rand(0, 1);
        $template = $usePrefix ?
            Random::elementFromArray($this->getCachedResourceMixed("companyTemplates", "with_type")) :
            Random::elementFromArray($this->getCachedResourceMixed("companyTemplates", "no_type"));
        $businessParts = $this->getResourceByKey("businessParts") ?? [];
        if (empty($template)) {
            throw new Exception("Шаблоны названий компаний не найдены");
        }
        if (empty($businessParts)) {
            throw new Exception("Элементы названий компаний не найдены");
        }
        return preg_replace_callback(
            '/{[A-z]+}/m', function ($matches) use ($businessParts) {
                $match = reset($matches);
                $match = str_replace(["{", "}"], "", $match);
                return array_key_exists($match, $businessParts) ? $businessParts[$match][array_rand($businessParts[$match])] : "";
            }, $template
        );
    }

    /**
     * Страна
     * @throws Exception
     */
    public function country(): string
    {
        return Random::elementFromArray($this->getResourceByKey("country"));
    }

    /**
     * Название города
     * @throws Exception
     */
    public function city(): string
    {
        return Random::elementFromArray($this->getResourceByKey("city"));
    }

    /**
     * Название улицы
     * @throws Exception
     */
    public function streetName(): string
    {
        return Random::elementFromArray($this->getResourceByKey("street"));
    }

    /**
     * Latitude
     * @return float
     */
    public function lat(): float
    {
        return number_format(Random::float(-90, 90), 6);
    }

    /**
     * longitude
     * @return float
     */
    public function lng(): float
    {
        return number_format(Random::float(-180, 180), 6);
    }

    /**
     * Адрес в указанном формате
     * @throws Exception
     */
    public function address(?string $template = null): string
    {
        if (is_null($template)) {
            $template = Random::elementFromArray($this->getCachedResourceMixed("addressFormat", "full"));
        }
        $addressParts = $this->getResourceByKey("addressParts");
        $template = preg_replace_callback(
            '/{zipMask}/m', fn($match) => $this->getGenerator()->digitMaskNotZero(Random::elementFromArray($this->getResourceByKey("zipMask"))), $template
        );
        $template = preg_replace_callback(
            '/{country}/m', fn($match) => $this->country(), $template
        );
        $template = preg_replace_callback(
            '/{region}/m', fn($match) => Random::elementFromNullableArray($addressParts["region"]), $template
        );
        $template = preg_replace_callback(
            '/{city}/m', fn($match) => $this->city(), $template
        );
        $template = preg_replace_callback(
            '/{street}/m', fn($match) => $this->streetName(), $template
        );
        $template = preg_replace_callback(
            '/{lat}/m', fn($match) => $this->lat(), $template
        );
        $template = preg_replace_callback(
            '/{lng}/m', fn($match) => $this->lng(), $template
        );
        $template = preg_replace_callback(
            '/{houseNumber}/m', fn($match) => (int)$this->getGenerator()->digitMaskNotZero(Random::elementFromArray($this->getResourceByKey("houseNumber"))), $template
        );
        $template = preg_replace_callback(
            '/{flatNumber}/m', fn($match) => (int)$this->getGenerator()->digitMaskNotZero(Random::elementFromArray($this->getResourceByKey("flatNumber"))), $template
        );
        return preg_replace_callback(
            '/{[A-z]+}/m', function ($matches) use ($addressParts) {
                $match = reset($matches);
                $match = str_replace(["{", "}"], "", $match);
                return array_key_exists($match, $addressParts) ? $addressParts[$match][array_rand($addressParts[$match])] : '{'.$match.'}';
            }, $template
        );
    }

    /**
     * Короткий адрес
     * @return string
     * @throws Exception
     */
    public function addressShort(): string
    {
        return $this->address(Random::elementFromArray($this->getCachedResourceMixed("addressFormat", "short")));
    }
}