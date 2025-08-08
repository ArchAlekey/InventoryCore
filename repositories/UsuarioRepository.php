<?php
    require_once __DIR__ ."/../config/databaseconn.php";
    require_once __DIR__ ."/../models/TblUsuarios.php";

    class UsuarioRepository{
        private $conn;

        public function __construct(){
            $db = new Database();
            $this->conn = $db->conectar();
        }
        /* Métodos GET - Consulta una lista de usuarios activos*/
        public function consultaUsuarios($nombre, $apellido_paterno, $apellido_materno, $celular, $correo, $nombre_entidad, $habilitado){
            $spd = "CALL PD_CONSULTA_USUARIOS(:nombre, :apellido_paterno, :apellido_materno, :celular, :correo, :nombre_entidad, :habilitado)";
            $stmt = $this->conn->prepare($spd);

            $stmt->bindValue(":nombre",$nombre);
            $stmt->bindValue(":apellido_paterno",$apellido_paterno);
            $stmt->bindValue(":apellido_materno",$apellido_materno);
            $stmt->bindValue(":celular",$celular);
            $stmt->bindValue(":correo",$correo);
            $stmt->bindValue(":nombre_entidad",$nombre_entidad);
            $stmt->bindValue(":habilitado",$habilitado);
            $stmt->execute();

            $resultadoConsultaUsuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $resultadoConsultaUsuarios;
        }
        
        /* Método POST - Inserta un nuevo usuario */
        public function insertaUsuario($nombre, $apellido_paterno, $apellido_materno, $celular, $correo, $id_entidad, $id_tipo_usuario, $contrasenia){
                $spd = "CALL PD_INSERTA_USUARIO(:nombre, :apellido_paterno, :apellido_materno, :celular, :correo, :id_entidad, :id_tipo_usuario, :contrasenia)";
                $stmt = $this->conn->prepare($spd);

                $stmt->bindValue(":nombre",$nombre);
                $stmt->bindValue(":apellido_paterno",$apellido_paterno);
                $stmt->bindValue(":apellido_materno",$apellido_materno);
                $stmt->bindValue(":celular",$celular);
                $stmt->bindValue(":correo",$correo);
                $stmt->bindValue(":id_entidad",$id_entidad);
                $stmt->bindValue(":id_tipo_usuario",$id_tipo_usuario);
                $stmt->bindValue(":contrasenia",$contrasenia);
                
                return $stmt->execute();
        }

        /* Método POST - Actualiza datos del usuario */
        public function actualizaUsuarios($id_persona, $nombre, $apellido_paterno, $apellido_materno, $celular, $correo, $id_tipo_usuario){
            $spd = "CALL PD_ACTUALIZA_USUARIO(:id_persona, :nombre, :apellido_paterno, :apellido_materno, :celular, :correo, :id_tipo_usuario)";
            $stmt = $this->conn->prepare($spd);

            $stmt->bindValue(":id_persona",$id_persona);
            $stmt->bindValue(":nombre",$nombre);
            $stmt->bindValue(":apellido_paterno",$apellido_paterno);
            $stmt->bindValue(":apellido_materno",$apellido_materno);
            $stmt->bindValue(":celular",$celular);
            $stmt->bindValue(":correo",$correo);
            $stmt->bindValue(":id_tipo_usuario",$id_tipo_usuario);

            return $stmt->execute();
        }

        /* Método POST - INHABILITA a un usuario */
        public function inhabilitaUsuarios($id_persona){
            $spd = "CALL PD_INHABILITA_USUARIO(:id_persona)";
            $stmt = $this->conn->prepare($spd);

            $stmt->bindValue(":id_persona",$id_persona);

            return $stmt->execute();
        }

        /* Método POST - HABILITA a un usuario */
        public function habilitaUsuarios($id_persona){
            $spd = "CALL PD_HABILITA_USUARIO(:id_persona)";
            $stmt = $this->conn->prepare($spd);

            $stmt->bindValue(":id_persona",$id_persona);

            return $stmt->execute();
        }

        public function eliminaUsuarios($id_persona){
            $spd =  "CALL SPD_ELIMINA_USUARIO(:id_persona)";        
            $stmt = $this->conn->prepare($spd);

            $stmt->bindValue(":id_persona",$id_persona);
            return $stmt->execute();
        }

        public function validaUsuario($usuario, $contrasenia){
            $spd = "CALL PD_VALIDA_USUARIO(:usuario, :contrasenia)";
            $stmt = $this->conn->prepare($spd);

            $stmt->bindValue(":usuario",$usuario);
            $stmt->bindValue(":contrasenia",$contrasenia);
            $stmt->execute();

            $resultadoValidaUsuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $resultadoValidaUsuario;
        }


    }