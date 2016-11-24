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
    protected $caption = '';
    /**
     * @var string
     */
    protected $type = '';
    /**
     * @var int
     */
    protected $start = 0;
    /**
     * @var int
     */
    protected $end = 0;
    /**
     * @var int
     */
    protected $month = 0;
    /**
     * @var int
     */
    protected $day = 0;
    /**
     * @var int
     */
    protected $nth = 0;
    /**
     * @var string
     */
    protected $dow = '';
    /**
     * @var int
     */
    protected $year = 0;
    /**
     * @var string
     */
    protected $dateTime = '';

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
     *
     */
    public function calc()
    {
        $date = new \DateTime();
        $date->setDate($this->year, $this->month, $this->day);
        $this->dateTime = $date;
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

}