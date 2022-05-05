<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_POST) {
    $iva = $_POST["txtSelect"];
    $importe = $_POST["txtPrecioSinIva"];
    $importeDos = $_POST["txtPrecioConIva"];



    $precioSinIva = $importe / ($iva / 100 + 1);
    $precioConIva = $importeDos * ($iva / 100 + 1);
    $ivaCantidad = $precioConIva - $precioSinIva;
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

<body class="bg-danger">
    <main class="container bg-white">
        <div class="row shadow mt-4">
            <div class="my-2">
                <h2 class="text-center">Calculadora de IVA</h2>
            </div>
            <div class="col-sm-6 col-12 my-3">
                <form action="" method="POST">
                    <div>
                        <label for="txtSelect">IVA</label>
                        <select class="form-control" name="txtSelect" id="txtSelect">
                            <option value="10.5">10.5</option>
                            <option value="21" selected>21</option>
                            <option value="27">27</option>
                        </select>
                    </div>
                    <div>
                        <label for="txtPrecioSinIva">Precio sin IVA</label>
                        <input class="form-control" type="number" for="txtPrecioSinIva" name="txtPrecioSinIva" id="txtPrecioSinIva" required>
                    </div>
                    <div>
                        <label for="txtPrecioConIva">Precio con IVA</label>
                        <input class="form-control" type="number" for="txtPrecioConIva" name="txtPrecioConIva" id="txtPrecioConIva" required>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">CALCULAR</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-5 col-12 mt-4">
                <table id="table" class="table table-hover table-dark">
                    <tr>
                        <th>IVA:</th>
                        <?php if (isset($iva)) { ?>
                            <td><?php echo "$ $iva"; ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th>Precio sin IVA:</th>
                        <?php if (isset($precioSinIva)) { ?>
                            <td><?php echo "$ $precioSinIva"; ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th>Precio con IVA</th>
                        <?php if (isset($precioConIva)) { ?>
                            <td><?php echo "$ " . number_format($precioConIva); ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th>IVA cantidad:</th>
                        <?php if (isset($ivaCantidad)) { ?>
                            <td><?php echo "$ $ivaCantidad"; ?></td>
                        <?php } ?>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>