<?php
function getCoinInfo($coinCode){
	$coinbasePublicAPI = 'https://api.coinmarketcap.com/v1/ticker/';
	$coinData = file_get_contents($coinbasePublicAPI);
	$coinData = json_decode($coinData, true);
	$numCoinbaseCoins = sizeof ($coinData);
	
	for ( $i=0; $i<$numCoinbaseCoins; $i++) {   
		if(strtoupper($coinCode) == strtoupper($coinData[$i]['symbol'])){
			return $coinData[$i];
		}else{
			continue;
		}
	}
		
}
?>