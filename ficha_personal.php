<?php

$nombre = "Dante";
$edad = 20;
$fecha = date("d/m/y");
$aPeliculas = array("Step up 4",
"Harry potter",
"Kun fu panda"
);

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
    <div class="container">
        <div class="col">
            <div class="text-center py-5">
                <h1>Ficha Personal</h1>
            </div>
        <table class="table table-hover border">
  <thead>
    <tr>
      <th scope="row">Fecha</th>
      <td><?php echo $fecha; ?></td>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Nombre y apellido</th>
      <td><?php echo $nombre; ?></td>
   
    </tr>
    <tr>
      <th scope="row">Edad</th>
      <td><?php echo $edad; ?></td>

    </tr>
    <tr>
      <th scope="row">Peliculas favoritas</th>
      <td colspan="">
      <?php echo $aPeliculas[0]?><br>
      <?php echo $aPeliculas[1]?><br>
      <?php echo $aPeliculas[2]?>
    </td>
    </tr>
  </tbody>
</table>
        </div>
    </div>
</body>
</html>