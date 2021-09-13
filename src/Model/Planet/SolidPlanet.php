<?php

namespace Model\Planet;

class SolidPlanet extends AbstractPlanet
{
    private $radius;

    private $hexColor;

    private $dayLengthInHours;

    public function __construct($name, $radius, $hexColor, $dayLengthInHours = 24)
    {
        $this->name = $name;
        $this->radius = $radius;
        $this->hexColor = $hexColor;
        $this->dayLengthInHours = $dayLengthInHours;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getDateTimeOneDayFromNow()
    {
        $tomorrow = new \DateTime();
        $tomorrow->modify(sprintf('+%d hours', $this->dayLengthInHours));

        return $tomorrow;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function getHexColor()
    {
        return $this->hexColor;
    }

    public function getDayLengthInHours()
    {
        return $this->dayLengthInHours;
    }
}