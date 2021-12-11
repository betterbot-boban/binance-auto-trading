<?php

declare(strict_types = 1);

require_once('../classes/Http.php');

use App\Classes\Http;

class Binance
{
    function __construct() {
        // 
    }

    /**
     * @param string $simbol
     * @return array
     */
    public function prices(?string $symbol = null)
    {
        $url = empty($symbol)
                    ? "/ticker/price"
                    : "/ticker/price?symbol={$symbol}";

        return Http::get($url);
    }
}