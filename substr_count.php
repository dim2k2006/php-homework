<?php
$text = 'This is a test';
echo substr_count($text, 'is', 3, 5); // 2

echo "<br>";

//собственная реализация
function my_substr_count ($text, $string, $offset = 0, $length = 0) {
	if (($offset+$length) > strlen($text)) {
		echo "error!";
		exit;
	}
	if($length == 0) {
		$text = $text;
	} else {
		$tmp = str_split($text);
		$text = "";
		for ($i = $offset; $i <= ($offset+$length); $i++) {
			$text .= $tmp[$i];
		}
	}
	$string = '/'.$string.'/';
	preg_match_all($string, $text, $matches, PREG_OFFSET_CAPTURE, 0);
	echo '<br>'.count($matches[0]);
}


echo my_substr_count ($text, 'is', 3, 5);


