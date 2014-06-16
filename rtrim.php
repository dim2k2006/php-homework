<?php

$text = "These are a few words :) ...   ";
var_dump($text);
echo "<br>";
$trimmed = rtrim($text);
var_dump($trimmed);

echo "<br><br><br>";

function my_rtrim ($text) {
	$string = str_split($text);
	
	for ($i = count($string) - 1; $i > 0 ; $i--) { 
		if ($string[$i] == " ") {
			unset($string[$i]);
		} else {
			break;
		}
	}
	
	return $newString = implode("", $string);
}


$myTrimmed = my_rtrim ($text);
var_dump($myTrimmed);

