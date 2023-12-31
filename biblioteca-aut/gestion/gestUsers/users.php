<?php
class users{
    private $conexion;
    private $table="usuarios";
    public function __construct($conexion){
        $this->conexion = $conexion;
    }
    public function get_users(){
        $sql = "SELECT * FROM $this->table";
        $result = $this->conexion->query($sql);
        $users = array();
        while($row = $result->fetch_assoc()){       
            $users[] = $row;
        }
        return $users;    
    }
    public function get_user($id){
        $sql = "SELECT * FROM $this->table WHERE login = '$id';";
        $result = $this->conexion->query($sql);
        $user = $result->fetch_assoc();
        return $user;
    }
    public function insert_user($login, $password, $nombre,$apellidos,$rol){

        $login = $this->conexion->real_escape_string($login);
        $password = $this->conexion->real_escape_string($password);
        $nombre = $this->conexion->real_escape_string($nombre);
        $apellidos = $this->conexion->real_escape_string($apellidos);
        $rol = $this->conexion->real_escape_string($rol);
        if ($rol!="administrador" && $rol!="bibliotecario" && $rol!="registrado"){
            $rol="registrado";
        }

        $salt = random_int(-1000000, 1000000);
        $password = password_hash($password.$salt,PASSWORD_DEFAULT);
        $sql = "INSERT INTO $this->table (login, password, salt, nombre, apellidos,rol) VALUES ('$login', '$password', '$salt', '$nombre', '$apellidos','$rol')";
        $result = $this->conexion->query($sql);
        return $result;
    }
    public function delete_user($id){
        $id = $this->conexion->real_escape_string($id);
        $sql = "DELETE FROM $this->table WHERE login = '$id'";
        $result = $this->conexion->query($sql);
        return $result;
    }

   public function update_user($login, $password=NULL, $nombre=NULL,$apellidos=NULL,$rol=NULL){
            $miSet = "SET ";
            if($password!=NULL or $password!=""){
                $password = $this->conexion->real_escape_string($password);
                $salt = random_int(-1000000, 1000000);
                $password = password_hash($password.$salt,PASSWORD_DEFAULT);
                $miSet .= "password = '$password', salt = '$salt',";
            }
            if($nombre or $nombre!=""){
                $nombre = $this->conexion->real_escape_string($nombre);
                $miSet .= "nombre = '$nombre',";
            }
            if($apellidos or $apellidos!=""){
                $apellidos = $this->conexion->real_escape_string($apellidos);
                $miSet .= "apellidos = '$apellidos',";
            }
            if($rol or $rol!=""){
                $rol = $this->conexion->real_escape_string($rol);
                $miSet .= "rol = '$rol',";
            }
            $miSet = substr($miSet, 0, -1);
            $sql = "UPDATE $this->table $miSet WHERE login = '$login';";
            $result = $this->conexion->query($sql);
            return $result;

        }
    
}
    ?>