<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function promediar($aNumeros)
{
    $count = 0;

    foreach ($aNumeros as $numero) {
        $count += $numero;
    }
    return $count / count($aNumeros);
}
$aNotas = array(8, 4, 5, 3, 9, 1);

echo "El promedio es: " . promediar($aNotas);
