<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("archivo.txt")) {
    $strJson = file_get_contents("archivo.txt");
    $aClientes = json_decode($strJson, true);
} else {
    $aClientes = array();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = "";
}


if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    unset($aClientes[$id]);

    $strJson = json_encode($aClientes);

    file_put_contents("archivo.txt", $strJson);

    header("Location: index.php");
}



if ($_POST) {
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];
    $correo = $_POST["txtCorreo"];
    $telefono = $_POST["txtTelefono"];
    $nombreImagen = "";

    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {

        $nombreAleatorio = date("Ymdhmsi") . rand(1000, 2000); //202205171842371010
        $archivo_tmp = $_FILES["archivo"]["tmp_name"]; //C:\tmp\ghjuy6788765
        $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
        if ($extension == "jpg" || $extension == "png" || $extension == "jpeg") {
            $nombreImagen = "$nombreAleatorio.$extension";
            move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
        }
    }



    if ($id >= 0) {
        // Si no se subio una imagen y estoy editando conservar en $nombreImagen el nombre
        // de la imagen anterior que esta asociada al cliente que estamos editando
        if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
            $nombreImagen = $aClientes[$id]["imagen"];
        } else {
            if (file_exists("imagenes/" . $aClientes[$id]["imagen"])) {
                unlink("imagenes/" . $aClientes[$id]["imagen"]);
            }
        }

        $aClientes[$id] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen
        );
    } else {
        $aClientes[] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen
        );
    }



    $strJson = json_encode($aClientes);

    file_put_contents("archivo.txt", $strJson);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="my-3 col-sm-11 text-center">
                <h1>Regitro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="pb-3">
                        <label for="txtDni">DNI:*</label>
                        <input type="text" for="txtDni" name="txtDni" class="form-control" value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["dni"] : ""; ?>">
                    </div>
                    <div class="pb-3">
                        <label for="txtNombre">Nombre:*</label>
                        <input type="text" for="txtNombre" name="txtNombre" class="form-control" value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["nombre"] : ""; ?>">
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Telefono:*</label>
                        <input type="tel" for="txtTelefono" name="txtTelefono" class="form-control" value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["telefono"] : ""; ?>">
                    </div>
                    <div class="pb-3">
                        <label for="txtCorreo">Correo:*</label>
                        <input type="text" for="txtCorreo" name="txtCorreo" class="form-control" value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["correo"] : ""; ?>">
                    </div>
                    <div class="pb-3">
                        <label for="txtArchivo">Archivo adjunto:*</label>
                        <input type="file" for="txtArchivo" name="archivo" class="form-control">
                        <label for="txtArchivo">Archivos admitidos: .jpg, .jpeg, .png</label>
                    </div>
                    <div class="pb-3">
                        <button type="submit" class=" btn btn-primary ">Guardar</button>
                        <a href="index.php" class=" btn btn-danger ">NUEVO</a>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <table class="table table-hover border">
                    <tr>
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Telefono </th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach ($aClientes as $pos => $cliente) { ?>
                        <tr>
                            <td> <img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail"> </td>
                            <td><?php echo $cliente["dni"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["telefono"]; ?></td>
                            <td><?php echo $cliente["correo"]; ?></td>
                            <td>
                                <a href="?id=<?php echo $pos; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="?id=<?php echo $pos ?>&do=eliminar"> <i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </main>
</body>

</html>