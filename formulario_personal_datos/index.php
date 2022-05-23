<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_POST) {
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];
    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Formularios datos personales</title>
</head>

<body class="bg-danger">
    <main class="container shadow bg-white mt-4">
        <div class="row ">
            <div class="col-12 text-center">
                <h1>Formularo datos personales</h1>
            </div>
        </div>
        <div class="row">
            <div class=" col-sm-5">
                <form action="" method="POST">
                    <div class="pb-3">
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
                    </div>
                    <div class="pb-3">
                        <label for="txtDni">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required>
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Telefono:</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control" required>
                    </div>
                    <div class="pb-3">
                        <label for="txtEdad">Edad:</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control" required>
                    </div>
                    <div class="pb-3">
                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                    </div>
                </form>
            </div>
            <div class="offset-1 col-sm-6 mt-2">
                <table class="table table-hover table-primary shadow">
                    <tr>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Telefono</th>
                        <th>Edad</th>
                    </tr>

                    <tr>
                        <?php if (isset($nombre)) { ?>
                            <td><?php echo $nombre; ?></td>
                        <?php } ?>
                        <?php if (isset($dni)) { ?>
                            <td><?php echo $dni; ?></td>
                        <?php } ?>
                        <?php if (isset($telefono)) { ?>
                            <td><?php echo $telefono; ?></td>
                        <?php } ?>
                        <?php if (isset($edad)) { ?>
                            <td><?php echo $edad; ?></td>
                        <?php } ?>

                    </tr>

                </table>
            </div>
        </div>
    </main>
</body>

</html>