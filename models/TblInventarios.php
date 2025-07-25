<?php

class TblInventarios{
    public $id_item_inventario;
    public $id_producto;
    public $id_usuario;
    public $cantidad;
    public $id_unidad_medida;
    public $habilitado;
    public $fecha_alta;
    public $fecha_baja;

    public function __construct($id_item_inventario = null, $id_producto = null, $id_usuario = null, $cantidad = null, $id_unidad_medida = null, $habilitado = null, $fecha_alta = null, $fecha_baja = null){
        $this->id_item_inventario = $id_item_inventario;
        $this->id_producto = $id_producto;
        $this->id_usuario = $id_usuario;
        $this->cantidad = $cantidad;
        $this->id_unidad_medida = $id_unidad_medida;
        $this->habilitado = $habilitado;
        $this->fecha_alta = $fecha_alta;
        $this->fecha_baja = $fecha_baja;
    }
    public function getIdItemInventario(){ return $this->id_item_inventario; }
    public function setIdItemInventario($id_item_inventario){ $this->id_item_inventario = $id_item_inventario; }
    public function getIdProducto(){ return $this->id_producto; }
    public function setIdProducto($id_producto){ $this->id_producto = $id_producto; }
    public function getIdUsuario(){ return $this->id_usuario; }
    public function setIdUsuario($id_usuario){ $this->id_usuario = $id_usuario; }
    public function getCantidad(){ return $this->cantidad; }
    public function setCantidad($cantidad){ $this->cantidad = $cantidad; }
    public function getIdUnidadMedida(){ return $this->id_unidad_medida; }
    public function setIdUnidadMedida($id_unidad_medida){ $this->id_unidad_medida = $id_unidad_medida; }
    public function gethabilitado(){ return $this->habilitado; }
    public function sethabilitado($habilitado){ $this->habilitado = $habilitado; }
    public function getFechaAlta() { return $this->fecha_alta; }
    public function setFechaAlta($fecha_alta){ $this->fecha_alta = $fecha_alta; }
    public function getFechaBaja() { return $this->fecha_baja; }
    public function setFechaBaja($fecha_baja){ $this->fecha_baja = $fecha_baja; }
}