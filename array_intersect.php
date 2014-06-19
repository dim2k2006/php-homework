<?php
$array1 = array("green", "red", "blue");
$array2 = array("green", "blue", "red");
$array3 = array("green", "red", "white");
$array4 = array("green", "orange", "red");

$result = array_intersect($array1, $array2, $array3, $array4);
print_r($result);

echo '<br><br>';


function my_array_intersect () {
	$arg_list = func_get_args();
	$sourceArray = $arg_list[0];
	$outPutArray = Array();
	$t = 0;
	for ($i = 0; $i < count($sourceArray); $i++) {
		for ($n = 1; $n < count($arg_list); $n++) {
			if (in_array($sourceArray[$i], $arg_list[$n])) {
				$t = $t + 1;
			}
		}
		if ($t == (count($arg_list) - 1)) {
			$key = array_search($sourceArray[$i], $sourceArray);
			$outPutArray[$key] = $sourceArray[$i];
		}
		$t = 0;
	}
	
	for ($d = 0; $d < count($outPutArray); $d++) {
		
	}
	print_r($outPutArray);
}



my_array_intersect($array1, $array2, $array3, $array4);
