<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION["listadoClientes"])) {
    $_SESSION["listadoClientes"] = array();
}
if ($_POST) {
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];
    $edad = $_POST["txtEdad"];
    $telefono = $_POST["txtTelefono"];

    if (isset($_POST["btnEnviar"])) {

        $cliente = array(
            "nombre" => $nombre,
            "dni" => $dni,
            "edad" => $edad,
            "telefono" => $telefono
        );

        $_SESSION["listadoClientes"][] = $cliente;
    } else if (isset($_POST["btnEliminar"])) {
        session_destroy();
        header("Location: clientes_sessions.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Clientes</title>
</head>

<body class="bg-secondary">
    <main class="container shadow bg-white mt-5">
        <div class="row ">
            <div class="col-12 text-center my-3">
                <h1>Tabla de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class=" col-sm-5">
                <form action="" method="POST">
                    <div class="pb-3">
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtDni">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Telefono:</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtEdad">Edad:</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <div class="pb-3">
                        <button type="submit" name="btnEnviar" class="btn btn-primary">ENVIAR</button>
                        <button type="submit" name="btnEliminar" class="btn btn-danger">ELIMINAR</button>
                    </div>
                </form>
            </div>
            <div class="offset-1 col-sm-6 mt-2">
                <table class="table table-hover table-secondary shadow">
                    <tr>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Telefono</th>
                        <th>Edad</th>
                    </tr>
                    <?php foreach ($_SESSION["listadoClientes"] as $cliente) { ?>
                        <tr>
                            <td><?php echo $cliente["nombre"] ?></td>
                            <td><?php echo $cliente["dni"] ?></td>
                            <td><?php echo $cliente["telefono"] ?></td>
                            <td><?php echo $cliente["edad"] ?></td>

                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </main>
</body>

</html>