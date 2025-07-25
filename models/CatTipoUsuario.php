<?php

class CatTipoUsuario{
    public $id_tipo_usuario;
    public $tipo_usuario;
    public $habilitado;
    public $fecha_alta;
    public $fecha_baja;

    public function __construct($id_tipo_usuario = null, $tipo_usuario = null, $habilitado = null, $fecha_alta = null, $fecha_baja = null){
        $this->id_tipo_usuario = $id_tipo_usuario;
        $this->tipo_usuario = $tipo_usuario;
        $this->habilitado = $habilitado;
        $this->fecha_alta = $fecha_alta;
        $this->fecha_baja = $fecha_baja;
    }
    public function getIdTipoUsuario(){ return $this->id_tipo_usuario; }
    public function setIdTipoUsuario($id_tipo_usuario){ $this->id_tipo_usuario = $id_tipo_usuario; }

    public function getTipoUsuario(){ return $this->tipo_usuario; } 
    public function setTipoUsuario($tipo_usuario){ $this->tipo_usuario = $tipo_usuario; }

    public function getHailitado(){ return $this->habilitado; }
    public function setHailitado($habilitado){ $this->habilitado = $habilitado; }

    public function getFechaAlta(){ return $this->fecha_alta; }
    public function setFechaAlta($fecha_alta){ $this->fecha_alta = $fecha_alta; }
    public function getFechaBaja(){ return $this->fecha_baja; }
    public function setFechaBaja($fecha_baja){ $this->fecha_baja = $fecha_baja; }
}