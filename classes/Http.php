<?php

declare(strict_types = 1);

namespace App\Classes;

require_once('../config.php');

use Exception;

class Http
{
    /**
     * @var string
     */
    private const API_URL = 'https://api.binance.com/api/v3';

    /**
     * @var object
     */
    private $config;

    function __construct() {
        global $config;
        $this->config = (object) $config;
    }

    /**
     * Create GET request.
     * 
     * @param string $path
     * @param array $query
     * @param bool $auth
     * @return array
     */
    public function get($path, $query = [], $auth = false)
    {
        return $this->request('get', $path, $query, $auth);
    }

    /**
     * Create POST request.
     * 
     * @param string $path
     * @param array $query
     * @param bool $auth
     * @return array
     */
    public function post($path, $query = [], $auth = false)
    {
        return $this->request('post', $path, $query, $auth);
    }

    /**
     * Create HTTP request using cURL.
     * 
     * @param string $method
     * @param string $path
     * @param array $query
     * @param bool $auth
     * @return array
     * @throws \Exception
     */
    private function request($method, $path, $query, $auth)
    {
        if (function_exists('curl_init') === false) {
            throw new \Exception('sorry curl is not installed');
        }

        $url = sprintf('%s%s', self::API_URL, $path);
        $headers = [];

        if ($auth) {
            if (empty($this->config->api_key) || empty($this->config->api_secret)) {
                throw new \Exception('you are missing api_key and/or secret_key in configuration file');
            }

            $query['timestamp'] = number_format(microtime(true) * 1000, 0, '.', '');
            $query['signature'] = hash_hmac('sha256', http_build_query($query), $this->config->api_key);
            $headers[] = "X-MBX-APIKEY: {$this->config->api_secret}";
        }

        if (count($query)) {
            $url .= '?';
            $url .= http_build_query($query);
        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL            => $url,
            CURLOPT_CUSTOMREQUEST  => strtoupper($method),
            CURLOPT_POST           => $method == 'post',
            CURLOPT_ENCODING       => 'UTF-8',
            CURLOPT_HTTPHEADER     => $headers,
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