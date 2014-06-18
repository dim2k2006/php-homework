<?php
if (!defined('_ENCRYPT_KEY')) define('_ENCRYPT_KEY', 280591);

/**
*Шифрует данные с использованием ключа
*@param string $sourceFile - входной файл
*@param string $outPutFile - выходной файл
*@return bool
*/
function data_encrypt ($sourceFile, $outPutFile) {
	if (file_exists($sourceFile)) {
		$string = file_get_contents('source.txt');
		$array = str_split($string);
		$encString = "";
	
		for ($i = 0; $i < count($array); $i++) {
			$encString .= chr(ord($array[$i])^_ENCRYPT_KEY);
		}
		
		file_put_contents($outPutFile, $encString);
		return true;
	} else {
		return false;
	}
}


data_encrypt ('source.txt', 'encrypted.txt');
