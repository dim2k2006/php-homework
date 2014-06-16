<?php

$string = "These are a few words :) ...   ";

$stringArray = str_split($string);
var_dump($stringArray);

echo "<br><br>";


function my_str_split ($string) {
	$stringLength = strlen($string);
	$array = array();
	for ($i=0; $i < $stringLength; $i++) { 
		array_push($array, $string{$i});
	}
	return $array;
}


var_dump(my_str_split ($string));

