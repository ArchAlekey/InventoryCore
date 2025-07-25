<?php

class TblPersonas{
    public $id_persona;
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $celular;
    public $correo;
    public $habilitado;
    public $fecha_alta;
    public $fecha_baja;

    public function __construct($id_persona = null, $nombre = null, $apellido_paterno = null, $apellido_materno = null, $celular = null, $correo = null, $habilitado = null, $fecha_alta = null, $fecha_baja = null){
        $this->id_persona = $id_persona;        
        $this->nombre = $nombre;
        $this->apellido_paterno = $apellido_paterno;
        $this->apellido_materno = $apellido_materno;
        $this->celular = $celular;
        $this->correo = $correo;
        $this->habilitado = $habilitado;
        $this->fecha_alta = $fecha_alta;
        $this->fecha_baja = $fecha_baja;
    }

    public function getIdPersona(){ return $this->id_persona; }
    public function setIdPersona($id_persona){ $this->id_persona = $id_persona; }
    public function getNombre(){ return $this->nombre; }
    public function setNombre($nombre){ $this->nombre = $nombre; }
    public function getApellidoPaterno(){ return $this->apellido_paterno; }
    public function setApellidoPaterno($apellido_paterno){ $this->apellido_paterno = $apellido_paterno; }
    public function getApellidoMaterno(){ return $this->apellido_materno; }
    public function setApellidoMaterno($apellido_materno){ $this->apellido_materno = $apellido_materno; }
    public function getCelular(){ return $this->celular; }
    public function setCelular($celular){ $this->celular = $celular; }
    public function getCorreo(){ return $this->correo; }
    public function setCorreo($correo){ $this->correo = $correo; }
    public function getHabilitado(){ return $this->habilitado; }
    public function setHabilitado($habilitado){ $this->habilitado = $habilitado; }
    public function getFechaAlta(){ return $this->fecha_alta; }
    public function setFechaAlta($fecha_alta){ $this->fecha_alta = $fecha_alta; }
    public function getFechaBaja(){ return $this->fecha_baja; }
    public function setFechaBaja($fecha_baja){ $this->fecha_baja = $fecha_baja; }
}