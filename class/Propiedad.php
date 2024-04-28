<?php

declare(strict_types=1);

namespace app;

use function PHPSTORM_META\map;

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
        $this->imagen = $args['imagen'] ?? "imagen.jpg";
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
        //Almacenar imagen
        /*    
        $size = 1024 * 1024 * 2;

        if ($imagen["name"] === "") {
            $error  = "Debe subir una imagen";
        }

        if ($imagen["size"] > $size) {
            $error = "La imagen es muy pesada";
        }
        */
    }
}
