<?php

require_once('../classes/Binance.php');

printf("%s\n", json_encode((new Binance)->trades('COTIBUSD'), JSON_PRETTY_PRINT));

// [
//     {
//         "symbol": "COTIBUSD",      
//         "id": 4800922,
//         "orderId": 55741790,       
//         "orderListId": -1,
//         "price": "0.40130000",     
//         "qty": "579.00000000",     
//         "quoteQty": "232.35270000",
//         "commission": "0.00000000",
//         "commissionAsset": "BUSD", 
//         "time": 1638580215514,     
//         "isBuyer": false,
//         "isMaker": true,
//         "isBestMatch": true        
//     },
//     {
//         "symbol": "COTIBUSD",
//         "id": 4819104,
//         "orderId": 55987178,
//         "orderListId": -1,
//         "price": "0.31280000",
//         "qty": "71.00000000",
//         "quoteQty": "22.20880000",
//         "commission": "0.02220880",
//         "commissionAsset": "BUSD",
//         "time": 1638601883511,
//         "isBuyer": false,
//         "isMaker": false,
//         "isBestMatch": true
//     },
//     {
//         "symbol": "COTIBUSD",
//         "id": 4819105,
//         "orderId": 55987178,
//         "orderListId": -1,
//         "price": "0.31270000",
//         "qty": "1435.00000000",
//         "quoteQty": "448.72450000",
//         "commission": "0.44872450",
//         "commissionAsset": "BUSD",
//         "time": 1638601883511,
//         "isBuyer": false,
//         "isMaker": false,
//         "isBestMatch": true
//     },
//     {
//         "symbol": "COTIBUSD",
//         "id": 4819568,
//         "orderId": 56002793,
//         "orderListId": -1,
//         "price": "0.32690000",
//         "qty": "899.00000000",
//         "quoteQty": "293.88310000",
//         "commission": "0.89900000",
//         "commissionAsset": "COTI",
//         "time": 1638603050979,
//         "isBuyer": true,
//         "isMaker": false,
//         "isBestMatch": true
//     },
//     {
//         "symbol": "COTIBUSD",
//         "id": 4819569,
//         "orderId": 56002793,
//         "orderListId": -1,
//         "price": "0.32690000",
//         "qty": "540.00000000",
//         "quoteQty": "176.52600000",
//         "commission": "0.54000000",
//         "commissionAsset": "COTI",
//         "time": 1638603050979,
//         "isBuyer": true,
//         "isMaker": false,
//         "isBestMatch": true
//     }
// ]
