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
        $this->JapaneseHoliday = new JapaneseHoliday();
    }

    public function testGetHolidays1930()
    {
        $this->JapaneseHoliday->reset(1930);
        $holidays = $this->JapaneseHoliday->getHolidays();
        $this->assertEquals(0, count($holidays));
    }

    public function testGetHolidays1966()
    {
        $this->JapaneseHoliday->reset(1966);
        $holidays = $this->JapaneseHoliday->getHolidays();
        $this->assertEquals(11, count($holidays));
    }

    public function testGetHolidays1967()
    {
        $this->JapaneseHoliday->reset(1967);
        $holidays = $this->JapaneseHoliday->getHolidays();
        $this->assertEquals(12, count($holidays));
    }

    public function testGetHolidays2006()
    {
        $this->JapaneseHoliday->reset(2006);
        $holidays = $this->JapaneseHoliday->getHolidays();
        $this->assertEquals(16, count($holidays));
    }

    public function testGetHolidays2007()
    {
        $this->JapaneseHoliday->reset(2007);
        $holidays = $this->JapaneseHoliday->getHolidays();
        $this->assertEquals(19, count($holidays));
    }

    public function testGetHolidays1949()
    {
        $this->JapaneseHoliday->reset(1949);
        $holidays = $this->JapaneseHoliday->getHolidays();
        $this->assertEquals(9, count($holidays));

        $this->assertEquals('元日', $holidays[0]['caption']);
        $this->assertEquals('1949-01-01', $holidays[0]['date']);

        $this->assertEquals('成人の日', $holidays[1]['caption']);
        $this->assertEquals('1949-01-15', $holidays[1]['date']);

        $this->assertEquals('春分の日', $holidays[2]['caption']);
        $this->assertEquals('1949-03-21', $holidays[2]['date']);

        $this->assertEquals('天皇誕生日', $holidays[3]['caption']);
        $this->assertEquals('1949-04-29', $holidays[3]['date']);

        $this->assertEquals('憲法記念日', $holidays[4]['caption']);
        $this->assertEquals('1949-05-03', $holidays[4]['date']);

        $this->assertEquals('こどもの日', $holidays[5]['caption']);
        $this->assertEquals('1949-05-05', $holidays[5]['date']);

        $this->assertEquals('秋分の日', $holidays[6]['caption']);
        $this->assertEquals('1949-09-23', $holidays[6]['date']);

        $this->assertEquals('文化の日', $holidays[7]['caption']);
        $this->assertEquals('1949-11-03', $holidays[7]['date']);

        $this->assertEquals('勤労感謝の日', $holidays[8]['caption']);
        $this->assertEquals('1949-11-23', $holidays[8]['date']);
    }

    public function testGetHolidays1989()
    {
        $this->JapaneseHoliday->reset(1989);
        $holidays = $this->JapaneseHoliday->getHolidays();
        $this->assertEquals(17, count($holidays));

        $this->assertEquals('元日', $holidays[0]['caption']);
        $this->assertEquals('1989-01-01', $holidays[0]['date']);

        $this->assertEquals('振替休日', $holidays[1]['caption']);
        $this->assertEquals('1989-01-02', $holidays[1]['date']);

        $this->assertEquals('成人の日', $holidays[2]['caption']);
        $this->assertEquals('1989-01-15', $holidays[2]['date']);

        $this->assertEquals('振替休日', $holidays[3]['caption']);
        $this->assertEquals('1989-01-16', $holidays[3]['date']);

        $this->assertEquals('建国記念日', $holidays[4]['caption']);
        $this->assertEquals('1989-02-11', $holidays[4]['date']);

        $this->assertEquals('昭和天皇の大喪の礼', $holidays[5]['caption']);
        $this->assertEquals('1989-02-24', $holidays[5]['date']);

        $this->assertEquals('春分の日', $holidays[6]['caption']);
        $this->assertEquals('1989-03-21', $holidays[6]['date']);

        $this->assertEquals('みどりの日', $holidays[7]['caption']);
        $this->assertEquals('1989-04-29', $holidays[7]['date']);

        $this->assertEquals('憲法記念日', $holidays[8]['caption']);
        $this->assertEquals('1989-05-03', $holidays[8]['date']);

        $this->assertEquals('国民の休日', $holidays[9]['caption']);
        $this->assertEquals('1989-05-04', $holidays[9]['date']);

        $this->assertEquals('こどもの日', $holidays[10]['caption']);
        $this->assertEquals('1989-05-05', $holidays[10]['date']);

        $this->assertEquals('敬老の日', $holidays[11]['caption']);
        $this->assertEquals('1989-09-15', $holidays[11]['date']);

        $this->assertEquals('秋分の日', $holidays[12]['caption']);
        $this->assertEquals('1989-09-23', $holidays[12]['date']);

        $this->assertEquals('体育の日', $holidays[13]['caption']);
        $this->assertEquals('1989-10-10', $holidays[13]['date']);

        $this->assertEquals('文化の日', $holidays[14]['caption']);
        $this->assertEquals('1989-11-03', $holidays[14]['date']);

        $this->assertEquals('勤労感謝の日', $holidays[15]['caption']);
        $this->assertEquals('1989-11-23', $holidays[15]['date']);

        $this->assertEquals('天皇誕生日', $holidays[16]['caption']);
        $this->assertEquals('1989-12-23', $holidays[16]['date']);
    }

    public function testGetHolidays2016()
    {
        $this->JapaneseHoliday->reset(2016);
        $holidays = $this->JapaneseHoliday->getHolidays();
        $this->assertEquals(17, count($holidays));

        $this->assertEquals('元日', $holidays[0]['caption']);
        $this->assertEquals('2016-01-01', $holidays[0]['date']);

        $this->assertEquals('成人の日', $holidays[1]['caption']);
        $this->assertEquals('2016-01-11', $holidays[1]['date']);

        $this->assertEquals('建国記念日', $holidays[2]['caption']);
        $this->assertEquals('2016-02-11', $holidays[2]['date']);

        $this->assertEquals('春分の日', $holidays[3]['caption']);
        $this->assertEquals('2016-03-20', $holidays[3]['date']);

        $this->assertEquals('振替休日', $holidays[4]['caption']);
        $this->assertEquals('2016-03-21', $holidays[4]['date']);

        $this->assertEquals('昭和の日', $holidays[5]['caption']);
        $this->assertEquals('2016-04-29', $holidays[5]['date']);

        $this->assertEquals('憲法記念日', $holidays[6]['caption']);
        $this->assertEquals('2016-05-03', $holidays[6]['date']);

        $this->assertEquals('みどりの日', $holidays[7]['caption']);
        $this->assertEquals('2016-05-04', $holidays[7]['date']);

        $this->assertEquals('こどもの日', $holidays[8]['caption']);
        $this->assertEquals('2016-05-05', $holidays[8]['date']);

        $this->assertEquals('海の日', $holidays[9]['caption']);
        $this->assertEquals('2016-07-18', $holidays[9]['date']);

        $this->assertEquals('山の日', $holidays[10]['caption']);
        $this->assertEquals('2016-08-11', $holidays[10]['date']);

        $this->assertEquals('敬老の日', $holidays[11]['caption']);
        $this->assertEquals('2016-09-19', $holidays[11]['date']);

        $this->assertEquals('秋分の日', $holidays[12]['caption']);
        $this->assertEquals('2016-09-22', $holidays[12]['date']);

        $this->assertEquals('体育の日', $holidays[13]['caption']);
        $this->assertEquals('2016-10-10', $holidays[13]['date']);

        $this->assertEquals('文化の日', $holidays[14]['caption']);
        $this->assertEquals('2016-11-03', $holidays[14]['date']);

        $this->assertEquals('勤労感謝の日', $holidays[15]['caption']);
        $this->assertEquals('2016-11-23', $holidays[15]['date']);

        $this->assertEquals('天皇誕生日', $holidays[16]['caption']);
        $this->assertEquals('2016-12-23', $holidays[16]['date']);
    }

    public function testGetHolidays201603()
    {
        $this->JapaneseHoliday->reset(2016, 3);
        $holidays = $this->JapaneseHoliday->getHolidays();
        $this->assertEquals(2, count($holidays));
        $this->assertEquals('春分の日', $holidays[0]['caption']);
        $this->assertEquals('2016-03-20', $holidays[0]['date']);
        $this->assertEquals('振替休日', $holidays[1]['caption']);
        $this->assertEquals('2016-03-21', $holidays[1]['date']);

    }

    public function testGetHolidays201605()
    {
        $this->JapaneseHoliday->reset(2016, 5);
        $holidays = $this->JapaneseHoliday->getHolidays();
        $this->assertEquals(3, count($holidays));
        $this->assertEquals('憲法記念日', $holidays[0]['caption']);
        $this->assertEquals('2016-05-03', $holidays[0]['date']);
        $this->assertEquals('みどりの日', $holidays[1]['caption']);
        $this->assertEquals('2016-05-04', $holidays[1]['date']);
        $this->assertEquals('こどもの日', $holidays[2]['caption']);
        $this->assertEquals('2016-05-05', $holidays[2]['date']);

    }

    public function testGetCaptions201605()
    {
        $this->JapaneseHoliday->reset(2016, 5);
        $captions = $this->JapaneseHoliday->getCaptions();
        $this->assertEquals(3, count($captions));
        $this->assertEquals('憲法記念日', $captions[0]);
        $this->assertEquals('みどりの日', $captions[1]);
        $this->assertEquals('こどもの日', $captions[2]);
    }

    public function testGetDates201605()
    {
        $this->JapaneseHoliday->reset(2016, 5);
        $dates = $this->JapaneseHoliday->getDates();
        $this->assertEquals(3, count($dates));
        $this->assertEquals('2016-05-03', $dates[0]);
        $this->assertEquals('2016-05-04', $dates[1]);
        $this->assertEquals('2016-05-05', $dates[2]);
    }

    public function testGetDateTimes201601()
    {
        $this->JapaneseHoliday->reset(2016, 1);
        $dateTimes = $this->JapaneseHoliday->getDateTimes();
        $this->assertEquals(2, count($dateTimes));
        $this->assertEquals('5', $dateTimes[0]->format('w'));
        $this->assertEquals('1', $dateTimes[1]->format('w'));
    }

    public function testGetDatesFormat()
    {
        $this->JapaneseHoliday->reset(2016, 5);
        $dates = $this->JapaneseHoliday->getDates('Y年m月d日');
        $this->assertEquals(3, count($dates));
        $this->assertEquals('2016年05月03日', $dates[0]);
        $this->assertEquals('2016年05月04日', $dates[1]);
        $this->assertEquals('2016年05月05日', $dates[2]);
    }
}