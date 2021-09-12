<?php

namespace Model\Planet;

class SolarSystem implements \IteratorAggregate, \Countable
{
    private $planets;

    public function __construct(array $planets)
    {
        $this->planets = $planets;
    }

    public function count()
    {
        return count($this->planets);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->planets);
    }
}