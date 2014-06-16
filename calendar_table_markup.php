<?php
date_default_timezone_set('Europe/Moscow');

$monthName = date('F');
$monthNum = date('n');
$yearName = date('Y');
$daysAmmount = date('t');
$firstDayOfMonth = date("l", mktime(0, 0, 0, $monthNum, 1, $yearName));
$lastDayOfMonth = date("l", mktime(0, 0, 0, $monthNum, $daysAmmount, $yearName));

$firstWeekDay = date("w", mktime(0, 0, 0, $monthNum, 1, $yearName));
$firstWeekDay = ($firstWeekDay == 0)? 7 : $firstWeekDay - 1;

$WeekDays = array("Monday" => "7", "Tuesday" => "6", "Wednesday" => "5", "Thursday" => "4", "Friday" => "3", "Saturday" => "2", "Sunday" => "1");
$firstWeek = str_repeat('<td></td>', $firstWeekDay - 1);




echo "<h1 style='wifth:100%;text-align:center;'>".$monthName." ".$yearName."</h1>";
echo "<style>table tr td{padding:8px;text-align:center;}</style>";

echo "<table border='1' style='border-collapse:collapse;' align='center'>";
echo "<tr><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td><td>Sunday</td></tr>";
echo $firstWeek;
for($i = 1; $i <= $WeekDays[$firstDayOfMonth]; $i++) {
    echo "<td>".$i."</td>";
}
echo "</tr>";

$restWeeksStart = $WeekDays[$firstDayOfMonth] + 1;
$restDaysAmmount = $daysAmmount - $WeekDays[$firstDayOfMonth];
$restWeeks = ceil($restDaysAmmount / 7);

for($i = 0; $i < $restWeeks; $i++) {
   echo "<tr>";
   for($n = 0; $n <= 6; $n++) {
   		if ($restWeeksStart > $daysAmmount) {
   			echo "<td></td>";
   		} else {
   			echo "<td>".$restWeeksStart."</td>";
   		}
   		$restWeeksStart++;
   }
   echo "</tr>";
}
echo "</table>";
?>