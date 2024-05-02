<?php

declare(strict_types=1);

namespace app;

use mysqli;

class Propiedad
{
    protected static $db;
    protected static $columnsDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];
    protected static $tituloErr = "";
    protected static $mesage = "";
    protected static $precioErr = "";
    protected static $habiErr = "";
    protected static $wcErr = "";
    protected static $estErr = "";
    protected static $imgErr = "";
    protected static $vendErr = "";

    public  $id;
    public  $titulo;
    public  $precio;
    public  $imagen;
    public  $descripcion;
    public  $habitaciones;
    public  $wc;
    public  $estacionamiento;
    public  $creado;
    public  $vendedores_id;

    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? "";
        $this->titulo = $args['titulo'] ?? "";
        $this->precio = $args['precio'] ?? "";
        $this->imagen = $args['imagen'] ?? "";
        $this->descripcion = $args['descripcion'] ?? "";
        $this->habitaciones = $args['habitaciones'] ?? "";
        $this->wc = $args['wc'] ?? "";
        $this->estacionamiento = $args['estacionamiento'] ?? "";
        $this->creado = date("Y/m/d");
        $this->vendedores_id = $args['vendedores_id'] ?? "";
    }

    public function saveInfo()
    {
        //Sanitizar los Datos

        $atributos = $this->sanitizarDatos();

        $query = "INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ( ' ";
        $query .= join("', '", array_values($atributos));
        $query .= "')";

        $resultado = self::$db->query($query);
        return $resultado;
    }


    //Del arreglo static creado generaremos un arreglo asociativo en atributos ya que el nombre del arreglo sera asignado en atributos[col] y su valor en this->cols sera el que ingresemos en los inputs
    public function atributes()
    {
        $atributos = [];
        foreach (self::$columnsDB as $cols) {
            if ($cols === 'id') continue;
            $atributos[$cols] = $this->$cols;
        }
        return $atributos;
    }

    //Del arreglo asociativo creado iteraremos en el y sera almacenado en un arrelgo nuevo $sanitizado donde el nombre estara en key y el valor en value
    public function sanitizarDatos()
    {
        $atributos = $this->atributes();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    //Creamos una funcion para realizar el query All
    public static function all()
    {
        $query = "SELECT * FROM propiedades";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Separamos el codigo en otra clase para realizar la query en esta obtendremos un arreglo asosiativo y este lo almacenaremos en un arreglo con un foreach 
    public static function consultarSQL($query)
    {
        $datos = self::$db->query($query)->fetch_all(MYSQLI_ASSOC);
        $info = [];
        foreach ($datos as $dat) {
            $info[] = self::crearObjeto($dat);
        }
        return $info;
    }
    //Con esta funcion crearemos objetos, la instancia de objeto hace que tenga todos los datos del constructor y con un foreach hacemos un mapeo de la estructura del objeto dependiendo si existe un key o no 
    protected static function crearObjeto($registro)
    {
        $objeto = new self();
        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }


    public function setImage($imagen)
    {
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }
    public function checkTitle()
    {
        if ($this->titulo === "") {
            self::$tituloErr = "El titulo no puede estar vacio";
        }
        return self::$tituloErr;
    }
    public  function checkPrecio()
    {
        if ($this->precio === "") {
            self::$precioErr = "El precio no puede estar vacio";
        }
        return self::$precioErr;
    }
    public function checkMessage()
    {
        if (strlen($this->descripcion) < 50) {
            self::$mesage = 'Como minimo deben ser 50 caracteres en la descripción';
        } else if (strlen($this->descripcion) > 512) {
            self::$mesage = 'Como maximo pueden ser 512 caracteres en la descripción';
        }
        return self::$mesage;
    }

    public function checkRooms()
    {
        if ($this->habitaciones === "") {
            self::$habiErr = "Seleccione un numero de habitaciones";
        }
        return self::$habiErr;
    }
    public function checkWC()
    {
        if ($this->habitaciones === "") {
            self::$wcErr = "Seleccione un numero de Baños";
        }
        return self::$wcErr;
    }

    public function checkStaiment()
    {
        if ($this->habitaciones === "") {
            self::$estErr = "Seleccione un numero de estacionamientos";
        }
        return self::$estErr;
    }
    public function checkVendedor()
    {
        if ($this->vendedores_id === "") {
            self::$vendErr = "Seleccione un vendedor";
        }
        return self::$vendErr;
    }
    public function checkImage()
    {
        if ($this->imagen === "") {
            self::$imgErr = "Ingrese una imagen";
        }
        return self::$imgErr;
    }
}
