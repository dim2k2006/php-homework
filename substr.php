<?php

$string = "abcdef"; //6 символов
$rest = substr($string, -1, 1);


echo $rest;

echo "<br><br>";

//собственная реализация
function my_substr ($string, $start = 0, $length = 0) {

	$html = "";
	$array = str_split($string);

	if ($start > 0 && $length == 0) {
		$max = count($array) - 1;
		for ($i = $start; $i <= $max; $i++) {
			$html .= $array[$i];
		}
	}
	
	if ($start > 0 && $length > 0) {
		$max = count($array);
		for ($i = $start; $i <= $max - $length; $i++) {
			$html .= $array[$i];
		}
	}
	
	if ($start == 0 && $length > 0) {
		$max = count($array);
		if ($length > $max) {
			$max = $max - 1;
		} else {
			$max = $max - $length + 1;
		}
		for ($i = $start; $i <= $max; $i++) {
			$html .= $array[$i];
		}
	}
	
	if (($start < 0 && $length == 0)) {
		$max = count($array);
		$stringLength = strlen($string);
		if (abs($start) > $stringLength) {
			$start = 0;
		}else {
			$start = $max + $start;
		}
		for ($i = $start; $i <= $max - 1; $i++) {
			$html .= $array[$i];
		}
	}
	
	if (($start > 0 && $length < 0)) {
		$max = count($array) - 1;
		for ($i = $start; $i <= $max + $length; $i++) {
			$html .= $array[$i];
		}
	}
	
	if (($start == 0 && $length < 0)) {
		$max = count($array) - 1;
		for ($i = $start; $i <= $max + $length; $i++) {
			$html .= $array[$i];
		}
	}
	
	if (($start < 0 && $length > 0)) {
		$max = count($array);
		$start = $max + $start;
		for ($i = $start; $i < $start + $length; $i++) {
			$html .= $array[$i];
		}
	}
	
	if (($start < 0 && $length < 0)) {
		$max = count($array);
		$start = $max + $start;
		for ($i = $start; $i <= $max - 1 + $length; $i++) {
			$html .= $array[$i];
		}
	}
	
	return $html;
}

echo my_substr ($string, -1, 1);


