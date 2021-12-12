<?php

require_once('../classes/Binance.php');

printf("%s\n", json_encode((new Binance)->balances(), JSON_PRETTY_PRINT));

// {
//     "makerCommission": 10,
//     "takerCommission": 10,
//     "buyerCommission": 0,
//     "sellerCommission": 0,
//     "canTrade": true,
//     "canWithdraw": true,
//     "canDeposit": true,
//     "updateTime": 1639185400713,
//     "accountType": "SPOT",
//     "balances": [
//         {
//             "asset": "BTC",
//             "free": "0.00000253",
//             "locked": "0.00000000"
//         },
//         {
//             "asset": "LTC",
//             "free": "0.00000000",
//             "locked": "0.00000000"
//         },
//         ...
//     ],
//     "permissions": [
//         "SPOT"
//     ]
// }