<?php
function getCoinInfoRaw($coinCode){
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

function getCoinInfoFormat($coinCode){
	$coinData = getCoinInfoRaw($coinCode);
	
	$coinData['price_usd'] = "$" . $coinData['price_usd'];
	$coinData['percent_change_1h'] = $coinData['percent_change_1h'] . '%';
	$coinData['percent_change_24h'] = $coinData['percent_change_24h'] . '%';
	$coinData['percent_change_7d'] = $coinData['percent_change_7d'] . '%';
	$coinData['last_updated'] = date('m/d/Y h:i:s A', $coinData['last_updated']);			
	
	return $coinData;
}
?>