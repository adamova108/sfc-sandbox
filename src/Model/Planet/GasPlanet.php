<?php

namespace Model\Planet;

class GasPlanet implements PlanetInterface
{
    use NameableItemTrait;

    const MATERIAL_AMMONIA = 'ammonia';
    const MATERIAL_HYDROGEN = 'hydrogen';
    const MATERIAL_HELIUM = 'helium';
    const MATERIAL_METHANE = 'methane';

    private $diameter;

    private $mainElement;

    public function __construct($name, $mainElement, $diameter)
    {
        $this->name = $name;
        $this->diameter = $diameter;
        if (!in_array($mainElement, $this->getAllElements())) {
            throw new \Exception('This is not a valid element!');
        }
        $this->mainElement = $mainElement;
    }


    /**
     * SO TRAITS CAN BE OVERRIDDEN ????
     */
    public function getName()
    {
        return 'TRAIT OVERRIDE - '.$this->name;
    }


    public function __destruct()
    {
        echo $this->name;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public static function getAllElements() : array
    {
        return [
            self::MATERIAL_AMMONIA,
            self::MATERIAL_HYDROGEN,
            self::MATERIAL_HELIUM,
            self::MATERIAL_METHANE,
        ];
    }

    public function getRadius()
    {
        return $this->diameter / 2;
    }

    public function getHexColor()
    {
        // a "fake" map of elements to colors
        switch ($this->mainElement) {
            case self::MATERIAL_AMMONIA:
                return '663300';
            case self::MATERIAL_HYDROGEN:
            case self::MATERIAL_HELIUM:
                return 'FFFF66';
            case self::MATERIAL_METHANE:
                return '0066FF';
            default:
                return '000000';
        }
    }
}