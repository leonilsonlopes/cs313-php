<?php
function getCoinInfo($coinCode){
	echo "<br/>Received coinCode: " . $coinCode;
	$coinbasePublicAPI = 'https://api.coinmarketcap.com/v1/ticker/';
	$coinData = file_get_contents($coinbasePublicAPI);
	$coinData = json_decode($coinData, true);
	$numCoinbaseCoins = sizeof ($coinData);
	
	for ( $i=0; $i<$numCoinbaseCoins; $i++) {   
		if(strtoupper($coinCode) == strtoupper($coinData[$i]['symbol'])){
			$coinData[$i]['price_usd'] = '$' . $coinData[$i]['price_usd'];
			$coinData[$i]['percent_change_1h'] = $coinData[$i]['percent_change_1h'] . '%';
			$coinData[$i]['percent_change_24h'] = $coinData[$i]['percent_change_24h'] . '%';
			$coinData[$i]['percent_change_7d'] = $coinData[$i]['percent_change_7d'] . '%';
			$coinData[$i]['last_updated'] = date('m/d/Y h:i:s A', $coinData[$i]['last_updated']);
			echo "<br/>dump: " . var_dump($coinData);
			return $coinData[$i];
		}else{
			continue;
		}
	}
	
}
?>