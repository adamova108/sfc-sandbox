<?php

namespace Service;

use Model\Planet\PlanetInterface;

class CustomPlanetRenderer extends PlanetRenderer {

    public function render(PlanetInterface $planet) : string
    {
        $html = parent::render($planet);

        return sprintf('<div class="rendered-planet">%s</div>', $html);
    }

}