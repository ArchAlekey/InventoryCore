<?php

class TblUsuarios{
    public $id_usuario;
    public $id_persona;
    public $id_entidad;
    public $id_tipo_usuario;
    public $usuario;
    public $contrasenia;
    public $habilitado;
    public $fecha_alta;
    public $fecha_baja;

    public function __construct($id_usuario = null, $id_persona = null, $id_entidad = null, $id_tipo_usuario = null, $usuario = null, $contrasenia = null, $habilitado = null, $fecha_alta = null, $fecha_baja = null){
        $this->id_usuario = $id_usuario;
        $this->id_persona = $id_persona;
        $this->id_entidad = $id_entidad;
        $this->id_tipo_usuario = $id_tipo_usuario;
        $this->usuario = $usuario;
        $this->contrasenia = $contrasenia;
        $this->habilitado = $habilitado;
        $this->fecha_alta = $fecha_alta;
        $this->fecha_baja = $fecha_baja;
    }

    public function getIdUsuario(){ return $this->id_usuario; }
    public function setIdUsuario($id_usuario){ $this->id_usuario = $id_usuario; }
    public function getIdPerson(){ return $this->id_persona; }
    public function setIdPerson($id_persona){ $this->id_persona = $id_persona; }
    public function getIdEntidad(){ return $this->id_entidad; }
    public function setIdEntidad($id_entidad){ $this->id_entidad = $id_entidad; }
    public function getIdTipoUsuario(){ return $this->id_tipo_usuario; }
    public function setIdTipoUsuario($id_tipo_usuario){ $this->id_tipo_usuario = $id_tipo_usuario; }
    public function getUsuario(){ return $this->usuario; }
    public function setUsuario($usuario){ $this->usuario = $usuario; }
    public function getContrasenia(){ return $this->contrasenia; }
    public function setContrasenia($contrasenia){ $this->contrasenia = $contrasenia; }
    public function gethabilitado(){ return $this->habilitado; }
    public function sethabilitado($habilitado){ $this->habilitado = $habilitado; }
    public function getFechaAlta() { return $this->fecha_alta; }
    public function setFechaAlta($fecha_alta){ $this->fecha_alta = $fecha_alta; }
    public function getFechaBaja() { return $this->fecha_baja; }
    public function setFechaBaja($fecha_baja){ $this->fecha_baja = $fecha_baja; }
}