<?php
date_default_timezone_set('Europe/Moscow');

$monthName = date('F');
$monthNum = date('n');
$yearName = date('Y');
$daysAmmount = date('t');
$firstDayOfMonth = date("l", mktime(0, 0, 0, $monthNum, 1, $yearName));
$lastDayOfMonth = date("l", mktime(0, 0, 0, $monthNum, $daysAmmount, $yearName));

echo "<h1 style='wifth:100%;text-align:center;'>".$monthName." ".$yearName."</h1>";
echo "<style>ul{display:block;width:830px;margin:0 auto;list-style-type:none;}ul li{display:block;float:left;width:100px;min-height:38px;padding:8px;text-align:center;border:1px solid #000;}</style>";

switch ($firstDayOfMonth) {
	case 'Monday':
		$firstLine = "";
        break;
	case 'Tuesday':
		$firstLine = "<li></li>";
        break;
	case 'Wednesday':
		$firstLine = "<li></li><li></li>";
        break;
	case 'Thursday':
		$firstLine = "<li></li><li></li><li></li>";
        break;
	case 'Friday':
		$firstLine = "<li></li><li></li><li></li><li></li>";
        break;
	case 'Saturday':
		$firstLine = "<li></li><li></li><li></li><li></li><li></li>";
        break;
	case 'Sunday':
		$firstLine = "<li></li><li></li><li></li><li></li><li></li><li></li>";
        break;
}

switch ($lastDayOfMonth) {
	case 'Monday':
		$lastLine = "<li></li><li></li><li></li><li></li><li></li><li></li>";
        break;
	case 'Tuesday':
		$lastLine = "<li></li><li></li><li></li><li></li><li></li>";
        break;
	case 'Wednesday':
		$lastLine = "<li></li><li></li><li></li><li></li>";
        break;
	case 'Thursday':
		$lastLine = "<li></li><li></li><li></li>";
        break;
	case 'Friday':
		$lastLine = "<li></li><li></li>";
        break;
	case 'Saturday':
		$lastLine = "<li></li>";
        break;
	case 'Sunday':
		$lastLine = "";
        break;
}


echo "<ul>";
echo "<li>Monday</li><li>Tuesday</li><li>Wednesday</li><li>Thursday</li><li>Friday</li><li>Saturday</li><li>Sunday</li>".$firstLine;
for($i = 1; $i <= $daysAmmount; $i++) {
	echo "<li>".$i."</li>";
}
echo $lastLine."</ul>";
 ?>