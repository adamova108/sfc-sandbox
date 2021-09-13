<?php

namespace Service;

use Model\Planet\PlanetInterface;

class CustomPlanetRendererComposition implements PlanetRendererInterface
{
    private PlanetRendererInterface $planetRenderer;

    public function __construct(PlanetRendererInterface $planetRenderer)
    {
        $this->planetRenderer = $planetRenderer;
    }

    public function render(PlanetInterface $planet)
    {
        $html = $this->planetRenderer->render($planet);

        return sprintf('<div class="rendered-planet">%s</div>', $html);
    }
}