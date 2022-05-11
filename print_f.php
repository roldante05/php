<?php
function print_f($variable)
{
    if (is_array($variable)) {
        $contenido = "";
        foreach ($variable as $item) {
            $contenido .= $item . "\n";
        }
        file_put_contents("datos.txt", $contenido);
    } else {
        file_put_contents("datos.txt", $variable);
    }
    echo "actualizado";
}



function print_f2($variable)
{
    if (is_array($variable)) {
        $contenido = "";
        $archivo1 = fopen("datos.txt", "w");
        foreach ($variable as $item) {
            $contenido .= $item . "\n";
        }
        fwrite($archivo1, $contenido);
        fclose($archivo1);
    } else {
        file_put_contents("datos.txt", $variable);
    }
    echo "actualizado";
}
$aNotas = array(5, 6, 7, 8, 5, 6, 6, 7, 5);
$msg = "esto es un msj";

print_f2($aNotas);
