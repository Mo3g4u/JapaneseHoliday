<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/25
 * Time: 11:16
 */
include '../vendor/autoload.php';

use Mo3g4u\JapaneseHoliday\JapaneseHoliday;

$year = 0;
if(isset($_GET['year']) && preg_match('/^[0-9]+$/', $_GET['year']) ){
    $year = $_GET['year'];
}
$japaneseHoliday = new JapaneseHoliday($year);

$holidays = $japaneseHoliday->getHolidays('Y年m月d日');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>JapaneseHoliday DEMO</title>
</head>
<body>
<a href="?year=<?php echo $japaneseHoliday->getYear() - 1; ?>">prev</a>
<a href="?year=0">now</a>
<a href="?year=<?php echo $japaneseHoliday->getYear() + 1; ?>">next</a>
<p><?php echo $japaneseHoliday->getYear()?>年祝日一覧</p>
<ul>
    <?php foreach ($holidays as $holiday){ ?>
        <li><?php echo $holiday['date']?> - <?php echo $holiday['caption']?></li>
    <?php } ?>
</ul>
<p>祝日は「<?php echo count($holidays)?>」日です。</p>
</body>
</html>

