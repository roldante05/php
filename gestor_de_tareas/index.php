<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("datos.txt")) {
    //Si el archivo existe, cargo las tareas en la variable aTareas
    $strJson = file_get_contents("datos.txt");
    $aTareas = json_decode($strJson, true);
} else {
    //Si el archivo no existe es porque no hay tareas
    $aTareas = array();
}


if (isset($_GET["id"])) {
    //Si viene el "$id" lo carga
    $id = $_GET["id"];
} else {
    // en caso de  que no lo carga es vacio
    $id = "";
}


if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    //Elimina la ultima tarea y el id 
    unset($aTareas[$id]);
    //Convierte aTareas en json
    $strJson = json_encode($aTareas);
    //Almacena el json en el archivo.txt
    file_put_contents("datos.txt", $strJson);
    //Redirecciona ala misma pagina
    header("Location: index.php");
}


if ($_POST) {

    $titulo = $_POST["txtTitulo"];
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["txtUsuario"];
    $estado = $_POST["lstEstado"];
    $descripcion = $_POST["txtDescripcion"];




    if ($id >= 0) {
        //Estoy editando la tarea
        $aTareas[$id] = array(
            "titulo" => $titulo,
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "descripcion" => $descripcion,
            "fecha" => $aTareas[$id]["fecha"]
        );
    } else {
        //Se inserta una nueva tarea
        $aTareas[] = array(
            "titulo" => $titulo,
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "descripcion" => $descripcion,
            "fecha" => date("y/m/d")
        );
    }
}


//Convertir el array de tareas en json
$strJson = json_encode($aTareas);
//Almacenar en un archivo.txt el json con file_put_contents
file_put_contents("datos.txt", $strJson);


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- CSS only -->
    <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Lista de tareas</title>
</head>

<body class="" style="background: rgb(131, 58, 180);
  background: linear-gradient(
    90deg,
    rgba(131, 58, 180, 1) 0%,
    rgba(253, 29, 29, 1) 50%,
    rgba(252, 176, 69, 1) 100%
  );">
    <main class="container">
        <div class="row">
            <div class="my-3 col-sm-11 text-center">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 bg-light shadow rounded">
                <form action="" method="POST">
                    <div class="my-3">
                        <label for="txtTitulo">Titulo</label>
                        <input class="form-control" type="text" for="txtTitulo" name="txtTitulo" value="<?php echo isset($aTareas[$id]) ? $aTareas[$id]["titulo"] : ""; ?>">
                    </div>
                    <div class="my-3">
                        <label for="lstPrioridad">Prioridad</label>
                        <select name="lstPrioridad" id="lstPrioridad" class="form-control" value="">
                            <option value="Seleccionar " disabled selected>Seleccionar</option>
                            <option value="Baja" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Baja" ? "selected" : "" ?>>Baja</option>
                            <option value="Media" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Media" ? "selected" : "" ?>>Media</option>
                            <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta" ? "selected" : "" ?>>Alta</option>
                            <option value="Normal" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Normal" ? "selected" : "" ?>>Normal</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <label for="txtUsuario">Usuario</label>
                        <input class="form-control" type="text" name="txtUsuario" value="<?php echo isset($aTareas[$id]) ? $aTareas[$id]["usuario"] : ""; ?>">
                    </div>
                    <div class="my-3">
                        <label for="lstEstado">Estado</label>
                        <select class="form-control" name="lstEstado" id="lstEstado" value="">
                            <option value="Seleccionar" disabled selected>Seleccionar</option>
                            <option value="No asignada" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "No asignada" ? "selected" : "" ?>>No asignada</option>
                            <option value="Asignada" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Asignada" ? "selected" : "" ?>>Asignada</option>
                            <option value="En proceso" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "En proceso" ? "selected" : "" ?>>En proceso</option>
                            <option value="Completada" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Completada" ? "selected" : "" ?>>Completada</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <label for="txtDescripcion">Descripcion</label>
                        <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" cols="30" rows="5" style="resize:none ;" value="<?php echo isset($aTareas[$id]) ? $aTareas[$id]["descripcion"] : ""; ?>"></textarea>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                        <a href="index.php" class=" btn btn-danger ">NUEVO</a>
                    </div>
                </form>
            </div>
            <div class="col-sm-7">
                <?php if (count($aTareas)) { ?>
                    <table class="table table-hover bg-light rounded shawdow text-center ">
                        <tr>
                            <th>ID</th>
                            <th>Fecha e insercion</th>
                            <th>Titulo</th>
                            <th>Prioridad </th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        <?php foreach ($aTareas as $pos => $tarea) { ?>
                            <tr>
                                <td><?php echo $pos; ?></td>
                                <td><?php echo $tarea["fecha"]; ?></td>
                                <td><?php echo $tarea["titulo"] . "<br>" . $tarea["descripcion"]; ?></td>
                                <td><?php echo $tarea["prioridad"]; ?></td>
                                <td><?php echo $tarea["usuario"]; ?></td>
                                <td><?php echo $tarea["estado"]; ?></td>
                                <td>
                                    <a style="font-size:20px ; color:black ; " href="?id=<?php echo $pos; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a style="font-size:20px ; color:black; " href="?id=<?php echo $pos ?>&do=eliminar"> <i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } else { ?>
                    <div class="alert alert-danger col-sm-10 text-center" role="alert">
                        Aun no se a guardado una tarea
                    </div> <?php } ?>
            </div>
        </div>
    </main>
</body>

</html>