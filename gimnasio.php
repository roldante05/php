<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// # = protected
//- = private
//+ = public

//Clase Padre

abstract class Persona
{

    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __construct($dni, $nombre, $correo, $celular)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->celular = $celular;
    }

    public function imprimir()
    {
        echo "DNI :" . $this->dni . "<br>";
        echo "Nombre :" . $this->nombre . "<br>";
        echo "Correo :" . $this->correo . "<br>";
        echo "Celular :" . $this->celular . "<br>";
    }
}


//Clase hija de  Persona

class Entrenador extends Persona
{

    private $aClases;

    public function __construct($dni, $nombre, $correo, $celular)
    {
        parent::__construct($dni, $nombre, $correo, $celular);
        $this->aClases = array();
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function asignarClase()
    {
    }
}

//Clase hija de  Persona

class Alumno extends Persona
{

    private $fechaNac;
    private $peso;
    private $alltura;
    private $aptoFisico;
    private $presentismo;

    public function __construct($dni, $nombre, $correo, $celular, $fechaNac)
    {
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->correo = $correo;
        $this->celular = $celular;
        $this->fechaNac = $fechaNac;
        $this->peso = 0.0;
        $this->alltura = 0.0;
        $this->aptoFisico = false;
        $this->presentismo = 0.0;
    }


    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function setFichaMedica($peso, $altura, $aptoFisico)
    {

        $this->peso = $peso;
        $this->alltura = $altura;
        $this->aptoFisico = $aptoFisico;
    }
}

class Clase
{

    private $nombre;
    private $entrenador;
    private $aAlumnos;

    public function __construct()
    {
        $this->aAlumnos = array();
    }


    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function asignarEntrenador($entrenador)
    {
        $this->entrenador = $entrenador;
    }
    public function inscribirAlumno($alumno)
    {
        $this->aAlumnos[] = $alumno;
    }
    public function imprimirListado()
    {
        echo "<table class='table table-bordered table-striped table-hover'>";
        echo "<tr><th class='table-dark text-center' colspan='4'>Clase: " . $this->nombre . "</th></tr>";
        echo "<tr><th colspan='2'>Entrenador:</th><td colspan='2'>" . $this->entrenador->nombre . "</td></tr>";
        echo "<tr><th colspan='4'>Alumnos inscritos:</th></tr>";
        echo "<tr><th>DNI</th><th>Nombre</th><th>Correo</th><th>Celular</th>";
        foreach ($this->aAlumnos as $alumno) {
            echo "<tr><td>" . number_format($alumno->dni, 0, ",", ".") . "</td><td>" . $alumno->nombre . "</td><td>" . $alumno->correo . "</td><td>" . $alumno->celular . "</td></tr>";
        }
        echo "</table>";
    }
}

//Programa

$entrenador1 = new Entrenador("34987789", "Miguel Ocampo", "miguel@gmail.com", "11578635");
$entrenador2 = new Entrenador("28987589", "Andrea Zarate", "andrea@gmail.com", "11768654");


$alumno1 = new Alumno("40787657", "Dante Montera", "dante@mail.com", "1145632457", "1997-08-28");
$alumno1->setFichaMedica(90, 178, true);
$alumno1->presentismo = 78;


$alumno2 = new Alumno("46766547", "Dario Turchi", "dario@mail.com", "1145632457", "1986-11-21");
$alumno2->setFichaMedica(73, 168, false);
$alumno2->presentismo = 68;

$alumno3 = new Alumno("39765454", "Facundo Fagnano", "facundo@mail.com", "1145632457", "1993-02-06");
$alumno3->setFichaMedica(90, 187, true);
$alumno3->presentismo = 88;

$alumno4 = new Alumno("41687536", "Dante Montera", "gaston@mail.com", "1145632457", "1999-11-02");
$alumno4->setFichaMedica(70, 169, false);
$alumno4->presentismo = 98;


$clase1 = new Clase();
$clase1->nombre = "Funcional";
$clase1->asignarEntrenador($entrenador1);
$clase1->inscribirAlumno($alumno1);
$clase1->inscribirAlumno($alumno3);
$clase1->inscribirAlumno($alumno4);
$clase1->imprimirListado();

$clase2 = new Clase();
$clase2->nombre = "Zumba";
$clase2->asignarEntrenador($entrenador2);
$clase2->inscribirAlumno($alumno1);
$clase2->inscribirAlumno($alumno2);
$clase2->inscribirAlumno($alumno3);
// $clase2->imprimirListado();
