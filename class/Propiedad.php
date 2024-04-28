<?php

declare(strict_types=1);

namespace app;

use function PHPSTORM_META\map;

class Propiedad
{
    protected static $db;
    protected static $columnsDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];
    protected static $mesage = "";
    protected static $verificador = "";

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

    /*     public static function getErrores()
    {
        return self::$mesage;
    } */
    public function getVerificador()
    {
        //Revisar que los campos no esten vacios
        if ($this->titulo === '' || $this->precio === ''  ||    $this->descripcion === '' || $this->habitaciones === '' || $this->wc === '' || $this->estacionamiento === '' || $this->vendedores_id === '') {
            $verificador = 'Todos los campos son obligatorios';
            self::$verificador = $verificador;
        }

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
        return $verificador;
    }
    public function getMessage()
    {
        if (strlen($this->descripcion) < 50) {
            $mesage = 'Como minimo deben ser 50 caracteres en la descripción';
        } else if (strlen($this->descripcion) > 512) {
            $mesage = 'Como maximo pueden ser 512 caracteres en la descripción';
        }
        return self::$mesage = $mesage;
    }
}
