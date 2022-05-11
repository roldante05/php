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
            <div class="my-3 col-sm-11 text-center">
                <h1>Regitro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="pb-3">
                        <label for="txtDni">DNI:*</label>
                        <input type="text" for="txtDni" name="txtDni" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtNombre">Nombre:*</label>
                        <input type="text" for="txtNombre" name="txtNombre" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtTelefono">Telefono:*</label>
                        <input type="tel" for="txtTelefono" name="txtTelefono" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtCorreo">Correo:*</label>
                        <input type="text" for="txtCorreo" name="txtCorreo" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtArchivo">Archivo adjunto:*</label>
                        <input type="file" for="txtArchivo" name="txtArchivo" class="form-control">
                    </div>
                    <div class="pb-3">
                        <button type="submit" class=" btn btn-primary ">Guardar</button>
                        <button type="submit" class=" btn btn-danger ">NUEVO</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <table class="table table-hover border">
                    <tr>
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>