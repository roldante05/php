<?php

$aEmpleados = array();
$aEmpleados[] = array("dni" => 33300123, "nombre" => "David Garcia", "bruto" => 85000.30);
$aEmpleados[] = array("dni" => 40874456, "nombre" => "Ana Dell Valle", "bruto" => 90000);
$aEmpleados[] = array("dni" => 67567565, "nombre" => "Andres Perez", "bruto" => 1000000);
$aEmpleados[] = array("dni" => 75744545, "nombre" => "Victoria Luz", "bruto" => 70000);




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Empleados</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center my-sm-4">
                    <h1>Listas de Empleados</h1>
                </div>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>DNI</th>
                        <th>Nombre y Apellido</th>
                        <th>Sueldo</th>
                    </tr>
                    <?php
                    foreach ($aEmpleados as $pos => $empleado) {

                    ?>
                        <tr>
                            <td><?php echo number_format($empleado["dni"], 0, ".", ".") ?></td>
                            <td><?php echo strtoupper($empleado["nombre"]) ?></td>
                            <td><?php echo number_format($empleado["bruto"], 0, ".", ".") ?></td>



                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </main>
</body>

</html>