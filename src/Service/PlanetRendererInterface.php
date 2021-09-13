<?php

namespace Service;

use Model\Planet\PlanetInterface;

interface PlanetRendererInterface
{
    public function render(PlanetInterface $planet);
}