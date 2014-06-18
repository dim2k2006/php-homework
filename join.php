<?php
$array = array('The', 'only', 'way', 'to', 'do', 'great', 'work', 'is', 'to', 'love', 'what', 'you', 'do.');
$string = join("-", $array);

echo $string."<br>";

//собственная реализация
function my_join ($separator, array $array) {
	$html ="";
	$countArray = count($array);
	for ($i=0; $i < $countArray ; $i++) { 
		$html .= ($i == $countArray - 1) ? $array[$i] : $array[$i].$separator;
	}
	return $html;
}


echo my_join ($separator = "-", $array);

