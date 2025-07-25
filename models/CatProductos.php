<?php

class CatProductos {
    private $id_producto;
    private $producto;
    private $habilitado;
    private $fecha_alta;
    private $fecha_baja;

    public function __construct($id_producto = null, $producto = null, $habilitado = null, $fecha_alta = null, $fecha_baja = null) {
        $this->id_producto = $id_producto;
        $this->producto = $producto;
        $this->habilitado = $habilitado;
        $this->fecha_alta = $fecha_alta;
        $this->fecha_baja = $fecha_baja;
    }
    // Getters y setters
    public function getIdProducto() { return $this->id_producto; }
    public function setIdProducto($id_producto) { $this->id_producto = $id_producto; }
    public function getProducto() { return $this->producto; }
    public function setProducto($producto) { $this->producto = $producto; }
    public function getHabilitado() { return $this->habilitado; }
    public function setHabilitado($habilitado) { $this->habilitado = $habilitado; }
    public function getFechaAlta() { return $this->fecha_alta; }
    public function setFechaAlta($fecha_alta) { $this->fecha_alta = $fecha_alta; }
    public function getFechaBaja() { return $this->fecha_baja; }
    public function setFechaBaja($fecha_baja) { $this->fecha_baja = $fecha_baja; }
}
