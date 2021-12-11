<?php

declare(strict_types = 1);

namespace App\Classes;

use Exception;

class Http
{
    /**
     * @var string
     */
    private const API_URL = 'https://api.binance.com/api/v3';

    /**
     * Create GET request.
     * 
     * @param string $path
     * @return array
     */
    public static function get($path)
    {
        return self::request('get', $path);
    }

    /**
     * Create POST request.
     * 
     * @param string $path
     * @return array
     */
    public static function post($path)
    {
        return self::request('post', $path);
    }

    /**
     * Create HTTP request using cURL.
     * 
     * @param string $method
     * @param string $path
     * @return array
     * @throws \Exception
     */
    private static function request($method, $path)
    {
        if (function_exists('curl_init') === false) {
            throw new \Exception('sorry curl is not installed');
        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL            => sprintf('%s%s', self::API_URL, $path),
            CURLOPT_CUSTOMREQUEST  => strtoupper($method),
            CURLOPT_POST           => $method == 'post',
            CURLOPT_ENCODING       => 'UTF-8',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new \Exception(curl_error($curl));
        }
        
        curl_close($curl);

        return json_decode($response, true);
    }
}