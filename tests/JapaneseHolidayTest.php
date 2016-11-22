<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/05
 * Time: 22:18
 */

use Mo3g4u\JapaneseHoliday\JapaneseHoliday;

class JapaneseHolidayTest extends \PHPUnit_Framework_TestCase
{

    protected $JapaneseHoliday;

    protected function setUp()
    {
        $this->JapaneseHoliday = new Mo3g4u\JapaneseHoliday\JapaneseHoliday();
    }

    public function testGetHolidays1949()
    {
        $holidays = $this->JapaneseHoliday->getHolidays('1949');
        $this->assertEquals(9, count($holidays));

        $this->assertEquals('元日', $holidays[0]->getCaption());
        $this->assertEquals('1949-01-01', $holidays[0]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('成人の日', $holidays[1]->getCaption());
        $this->assertEquals('1949-01-15', $holidays[1]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('春分の日', $holidays[2]->getCaption());
        $this->assertEquals('1949-03-21', $holidays[2]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('天皇誕生日', $holidays[3]->getCaption());
        $this->assertEquals('1949-04-29', $holidays[3]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('憲法記念日', $holidays[4]->getCaption());
        $this->assertEquals('1949-05-03', $holidays[4]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('こどもの日', $holidays[5]->getCaption());
        $this->assertEquals('1949-05-05', $holidays[5]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('秋分の日', $holidays[6]->getCaption());
        $this->assertEquals('1949-09-23', $holidays[6]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('文化の日', $holidays[7]->getCaption());
        $this->assertEquals('1949-11-03', $holidays[7]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('勤労感謝の日', $holidays[8]->getCaption());
        $this->assertEquals('1949-11-23', $holidays[8]->getDateTime()->format('Y-m-d'));
    }

    public function testGetHolidays1989()
    {
        $holidays = $this->JapaneseHoliday->getHolidays('1989');
        $this->assertEquals(17, count($holidays));

        $this->assertEquals('元日', $holidays[0]->getCaption());
        $this->assertEquals('1989-01-01', $holidays[0]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('振替休日', $holidays[1]->getCaption());
        $this->assertEquals('1989-01-02', $holidays[1]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('成人の日', $holidays[2]->getCaption());
        $this->assertEquals('1989-01-15', $holidays[2]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('振替休日', $holidays[3]->getCaption());
        $this->assertEquals('1989-01-16', $holidays[3]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('建国記念日', $holidays[4]->getCaption());
        $this->assertEquals('1989-02-11', $holidays[4]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('昭和天皇の大喪の礼', $holidays[5]->getCaption());
        $this->assertEquals('1989-02-24', $holidays[5]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('春分の日', $holidays[6]->getCaption());
        $this->assertEquals('1989-03-21', $holidays[6]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('みどりの日', $holidays[7]->getCaption());
        $this->assertEquals('1989-04-29', $holidays[7]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('憲法記念日', $holidays[8]->getCaption());
        $this->assertEquals('1989-05-03', $holidays[8]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('国民の休日', $holidays[9]->getCaption());
        $this->assertEquals('1989-05-04', $holidays[9]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('こどもの日', $holidays[10]->getCaption());
        $this->assertEquals('1989-05-05', $holidays[10]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('敬老の日', $holidays[11]->getCaption());
        $this->assertEquals('1989-09-15', $holidays[11]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('秋分の日', $holidays[12]->getCaption());
        $this->assertEquals('1989-09-23', $holidays[12]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('体育の日', $holidays[13]->getCaption());
        $this->assertEquals('1989-10-10', $holidays[13]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('文化の日', $holidays[14]->getCaption());
        $this->assertEquals('1989-11-03', $holidays[14]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('勤労感謝の日', $holidays[15]->getCaption());
        $this->assertEquals('1989-11-23', $holidays[15]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('天皇誕生日', $holidays[16]->getCaption());
        $this->assertEquals('1989-12-23', $holidays[16]->getDateTime()->format('Y-m-d'));
    }

    public function testGetHolidays2016()
    {
        $holidays = $this->JapaneseHoliday->getHolidays('2016');
        $this->assertEquals(17, count($holidays));

        $this->assertEquals('元日', $holidays[0]->getCaption());
        $this->assertEquals('2016-01-01', $holidays[0]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('成人の日', $holidays[1]->getCaption());
        $this->assertEquals('2016-01-11', $holidays[1]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('建国記念日', $holidays[2]->getCaption());
        $this->assertEquals('2016-02-11', $holidays[2]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('春分の日', $holidays[3]->getCaption());
        $this->assertEquals('2016-03-20', $holidays[3]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('振替休日', $holidays[4]->getCaption());
        $this->assertEquals('2016-03-21', $holidays[4]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('昭和の日', $holidays[5]->getCaption());
        $this->assertEquals('2016-04-29', $holidays[5]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('憲法記念日', $holidays[6]->getCaption());
        $this->assertEquals('2016-05-03', $holidays[6]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('みどりの日', $holidays[7]->getCaption());
        $this->assertEquals('2016-05-04', $holidays[7]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('こどもの日', $holidays[8]->getCaption());
        $this->assertEquals('2016-05-05', $holidays[8]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('海の日', $holidays[9]->getCaption());
        $this->assertEquals('2016-07-18', $holidays[9]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('山の日', $holidays[10]->getCaption());
        $this->assertEquals('2016-08-11', $holidays[10]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('敬老の日', $holidays[11]->getCaption());
        $this->assertEquals('2016-09-19', $holidays[11]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('秋分の日', $holidays[12]->getCaption());
        $this->assertEquals('2016-09-22', $holidays[12]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('体育の日', $holidays[13]->getCaption());
        $this->assertEquals('2016-10-10', $holidays[13]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('文化の日', $holidays[14]->getCaption());
        $this->assertEquals('2016-11-03', $holidays[14]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('勤労感謝の日', $holidays[15]->getCaption());
        $this->assertEquals('2016-11-23', $holidays[15]->getDateTime()->format('Y-m-d'));

        $this->assertEquals('天皇誕生日', $holidays[16]->getCaption());
        $this->assertEquals('2016-12-23', $holidays[16]->getDateTime()->format('Y-m-d'));
    }

}