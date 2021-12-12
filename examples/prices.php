<?php

require_once('../classes/Binance.php');

$binance = new Binance;

printf("%s\n", json_encode($binance->prices(), JSON_PRETTY_PRINT));

// [
//     {
//         "symbol": "ETHBTC",
//         "price": "0.08285500"
//     },
//     {
//         "symbol": "LTCBTC",
//         "price": "0.00319100"
//     },
//     ...
// ]

printf("%s\n", json_encode($binance->prices('BTCUSDC'), JSON_PRETTY_PRINT));

// {
//     "symbol": "BTCUSDC",
//     "price": "48550.63000000"
// }
