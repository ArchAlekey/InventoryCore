<?php

    require_once __DIR__ ."/../config/databaseconn.php";

    class TblEntidades{

        private $id_entidad;
        private $nombre_entidad;
        private $habilitado;
        private $fecha_alta;
        private $fecha_baja;

        public function __construct($id_entidad = null, $nombre_entidad = null, $habilitado = null, $fecha_alta = null, $fecha_baja = null){
            $this->id_entidad = $id_entidad;
            $this->nombre_entidad = $nombre_entidad;
            $this->habilitado = $habilitado;
            $this->fecha_alta = $fecha_alta;
            $this->fecha_baja = $fecha_baja;
        }
        public function getIdentidad(){ return $this->id_entidad; }
        public function setIdentidad($id_entidad){ $this->id_entidad = $id_entidad; }
        public function getEntidad(){ return $this->nombre_entidad; }
        public function setEntidad($nombre_entidad){ $this->nombre_entidad = $nombre_entidad; }
        public function getHabilitado() { return $this->habilitado; }
        public function setHabilitado($habilitado) { $this->habilitado = $habilitado; }
        public function getFechaAlta() { return $this->fecha_alta; }
        public function setFechaAlta($fecha_alta) { $this->fecha_alta = $fecha_alta; }
        public function getFechaBaja() { return $this->fecha_baja; }
        public function setFechaBaja($fecha_baja) { $this->fecha_baja = $fecha_baja; }
    }