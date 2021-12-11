<?php

declare(strict_types = 1);

require_once('../classes/Http.php');

use App\Classes\Http;

class Binance
{
    function __construct() {
        // 
    }

    public function prices()
    {
        return Http::get('/ticker/price');
    }
}