<?php

namespace Model\Planet;

trait NameableItemTrait
{
    /**
     * @var string
     */
    protected $name; // IF THIS IS PRIVATE THEN EXTENDING THE ABSTRACT CLASS WOULD MAKE THIS PROPERTY INACCESSIBLE

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}