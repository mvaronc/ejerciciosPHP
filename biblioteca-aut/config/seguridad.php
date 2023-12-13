<?php
class seguridad{
    private $session;
    private $user;
    private $conexion;
    public function __construct($conexion){
        $this->conexion = $conexion;
        $this->session = false;
        $this->user = "";
        session_start();
        if(isset($_SESSION['user']) and 
            ($_SESSION['IPRemoto']==$_SERVER['REMOTE_ADDR'])
            and 
            $_SESSION['puertoRemoto']==$_SERVER['REMOTE_PORT']){
            $this->session = true;
            $this->user = $_SESSION['user'];
        }
    }

    public function login($login, $password){
        $login = $this->conexion->real_escape_string($login);
        $password = $this->conexion->real_escape_string($password);
        $sql = "SELECT * FROM usuarios WHERE login = '$login';";
        $result = $this->conexion->query($sql);
        $user = $result->fetch_assoc();
        if($user){
            if(password_verify($password.$user['salt'],$user['password'])){
                $this->session = true;
                $this->user = $user['login'];
                $_SESSION['user'] = $user['login'];
                $_SESSION['rol'] = $user['rol'];
                $_SESSION['IPRemoto']=$_SERVER['REMOTE_ADDR'];
                $_SESSION['puertoRemoto']=$_SERVER['REMOTE_PORT'];
                return true;
            }
        }
        return false;
    }
   public function logout(){
        $this->session = false;
        $this->user = "";
        foreach($_SESSION as $k => $v){
            unset($_SESSION[$k]);
        }
    
    }
    public function isLogged(){
        return $this->session;
    }
    public function getUser(){
        return $this->user;
    }
    public function getRol(){
        return $_SESSION['rol'];
    }
    public function secureRol($rol=NULL){

        if($rol==NULL){//será para todo los roles, devolvemos si hay sesion;
            return $this->isLogged();
        }
        if(!is_array($rol)){
            $rol = [$rol];
        }
        if(!in_array($_SESSION['rol'],$rol)){
            header("Location: ../index.php");
        }            
        
    }
}

?>