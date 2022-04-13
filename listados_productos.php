<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart TV 55\"4k UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000
);
$aProductos[] = array(
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000
);
$aProductos[] = array(
    "nombre" => "Aire Acondicionado Split F/C Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000
);


$productoUno = $aProductos[0]["stock"] > 10 ? "Hay stock" : ($aProductos[0]["stock"] > 0 && $aProductos[0]["stock"] <= 10 ? "Poco stock" : "No hay");
$productoDos = $aProductos[1]["stock"] > 10 ? "Hay stock" : ($aProductos[1]["stock"] > 0 && $aProductos[1]["stock"] <= 10 ? "Poco stock" : "No hay");
$productoTres = $aProductos[2]["stock"] > 10 ? "Hay stock" : ($aProductos[2]["stock"] > 0 && $aProductos[2]["stock"] <= 10 ? "Poco stock" : "No hay");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Listados productos</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="text-center py-5">
                    <h1>Listados productos</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table border">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $aProductos[0]["nombre"] ?></td>
                                    <td><?php echo $aProductos[0]["marca"] ?></td>
                                    <td><?php echo $aProductos[0]["modelo"] ?></td>
                                    <td><?php echo $productoUno ?></td>
                                    <td><?php echo $aProductos[0]["precio"] ?></td>
                                    <td><button class="btn-primary">Comprar</button></td>
                                </tr>
                                <tr>
                                    <td><?php echo $aProductos[1]["nombre"] ?></td>
                                    <td><?php echo $aProductos[1]["marca"] ?></td>
                                    <td><?php echo $aProductos[1]["modelo"] ?></td>
                                    <td><?php echo $productoDos ?></td>
                                    <td><?php echo $aProductos[1]["precio"] ?></td>
                                    <td><button class="btn-primary">Comprar</button></td>
                                </tr>
                                <tr>
                                    <td><?php echo $aProductos[2]["nombre"] ?></td>
                                    <td><?php echo $aProductos[2]["marca"] ?></td>
                                    <td><?php echo $aProductos[2]["modelo"] ?></td>
                                    <td><?php echo $productoTres ?></td>
                                    <td><?php echo $aProductos[2]["precio"] ?></td>
                                    <td><button class="btn-primary">Comprar</button></td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>