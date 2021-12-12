<?php

declare(strict_types = 1);

require_once('../classes/Http.php');

use App\Classes\Http;

class Binance
{
    /**
     * @var App\Classes\Http
     */
    private $http;

    function __construct() {
        $this->http = new Http;
    }

    /**
     * @param string $simbol
     * @return array
     */
    public function prices(string $symbol = null)
    {
        return $this->http->get('/ticker/price', empty($symbol) ? [] : ['symbol' => $symbol]);
    }

    public function balances()
    {
        return $this->http->get('/account', [], true);
    }
}