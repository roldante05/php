<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//Definimos una clase, le damos propiedades y caracteristicas

class Cliente
{

    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;

    public function __construct()
    {
        $this->descuento = 0.0;
    }
    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
    public function imprimir()
    {
        echo "Documento: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Correo: " . $this->correo . "<br>";
        echo "Telefono: " . $this->telefono . "<br>";
        echo "Descuento: " . $this->descuento . "<br><br>";
    }
}

class Producto
{

    private $cod;
    private $nombre;
    private $descripcion;
    private $precio;
    private $iva;
    public function __construct()
    {
        $this->precio = 0.0;
        $this->iva = 0.0;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function imprimir()
    {
        echo "Codigo: " . $this->cod . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Descripcion: " . $this->descripcion . "<br>";
        echo "Precio: " . $this->precio . "<br>";
        echo "IVA: " . $this->iva . "<br><br>";
    }
}

class Carrito
{

    private $cliente;
    private $aProductos;
    private $subtotal;
    private $total;
    public function __construct()
    {
        $this->aProductos = array();
        $this->subtotal = 0.0;
        $this->total = 0.0;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function cargarProducto($producto)
    {
        $this->aProductos[] = $producto;
    }
    public function imprimirTicket()
    {

        echo " <table class='table table-hover border' style='width:400px'>";
        echo "<tr><th colspan='2' class='text-center'>ECO MARKET</th></tr>
            <tr>
            <th>Fecha</th>
            <td>" . date('d/m/y') . " </td>
            </tr>
            <tr>
            <th>DNI</th>
            <td>" . $this->cliente->dni . "</td>
            </tr>
            <tr>
            <th>Nombre</th>
            <td>" . $this->cliente->nombre . " </td>
            </tr>
            <tr>
            <th>Productos :</th>
            </tr>";
        foreach ($this->aProductos as $producto) {
            echo "<tr>
                <td>" . $producto->nombre . "</td>
                <td>$" . number_format($producto->precio, 2, ".", ".") . "</td>
                </tr>";
            $this->subtotal += $producto->precio;
            $this->total += $producto->precio * (($producto->iva / 100) + 1);
        }
        echo "<tr>
        <th>Subtotal s/IVA:</th>
        <td>$" . number_format($this->subtotal, 2, ",", ".");
        ".</td>
        </tr>";
        echo "<tr>
       <th>TOTAL:</th>
       <td>$" . number_format($this->total, 2, ",", ".");
        ".</td>
        </tr>
        </table>
    </div>";
    }
}

//Programa

$cliente1 = new Cliente();
$cliente1->dni = "38423442";
$cliente1->nombre = "Bernabé";
$cliente1->correo = "berna@gmail.com";
$cliente1->telefono = "+541188598686";
$cliente1->descuento = "0.05";
// print_r($cliente1);
// $cliente1->imprimir();

$producto1 = new Producto();
$producto1->cod = "AB8767";
$producto1->nombre = "Notebook 15\"HP";
$producto1->descripcion = "Esta es una computador HP";
$producto1->precio = "30800";
$producto1->iva = "21";
// print_r($producto1);
// $producto1->imprimir();

$producto2 = new Producto();
$producto2->cod = "QWR579";
$producto2->nombre = "Heladera Whirlpool";
$producto2->descripcion = "Esta es una Heladera Whirlpool";
$producto2->precio = "76000";
$producto2->iva = "10.5";
// print_r($producto2);
// $producto2->imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);



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
    <main class="container">
        <div class="row">
            <?php $carrito->imprimirTicket(); ?>
        </div>
    </main>
</body>

</html>