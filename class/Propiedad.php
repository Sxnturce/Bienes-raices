<?php

declare(strict_types=1);

namespace app;


class Propiedad
{
    public  $id;
    public  $titulo;
    public  $precio;
    public  $imagen;
    public  $descripcion;
    public  $habitaciones;
    public  $wc;
    public  $estacionamiento;
    public  $date;
    public  $vendedores_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? "";
        $this->titulo = $args['titulo'] ?? "";
        $this->precio = $args['precio'] ?? "";
        $this->imagen = $args['imagen'] ?? "";
        $this->descripcion = $args['descripcion'] ?? "";
        $this->habitaciones = $args['habitaciones'] ?? "";
        $this->wc = $args['wc'] ?? 0;
        $this->estacionamiento = $args['estacionamiento'] ?? "";
        $this->date = $args['date'] ?? "";
        $this->vendedores_id = $args['vendedores_id'] ?? "";
    }
}
