<?php

require_once('../classes/Binance.php');

/**
 * @var array
 */
$prices = (new Binance)->prices();

printf("%s", json_encode($prices, JSON_PRETTY_PRINT));

// [
//     {
//         "symbol": "ETHBTC",
//         "price": "0.08285500"
//     },
//     {
//         "symbol": "LTCBTC",
//         "price": "0.00319100"
//     },
//     {
//         "symbol": "BNBBTC",
//         "price": "0.01150800"
//     },
//     ...
// ]