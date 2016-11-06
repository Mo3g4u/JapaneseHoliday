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

    }

    /*
    public function testIsHoliday()
    {
        $this->assertEquals(true, $this->JapaneseHoliday->isHoliday('2016-11-03'));
        //$this->assertEquals(false, $this->JapaneseHoliday->isHoliday('2016-11-02'));

    }
    */

}