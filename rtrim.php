<?php

$text = "These are a few words :) ...   ";
var_dump($text);
echo "<br>";
$trimmed = rtrim($text);
var_dump($trimmed);

echo "<br><br><br>";


/**
*Удаляет пробелы у строки справа
*@param string $text
*@return string
*/
function my_rtrim ($text) {
	$string = my_str_split ($text);

	for ($i = count($string) - 1; $i > 0 ; $i--) { 
		if ($string[$i] == " ") {
			unset($string[$i]);
		} else {
			break;
		}
	}
	
	return $newString = my_implode ($string, $separator = "");
}


/**
*Преобразует строку в массив
*@param string $string
*@return array
*/
function my_str_split ($string) {
	$stringLength = strlen($string);
	$array = array();
	for ($i=0; $i < $stringLength; $i++) { 
		array_push($array, $string{$i});
	}
	return $array;
}


/**
*Объединяет элементы массива в строку
*@param array $array
*@param string $separator
*@return string
*/
function my_implode (array $array, $separator) {
	$html ="";
	for ($i=0; $i < count($array) ; $i++) { 
		$html .= $array[$i].$separator;
	}
	return $html;
}




$myTrimmed = my_rtrim ($text);
var_dump($myTrimmed);

