<?php 

class ConnectionDB {
    private $server = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db_name = 'rgb_system';
    public $idConnection;
    public $name_user = "";
    public $pass_user = "";

    //METODOS DE CONEXION Y DESCONEXION A LA BASE DE DATOS.
    public function Connect(): void
    {
        @$this->idConnection = mysqli_connect(
            $this->server,
            $this->user,
            $this->password,
            $this->db_name
        );
    
        if(mysqli_connect_errno()){
            die("Error al conectarse a la base de datos");
        }else{
        }
    }

    public function Disconnect(): void
    {
        @mysqli_close($this->idConnection);
    }

    //METODO DE VERIFICACION DE INICIO DE SESION.
    public function Login()
    {
        $this->Connect();
        $query = "SELECT * FROM usuarios WHERE usuario = '" . $this->name_user . "' AND password = '" . MD5($this->pass_user) . "' ";
        $result = mysqli_query($this->idConnection, $query);
        $nRows = mysqli_num_rows($result);
        $this->Disconnect();
        if($nRows == 0){
            return false;
        }else if($nRows == 1){
            return true;
        }
    }

    public function GetName(){
        $this->Connect();
        $query = "SELECT nombre FROM usuarios WHERE usuario = '" . $this->name_user . "' AND password = '" . MD5($this->pass_user) . "' ";
        $result = mysqli_query($this->idConnection, $query);
        while($rs = mysqli_fetch_array($result)){
            $this->Disconnect();
            return $rs['nombre'];
        }
    }
}

?>