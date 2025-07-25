<?php

class TblBitacora{
    public $id_item_bitacora;
    public $id_item_inventario;
    public $cantidad;
    public $ultima_modificacion;
    public $tipo_modificacion;

    public function __construct($id_item_bitacora = null, $id_item_inventario = null, $cantidad = null, $ultima_modificacion = null, $tipo_modificacion = null){ 
        $this->id_item_bitacora = $id_item_bitacora;
        $this->id_item_inventario = $id_item_inventario;
        $this->cantidad = $cantidad;
        $this->ultima_modificacion = $ultima_modificacion;
        $this->tipo_modificacion = $tipo_modificacion;
    }

    public function getIdItemBitacora(){ return $this->id_item_bitacora; }
    public function setIdItemBitacora($id_item_bitacora){ $this->id_item_bitacora = $id_item_bitacora; }
    public function getIdItemInventario(){ return $this->id_item_inventario; }
    public function setIdItemInventario($id_item_inventario){ $this->id_item_inventario = $id_item_inventario; }
    public function getCantidad(){ return $this->cantidad; }
    public function setCantidad($cantidad){ $this->cantidad = $cantidad; }
    public function getUltimaModificacion(){ return $this->ultima_modificacion; }
    public function setUltimaModificacion($ultima_modificacion){ $this->ultima_modificacion = $ultima_modificacion; }
    public function getTipoModificacion(){ return $this->tipo_modificacion; }
    public function setTipoModificacion($tipo_modificacion){ $this->tipo_modificacion = $tipo_modificacion; }
}