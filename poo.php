<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definimos una clase, le damos propiedades y caracteristicas

class Persona
{
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function setDni($dni)
    {
        $this->dni = $dni;
    }
    public function getDni()
    {
        return $this->dni;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }
    public function getEdad()
    {
        return $this->edad;
    }

    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    }
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    public function __destruct()
    {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

    public function imprimir()
    {
    }
}
class Alumno extends Persona
{
    private $lejago;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function __destruct()
    {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

    public function __construct($dni = "", $nombre = "")
    {

        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
    }

    public function imprimir()
    {
        echo "Alumno: " . $this->nombre . "<br>";
        echo "Documento: " . $this->dni . "<br>";
        echo "Nota Php: " . $this->notaPhp . "<br>";
        echo "Nota Proyecto: " . $this->notaProyecto . "<br>";
        echo "Nota Portfolio: " . $this->notaPortfolio . "<br><br>";
    }

    public function calcularPromedio()
    {
    }
}
class Docente extends Persona
{
    private $especialidad;


    const ESPECIALIDAD_WP = "Word Press";
    const ESPECIALIDAD_ECO = "Economia aplicada";
    const ESPECIALIDAD_BBDD = "Base de Datos";


    public function __construct($dni, $nombre, $especialidad)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->especialidad = $especialidad;
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
        echo "Docente: " . $this->nombre . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Especialidad: " . $this->especialidad . "<br><br>";
    }

    public function imprimirEspecialidadesHabilitadas()
    {
        echo "Especialidades: <br>";
        echo self::ESPECIALIDAD_WP . "<br>";
        echo self::ESPECIALIDAD_ECO . "<br>";
        echo self::ESPECIALIDAD_BBDD . "<br><br>";
    }

    public function __destruct()
    {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
}


//Programa definimos el objeto
$alumno1 = new Alumno("44562451", "Rocio Gimenez");
$alumno1->nacionalidad = "Argentina";
$alumno1->notaPhp = 0;
$alumno1->notaPortfolio = 9;
$alumno1->notaProyecto = 10;
$alumno1->imprimir();

$alumno2 = new Alumno();
$alumno2->nombre = "Dante Augusto Roldan";
$alumno2->dni = "43671551";
$alumno2->nacionalidad = "Argentina";
$alumno2->notaPhp = 0;
$alumno2->notaPortfolio = 8;
$alumno2->notaProyecto = 9;
$alumno2->imprimir();

$docente =  new Docente("Gabriel Fabri", "44562451", Docente::ESPECIALIDAD_ECO);
// $docente->nombre = "Gabriel Fabri";
$docente->nacionalidad = "Argentina";
// $docente->especialidad = Docente::ESPECIALIDAD_ECO;
$docente->profesion = "Profesor de Geografia";
$docente->imprimir();
$docente->imprimirEspecialidadesHabilitadas();
