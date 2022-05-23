<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("invitados.txt")) {
    //Si existe el archivo inivitados lo abrimos y cargamos en una variable del tipo array
    //los DNIs permitidos
    $aInvitados = explode(",", file_get_contents("invitados.txt"));
} else {
    //Sino el array queda como un array vacio
    $aInvitados = array();
}


if ($_POST) {

    if (isset($_POST["btnValidar"])) {
        $numDni = $_POST["numDni"];
        //Si el DNI ingresado se encuentra en la  lista se mostrara un mensaje de Bienven@ ala fiesta
        if (in_array($numDni, $aInvitados)) {
            $mensajeDni = "Bienven@ ala fiesta";
        } else {
            $mensajeDniDos = " No se encuentra en la lista de invitados.";
        }

        //Sino un mensaje de  No se encuentra en la lista de invitados.
    }

    if (isset($_POST["btnVip"])) {
        $numVip = $_POST["numVip"];
        //Si el codigo es verde entonces mostrara Su codigo de acceso es ....
        if ($numVip == "verde") {
            $mensaje = "Su codigo de acceso es " . rand(1000, 9999);
        } else if ($numVip == "") {
            $mensajeDos = "*Complete el campo*";
        } else {
            //Sino ud. no tiene pasa VIP
            $mensajeTres = "Usted no tiene pase VIP";
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Listado de invitados</title>
</head>

<body class="bg-secondary">
    <main class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Lista de invitados</h1>
                <p>Complete el siguiente formulario:</p>
            </div>

            <?php if (isset($mensajeDni)) { ?>
                <div class="alert alert-success col-sm-7" role="alert">
                    <?php echo $mensajeDni; ?>
                </div>
            <?php } else if (isset($mensajeDniDos)) { ?>
                <div class="alert alert-danger col-sm-7" role="alert">
                    <?php echo $mensajeDniDos; ?>
                </div>
            <?php } ?>
            <?php if (isset($mensaje)) { ?>
                <div class="alert alert-success col-sm-7" role="alert">
                    <?php echo $mensaje; ?>
                </div>
            <?php } else if (isset($mensajeTres)) { ?>
                <div class="alert alert-danger col-sm-7" role="alert">
                    <?php echo $mensajeTres; ?>
                </div>

            <?php } ?>

            <div class="col-sm-7">
                <form action="" method="POST">
                    <div class="my-2">
                        <label for="numDni">Ingrese DNI:</label>
                        <input type="text" name="numDni" class="form-control my-2">
                        <input type="submit" name="btnValidar" value="Verificar invitado" class="btn btn-primary  form-control">
                    </div>
                    <div class="my-2">
                        <label for="numVip">Ingresa el codigo secreto para el pase VIP:</label>
                        <input type="text" name="numVip" class="form-control my-2">

                        <?php if (isset($mensajeDos)) { ?>
                            <div class="alert alert-danger my-2 py-1  text-center" role="alert">
                                <?php echo $mensajeDos; ?>
                            </div>
                        <?php } ?>

                        <input type="submit" name="btnVip" value="Verificar codigo" class="btn btn-primary form-control">
                        <div class="my-2">
                            <a class="btn btn-danger col-sm-5 ms-5" href="index.php">NUEVO</a>
                            <button type="reset" class="btn btn-success col-sm-5" href="index.php">CANCELAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>