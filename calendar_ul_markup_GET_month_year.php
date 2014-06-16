<?php
//устанавливаем часовой пояс
date_default_timezone_set('Europe/Moscow');

function get_calendar($month, $year) {


	//получаем наименование текущего месяца
	//$monthName = date('F');
	$monthName = date('F', mktime(0,0,0,$month));

	//получаем порядковый номер текущего месяца
	//$monthNum = date('n');
	$monthNum = $month;

	//получаем порядковый номер года, 4 цифры
	//$yearName = date('Y');
	$yearName = $year;

	//получаем количество дней в указанном месяце от 28 до 31
	//$daysAmmount = date('t');
	$daysAmmount = cal_days_in_month(CAL_GREGORIAN, $monthNum, $yearName);

	//получаем название первого дня месяца
	$firstDayOfMonth = date("l", mktime(0, 0, 0, $monthNum, 1, $yearName));

	//получаем название последнего дня месяца
	$lastDayOfMonth = date("l", mktime(0, 0, 0, $monthNum, $daysAmmount, $yearName));

	//получаем порядковый номер первого дня первой недели
	$firstWeekDay = date("w", mktime(0, 0, 0, $monthNum, 1, $yearName));

	//если порядковый номер первого дня первой недели = 0 (воскресенье), то порядковый номер дня первой недели = 7 - 1
	//в противном случае порядковый номер первого дня первой недели = порядковый номер дня первой недели - 1
	$firstWeekDay = ($firstWeekDay == 0)? 7 - 1 : $firstWeekDay - 1;


	//получаем порядковый номер последнего дня последней недели
	$lastWeekDay = date("w", mktime(0, 0, 0, $monthNum, $daysAmmount, $yearName));

	//если порядковый номер последнего дня последней недели = 0, то присваем ему значение 0
	//в противном случае порядковый номер последнего дня последней недели = 7 - порядковый номер последнего дня последней недели
	$lastWeekDay = ($lastWeekDay == 0)? 0 : 7 - $lastWeekDay;

	//зная порядковый номер первого дня первой недели уменьшенный на 1, получаем сколько пустых ячеек необходимо отобразить для первой недели
	$firstLine = str_repeat('<li></li>', $firstWeekDay);

	//аналогично, только в обратном порядке для последней недели
	$lastLine = str_repeat('<li></li>', $lastWeekDay);

	//отрисовываем стили
	$html = "<style>ul{display:block;width:830px;margin:0 auto;list-style-type:none;}ul li{display:block;float:left;width:100px;min-height:38px;padding:8px;text-align:center;border:1px solid #000;}h1{width:100%;text-align:center;}</style>";

	//выводим заголовок
	$html .= "<h1>".$monthName." ".$yearName."</h1>";

	$html .= "<ul>";
	$html .= "<li>Monday</li><li>Tuesday</li><li>Wednesday</li><li>Thursday</li><li>Friday</li><li>Saturday</li><li>Sunday</li>".$firstLine;

	//цикл: от 1 до количества дней в месяце отображаем ячейку с датой
	for($i = 1; $i <= $daysAmmount; $i++) {
    	$html .= "<li>".$i."</li>";
	}

	//дорисовывем пустые ячейки, что бы закончить месяц
	$html .= $lastLine."</ul>";
	return $html;
}

if (isset($_GET['month'])) {
	$month = $_GET['month'];
} else {
	$month = date('n');
}

if (isset($_GET['year'])) {
	$year = $_GET['year'];
} else {
	$year = date('Y');
}


echo get_calendar($month, $year);