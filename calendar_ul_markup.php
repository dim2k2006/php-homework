<?php
//устанавливаем часовой пояс
date_default_timezone_set('Europe/Moscow');

//получаем наименование текущего месяца
$monthName = date('F');

//получаем порядковый номер текущего месяца
$monthNum = date('n');

//получаем порядковый номер года, 4 цифры
$yearName = date('Y');

//получаем количество дней в указанном месяце от 28 до 31
$daysAmmount = date('t');

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
echo "<style>ul{display:block;width:830px;margin:0 auto;list-style-type:none;}ul li{display:block;float:left;width:100px;min-height:38px;padding:8px;text-align:center;border:1px solid #000;}h1{width:100%;text-align:center;}</style>";

//выводим заголовок
echo "<h1>".$monthName." ".$yearName."</h1>";

echo "<ul>";
echo "<li>Monday</li><li>Tuesday</li><li>Wednesday</li><li>Thursday</li><li>Friday</li><li>Saturday</li><li>Sunday</li>".$firstLine;

//цикл: от 1 до количества дней в месяце отображаем ячейку с датой
for($i = 1; $i <= $daysAmmount; $i++) {
    echo "<li>".$i."</li>";
}

//дорисовывем пустые ячейки, что бы закончить месяц
echo $lastLine."</ul>";