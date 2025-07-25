<?php

class CatUnidadesMedida{
    public $id_unidad_medida;
    public $unidad_medida;
    public $habilitado;
    public $fecha_alta;
    public $fecha_baja;

    public function __construct($id_unidad_medida = null, $unidad_medida = null, $habilitado = null, $fecha_alta = null, $fecha_baja = null){
        $this->id_unidad_medida = $id_unidad_medida;
        $this->unidad_medida = $unidad_medida;
        $this->habilitado = $habilitado;
        $this->fecha_alta = $fecha_alta;
        $this->fecha_baja = $fecha_baja;
    }

    public function getIdUnidadMedida(){ return $this->id_unidad_medida; }
    public function setIdUnidadMedida($id_unidad_medida){ $this->id_unidad_medida = $id_unidad_medida; }
    public function getUnidadMedida(){ return $this->unidad_medida; }
    public function setUnidadMedida($unidad_medida){ $this->unidad_medida = $unidad_medida; }
    public function getHabilitado(){ return $this->habilitado; }
    public function setHabilitado($habilitado){ $this->habilitado = $habilitado; }
    public function getFecha_alta(){ return $this->fecha_alta; }
    public function setFecha_alta($fecha_alta){ $this->fecha_alta = $fecha_alta; }
    public function getFecha_baja(){ return $this->fecha_baja; }
    public function setFecha_baja($fecha_baja){ $this->fecha_baja = $fecha_baja; }
}