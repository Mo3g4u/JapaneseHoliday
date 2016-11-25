<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/25
 * Time: 13:10
 */
include '../vendor/autoload.php';

use Mo3g4u\JapaneseHoliday\JapaneseHoliday;

$year = 0;
if(isset($argv[1])){
    $year = $argv[1];
}
$japaneseHoliday = new JapaneseHoliday($year);

$holidays = $japaneseHoliday->getHolidays('Y年m月d日');

foreach ($holidays as $holiday){
    echo $holiday['date'] . ' : ' . $holiday['caption'] . "\n";
}
