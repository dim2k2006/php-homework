<?php
function data_decrypt ($sourceFile, $outPutFile) {

	$key = find_key ($sourceFile);

	if (file_exists($sourceFile)) {
		$string = file_get_contents($sourceFile);
		$array = str_split($string);
		$encString = "";
	
		for ($i = 0; $i < count($array); $i++) {
			$encString .= chr(ord($array[$i])^$key);
		}
		
		file_put_contents($outPutFile, $encString);
		echo 'XOR_KEY = '.$key.'<br><br>'.$encString;
		return true;
	} else {
		return false;
	}
}

function find_key ($sourceFile) {
	if (file_exists($sourceFile)) {
		$string = file_get_contents($sourceFile);
		$array = str_split($string);
		for ($i = 0; $i < 10; $i++) {
			for ($n = 0; $n < 40; $n++) {
				$value = chr(ord($array[$n])^$i);
				if($value == " ") {
					$key = $i;
				}
			}
		}
		return $key;
	}else {
		exit;
	}
}



data_decrypt ('encrypted.txt', 'decrypted.txt');

