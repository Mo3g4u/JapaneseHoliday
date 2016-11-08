<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/05
 * Time: 22:18
 */

use KazuyaTakeuchi\JapaneseHoliday\JapaneseHoliday;

class JapaneseHolidayTest extends \PHPUnit_Framework_TestCase
{

    protected $JapaneseHoliday;

    protected function setUp()
    {
        $this->JapaneseHoliday = new KazuyaTakeuchi\JapaneseHoliday\JapaneseHoliday();
    }

    public function testGetHolidays()
    {
        $holidays = $this->JapaneseHoliday->getHolidays('2016');
        $this->assertEquals(17, count($holidays));
        $this->assertEquals('2016-01-01', $holidays[0]); // 元日
        $this->assertEquals('2016-01-11', $holidays[1]); // 成人の日
        $this->assertEquals('2016-02-11', $holidays[2]); // 建国記念日
        $this->assertEquals('2016-03-20', $holidays[3]); // 春分の日
        $this->assertEquals('2016-03-21', $holidays[4]); // 振替休日
        $this->assertEquals('2016-04-29', $holidays[5]); // 昭和の日
        $this->assertEquals('2016-05-03', $holidays[6]); // 憲法記念日
        $this->assertEquals('2016-05-04', $holidays[7]); // みどりの日
        $this->assertEquals('2016-05-05', $holidays[8]); // こどもの日
        $this->assertEquals('2016-07-18', $holidays[9]); // 海の日
        $this->assertEquals('2016-08-11', $holidays[10]); // 山の日
        $this->assertEquals('2016-09-19', $holidays[11]); // 敬老の日
        $this->assertEquals('2016-09-22', $holidays[12]); // 秋分の日
        $this->assertEquals('2016-10-10', $holidays[13]); // 体育の日
        $this->assertEquals('2016-11-03', $holidays[14]); // 文化の日
        $this->assertEquals('2016-11-23', $holidays[15]); // 勤労感謝の日
        $this->assertEquals('2016-12-23', $holidays[16]); // 天皇誕生日

    }

    public function testIsHoliday()
    {
        $this->assertEquals(true, $this->JapaneseHoliday->isHoliday(2016, 11, 3));
        $this->assertEquals(false, $this->JapaneseHoliday->isHoliday(2016,11, 2));

    }

}