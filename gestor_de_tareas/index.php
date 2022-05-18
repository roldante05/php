<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_POST) {

    $titulo = $_POST["txtTitulo"];
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["txtUsuario"];
    $estado = $_POST["lstEstado"];
    $descripcion = $_POST["txtDescripcion"];
}




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Lista de tareas</title>
</head>

<body class="bg-light.bg-gradient">
    <main class="container">
        <div class="row">
            <div class="my-3 col-sm-11 text-center">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <form action="">
                    <div class="my-3">
                        <label for="txtTitulo">Titulo</label>
                        <input class="form-control" type="text" for="txtTitulo" name="txtTitulo">
                    </div>
                    <div class="my-3">
                        <label for="lstPrioridad">Prioridad</label>
                        <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                            <option value="Seleccionar" disabled selected>Seleccionar</option>
                            <option value="Baja">Baja</option>
                            <option value="Media">Media</option>
                            <option value="Alta">Alta</option>
                            <option value="Normal">Normal</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <label for="txtUsuario">Usuario</label>
                        <input class="form-control" type="text" name="txtUsuario">
                    </div>
                    <div class="my-3">
                        <label for="lstEstado">Estado</label>
                        <select class="form-control" name="lstEstado" id="lstEstado">
                            <option value="Seleccionar" disabled selected>Seleccionar</option>
                            <option value="No asignada">No asignada</option>
                            <option value="Asignada">Asignada</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Completada">Completada</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <label for="txtDescripcion">Descripcion</label>
                        <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" cols="30" rows="5" style="resize:none ;"></textarea>
                    </div>
                    <div class="my-3">
                        <button class="btn btn-primary">ENVIAR</button>
                        <button reset class="btn btn-success">Resetear</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <table class="table table-hover border">
                    <tr>
                        <th>ID</th>
                        <th>Fecha e insercion</th>
                        <th>Titulo</th>
                        <th>Prioridad </th>
                        <th>Usuario</th>
                    </tr>
                    <tr></tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>