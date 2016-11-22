<?php
/**
 * Created by PhpStorm.
 * User: takeuchi
 * Date: 2016/11/18
 * Time: 14:32
 */

namespace Mo3g4u\JapaneseHoliday;


class Holiday
{
    /**
     * @var string
     */
    private $caption = '';
    /**
     * @var string
     */
    private $type = '';
    /**
     * @var int
     */
    private $start = 0;
    /**
     * @var int
     */
    private $end = 0;
    /**
     * @var int
     */
    private $month = 0;
    /**
     * @var int
     */
    private $day = 0;
    /**
     * @var int
     */
    private $nth = 0;
    /**
     * @var string
     */
    private $dow = '';
    /**
     * @var int
     */
    private $year = 0;
    /**
     * @var string
     */
    private $dateTime = '';

    /**
     * @return string
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param \DateTime $dateTime
     */
    public function setDateTime(\DateTime $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }


    /**
     * Holiday constructor.
     * @param $caption
     * @param $type
     * @param $start
     * @param int $end
     * @param $month
     * @param int $day
     * @param int $nth
     * @param string $dow
     * @param int $year
     */
    public function __construct(
     $caption, $type, $start, $end = 0, $month,  $day = 0, $nth = 0, $dow = '', $year = 0
    )
    {
        $this->caption = $caption;
        $this->type = $type;
        $this->start = $start;
        $this->end = $end;
        $this->month = $month;
        $this->day = $day;
        $this->nth = $nth;
        $this->dow = $dow;
        $this->year = $year;
    }



    /**
     * @return \DateTime
     */
    public function setDateTimeByYear()
    {
        $method = sprintf('%sCalc', $this->type); // fix or happy or spring or fall
        try {
            $this->dateTime =  $this->$method();
        } catch (\Exception $e) {
            echo "Error:" . $e->getMessage();
            exit();
        }
    }

    /**
     * @return bool
     */
    public function isScopeYear()
    {
        if($this->start <= $this->year && $this->end > 0 && $this->end >= $this->year ){
            return true;
        }elseif ($this->start <= $this->year && $this->end == 0){
            return true;
        }
        return false;
    }

    /**
     * @return \DateTime
     */
    private function fixedCalc()
    {
        $date = new \DateTime();
        $date->setDate($this->year, $this->month, $this->day);
        return $date;
    }


    /**
     * @return \DateTime
     * @throws \Exception
     */
    private function happyCalc()
    {
        $date = new \DateTime();
        $first_week = $date->setDate($this->year, $this->month, 1)->format('w');
        $day = ($this->nth - 1) * 7 + 1;
        $diff = $this->dow - $first_week;
        if($diff < 0) {
            $day += $diff + 7; // 1日の曜日より前の曜日の場合
        } else {
            $day += $diff; // 1日の曜日より後の曜日の場合
        }
        // 組み立てた日付が月の最終日（日数）よりも大きい場合
        if($date->format('t') < $day) {
            throw new \Exception($this->caption . " Out of range");
        }
        $date->setDate($this->year, $this->month, $day);
        return $date;
    }

    /**
     * @return \DateTime
     */
    private function springCalc()
    {
        $day = floor(20.84341 + 0.242194 * ($this->year - 1980) - floor(($this->year - 1980) / 4));
        $date = new \DateTime();
        $date->setDate($this->year, $this->month, $day);
        return $date;
    }


    /**
     * @return \DateTime
     */
    private function autumnCalc()
    {
        $day = floor(23.2488 + 0.242194 * ($this->year - 1980) - floor(($this->year - 1980) / 4));
        $date = new \DateTime();
        $date->setDate($this->year, $this->month, $day);
        return $date;
    }
}