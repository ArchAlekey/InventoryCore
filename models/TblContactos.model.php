<?php

require_once __DIR__ . "/../config/databaseconn.php";

class TblContacto {

    private $id_contacto;
    private $nombre_contacto;
    private $correo;
    private $mensaje;
    private $estatus_peticion;
    private $fecha_alta;

    public function __construct(
        $id_contacto = null,
        $nombre_contacto = null,
        $correo = null,
        $mensaje = null,
        $estatus_peticion = null,
        $fecha_alta = null
    ) {
        $this->id_contacto = $id_contacto;
        $this->nombre_contacto = $nombre_contacto;
        $this->correo = $correo;
        $this->mensaje = $mensaje;
        $this->estatus_peticion = $estatus_peticion;
        $this->fecha_alta = $fecha_alta;
    }

    public function getIdContacto() {
        return $this->id_contacto;
    }

    public function setIdContacto($id_contacto) {
        $this->id_contacto = $id_contacto;
    }

    public function getNombreContacto() {
        return $this->nombre_contacto;
    }

    public function setNombreContacto($nombre_contacto) {
        $this->nombre_contacto = $nombre_contacto;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    public function getEstatusPeticion() {
        return $this->estatus_peticion;
    }

    public function setEstatusPeticion($estatus_peticion) {
        $this->estatus_peticion = $estatus_peticion;
    }

    public function getFechaAlta() {
        return $this->fecha_alta;
    }

    public function setFechaAlta($fecha_alta) {
        $this->fecha_alta = $fecha_alta;
    }
}
