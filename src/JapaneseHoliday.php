<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/05
 * Time: 22:20
 */

namespace Mo3g4u\JapaneseHoliday;

use Symfony\Component\Yaml\Yaml;

/**
 * Class JapaneseHoliday
 * @package Mo3g4u\JapaneseHoliday
 */
class JapaneseHoliday
{

    /**
     * @var int
     */
    private $year = 0;

    /**
     * @var array
     */
    private $holidays = [];

    /**
     * @var array|mixed
     */
    private $holidaysConf = [];

    /**
     * JapaneseHoliday constructor.
     * @param int $year
     * @param int $month
     */
    public function __construct($year = 0, $month = 0)
    {
        $this->holidaysConf = Yaml::parse(file_get_contents(__DIR__.'/../config/holidays.yaml'));
        $this->setHolidays($year, $month);
    }

    /**
     * @param int $year
     * @param int $month
     */
    public function reset($year = 0, $month = 0)
    {
        $this->setHolidays($year, $month);
    }

    /**
     * @param string $format
     * @return array
     */
    public function getHolidays($format = 'Y-m-d')
    {
        $response = [];
        foreach ($this->holidays as $holiday){
            $tmp = [
                'caption' => $holiday->getCaption(),
                'date' => $holiday->getDateTime()->format($format)
            ];
            $response[] = $tmp;
        }
        return $response;
    }

    /**
     * @return array
     */
    public function getCaptions()
    {
        $response = [];
        foreach ($this->holidays as $holiday){
            $response[] = $holiday->getCaption();
        }
        return $response;
    }

    /**
     * @param string $format
     * @return array
     */
    public function getDates($format = 'Y-m-d')
    {
        $response = [];
        foreach ($this->holidays as $holiday){
            $response[] = $holiday->getDateTime()->format($format);
        }
        return $response;
    }

    /**
     * @return array
     */
    public function getDateTimes()
    {
        $response = [];
        foreach ($this->holidays as $holiday){
            $response[] = $holiday->getDateTime();
        }
        return $response;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }


    /**
     * @param int $year
     * @param int $month
     */
    private function setHolidays($year = 0, $month = 0)
    {
        if($year == 0){
            $date = new \DateTime();
            $year = $date->format('Y');
        }
        $this->year = $year;

        try {
            $this->dateCheck($this->year, $month);
        } catch (\RuntimeException $e) {
            echo "Error:" . $e->getMessage();
            exit();
        }

        $holidays = [];
        foreach($this->holidaysConf as $item){
            if($month > 0 && $month != $item['month']){
                continue;
            }
            $class = 'Mo3g4u\JapaneseHoliday\\' . ucfirst($item['type']);
            $holiday = new $class(
                $item['caption'], $item['type'], $item['start'], $item['end'],
                $item['month'], $item['day'], $item['nth'], $item['dow'],
                $this->year
            );
            if(!$holiday->isScopeYear()){
                continue;
            }

            try {
                $holiday->calc();
            } catch (\RuntimeException $e) {
                echo "Error:" . $e->getMessage();
                exit();
            }
            $holidays[] = $holiday;
        }

        if($year >= 1973){
            // 振替休日を追加する
            $substituteHoliday = new SubstituteHoliday();
            $holidays = $substituteHoliday->setSubstituteHoliday($holidays);
        }

        if($year >= 1988){
            // 国民の休日を追加する
            $nationalNoliday = new NationalHoliday();
            $holidays = $nationalNoliday->setNationalHoliday($holidays);
        }

        $this->holidays = $holidays;
    }


    /**
     * @param $year
     * @param $month
     * @throws \RuntimeException
     */
    private function dateCheck($year, $month)
    {
        if($month == 0){
            $month = 1;
        }
        $day = 1;
        if(!checkdate($month, $day, $year)){
            throw new \RuntimeException("checkdate error");
        }
    }
}