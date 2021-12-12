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
     * Test connectivity.
     * 
     * @return bool
     */
    public function ping()
    {
        return $this->http->get('/ping') == [];
    }

    /**
     * Test connectivity and get the current server time.
     * 
     * @return array
     */
    public function time()
    {
        return $this->http->get('/time');
    }

    /**
     * Latest price for a specific symbol or symbols.
     * 
     * @param string $simbol
     * @return array
     */
    public function prices($symbol = null)
    {
        return $this->http->get('/ticker/price', empty($symbol) ? [] : ['symbol' => $symbol]);
    }

    /**
     * Get current account information.
     * 
     * @return array
     */
    public function account()
    {
        return $this->http->get('/account', [], true);
    }

    /**
     * Funds transfer.
     * 
     * @param string $currency
     * @param string $type
     * @param string $amount
     * 
     * @param array
     */
    public function transfer($currency, $type, $amount)
    {
        $body = [
            'currency' => $currency,
            'type'     => $type,
            'amount'   => $amount,
        ];

        return $this->http->post('/account', $body, true);
    }

    /**
     * Get historical trades for a specific symbol.
     * 
     * @param string $symbol
     * @return array
     */
    public function trades($symbol = null)
    {
        return $this->http->get('/trades', ['symbol' => $symbol], true);
    }

    // 
}
