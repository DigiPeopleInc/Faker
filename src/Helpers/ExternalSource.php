<?php

namespace Digipeopleinc\Faker\Helpers;

use Exception;

class ExternalSource
{
    /**
     * Получить данные по url
     * @param string $url
     * @return string
     * @throws Exception
     */
    public static function get(string $url): string
    {
        if (empty($url)) {
            throw new Exception("Url не может быть пустым");
        }
        if (function_exists('curl_exec')) {
            $client = curl_init();
            curl_setopt($client, CURLOPT_URL, $url);
            curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($client, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($client, CURLOPT_TIMEOUT, 30);
            curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($client);
            $info = curl_getinfo($client);
            curl_close($client);
            if ($info["http_code"] < 200 || $info["http_code"] > 299) {
                throw new Exception("Ошибка обращения к $url [{$info["http_code"]}]");
            }
        } else {
            $result = file_get_contents($url);
            if ($result === false) {
                throw new Exception("Ошибка обращения к $url");
            }
        }
        return $result;
    }
}
