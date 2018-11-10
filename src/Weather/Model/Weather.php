<?php

namespace Weather\Model;

class Weather
{
    private $map = [
        1 => 'cloud',
        2 => 'cloud-rain',
        3 => 'sun'
    ];

    /**
     * @var string
     */
    protected $day;

    /**
     * @var integer
     */
    protected $dayLow;


    /**
     * @var integer
     */
    protected $dayHigh;

    /**
     * @var integer
     */
    protected $dayTemp;

    /**
     * @var integer
     */
    protected $nightTemp;

    /**
     * @var int
     */
    protected $sky;

    /**
     * @var string
     */
    protected $skyText;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @return int
     */
    public function getDayTemp(): ?int
    {
        return $this->dayTemp;
    }

    /**
     * @param int $dayTemp
     */
    public function setDayTemp(?int $dayTemp): void
    {
        $this->dayTemp = $dayTemp;
    }

    /**
     * @return int
     */
    public function getNightTemp(): int
    {
        return $this->nightTemp;
    }

    /**
     * @param int $nightTemp
     */
    public function setNightTemp(?int $nightTemp): void
    {
        $this->nightTemp = $nightTemp;
    }

    /**
     * @return int
     */
    public function getSky(): int
    {
        return $this->sky;
    }

    /**
     * @param int $sky
     */
    public function setSky(int $sky): void
    {
        $this->sky = $sky;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    public function getSkySymbol()
    {
        return $this->map[$this->sky];
    }

    /**
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param string $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return string
     */
    public function getSkyText()
    {
        return $this->skyText;
    }

    /**
     * @param string $skyText
     */
    public function setSkyText($skyText)
    {
        $this->skyText = $skyText;
    }

    /**
     * @return int
     */
    public function getDayLow(): ?int
    {
        return $this->dayLow;
    }

    /**
     * @param int $dayLow
     */
    public function setDayLow(?int $dayLow): void
    {
        $this->dayLow = $dayLow;
    }

    /**
     * @return int
     */
    public function getDayHigh(): ?int
    {
        return $this->dayHigh;
    }

    /**
     * @param int $dayHigh
     */
    public function setDayHigh(?int $dayHigh)
    {
        $this->dayHigh = $dayHigh;
    }
}
