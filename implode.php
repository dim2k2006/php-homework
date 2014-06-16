<?php
$array = array('The', 'only', 'way', 'to', 'do', 'great', 'work', 'is', 'to', 'love', 'what', 'you', 'do.');
$string = implode(" ", $array);

echo $string."<br>";

//собственная реализация
function my_implode (array $array, $separator) {
	$html ="";
	for ($i=0; $i < count($array) ; $i++) { 
		$html .= $array[$i].$separator;
	}
	return $html;
}


echo my_implode ($array, $separator = " ");

