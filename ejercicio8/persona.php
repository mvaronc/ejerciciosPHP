<?php
/*
En un archivo llamado persona.php , crea una clase Persona con los siguientes atributos: nombre, apellidos y edad.

* Crea su constructor, métodos  get y set.

* Crea las siguientes funciones como métodos públicos:
– mayorEdad: indica si es o no mayor de edad.
– nombreCompleto: devuelve el nombre mas apellidos
*/
class Persona
{
    private $nombre;
    private $apellidos;
    private $edad;

    public function __construct($nombre, $apellidos, $edad)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nuevoNombre)
    {
        $this->nombre = $nuevoNombre;
        return $this;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function setApellidos($nuevoApellidos)
    {
        $this->apellidos = $nuevoApellidos;
        return $this;
    }

    public function getEdad()
    {
        return $this->edad;
    }
    public function setEdad($nuevaEdad)
    {
        $this->edad = $nuevaEdad;
        return $this;
    }

    public function mayorEdad()
    {
        if ($this->edad >= 18) {
            return true;
        } else {
            return false;
        }
    }

    public function nombreCompleto()
    {
        return $this->nombre . " " . $this->apellidos;
    }
}