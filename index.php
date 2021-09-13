<?php

require __DIR__ . '/vendor/autoload.php';

use Exception\MissingHexException;
use Exception\InvalidRadiusException;
use Model\Planet\SolarSystem;
use Model\Planet\GasPlanet;
use Model\Planet\SolidPlanet;
use Service\PlanetRenderer;
use Service\CustomPlanetRenderer;
use Service\CustomPlanetRendererComposition;

//$renderer = new PlanetRenderer();
//$renderer = new CustomPlanetRenderer();
$renderer = new CustomPlanetRendererComposition(new PlanetRenderer());

$planets = [
    new SolidPlanet('Mercury', 10, 'cccccc'),
    new SolidPlanet('Venus', 30, '29A1FF'),
    new SolidPlanet('Earth', 30, '0E1338'),
    new SolidPlanet('Mars', 15, 'DAA18A'),
    new GasPlanet('Jupiter', GasPlanet::MATERIAL_HYDROGEN, 139),
    new GasPlanet('Saturn', GasPlanet::MATERIAL_HYDROGEN, 120),
    new GasPlanet('Uranus', GasPlanet::MATERIAL_METHANE, 51),
];
$neptune = new GasPlanet('Neptune', GasPlanet::MATERIAL_HYDROGEN, 49);
$planets[] = $neptune;

$solarSystem = new SolarSystem($planets);

?>
    <h1>
        Showing <?php echo count($solarSystem); ?> Planets
    </h1>
<?php foreach ($solarSystem as $planet) : ?>
    <h3><?php echo $planet; ?></h3>
    <div>
        <?php
            try {
                echo $renderer->render($planet);
            } catch (InvalidRadiusException $e) {
                echo 'Planet cannot be rendered.';
            } catch (MissingHexException $e) {
                echo 'Invalid planet color.';
            }
        ?>
    </div>
<?php endforeach; ?>