<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aAlumnos = array();
$aAlumnos[] = array(
    "id" => 1,
    "nombre" => "Juan Perez",
    "nota" => array(9, 8)
);
$aAlumnos[] = array(
    "id" => 2,
    "nombre" => "Ana Valle",
    "nota" => array(4, 9)

);
$aAlumnos[] = array(
    "id" => 3,
    "nombre" => "Gonzalo Roldan",
    "nota" => array(7, 6)
);
$aAlumnos[] = array(
    "id" => 4,
    "nombre" => "Ramiro Garcia",
    "nota" => array(6, 9)
);


function promediar($aNumeros)
{
    $count = 0;

    foreach ($aNumeros as $numero) {
        $count += $numero;
    }
    return $count / count($aNumeros);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center my-sm-4">
                    <h1>Actas</h1>
                </div>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Alumno</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>promedio</th>
                    </tr>
                    <?php
                    $promedioCursada = 0;
                    $suma = 0;
                    foreach ($aAlumnos as $alumno) {
                        $promedio = promediar($alumno["nota"]);
                        $suma =  $suma + $promedio;
                    ?>
                        <tr>
                            <td><?php echo $alumno["id"] ?></td>
                            <td><?php echo $alumno["nombre"] ?></td>
                            <td><?php echo $alumno["nota"][0] ?></td>
                            <td><?php echo $alumno["nota"][1] ?></td>
                            <td><?php echo number_format($promedio, 1, ".", ".") ?></td>
                        </tr>
                    <?php
                    }
                    $promedioCursada = $suma / count($aAlumnos);
                    ?>
                </table>
                <div class="row">
                    <div class="col-12">
                        <h3>Promedio de notas: <?php echo number_format($promedioCursada, 2, ".", "."); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>