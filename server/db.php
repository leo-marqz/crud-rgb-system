<?php 

class ConnectionDB {
    private $server = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db_name = 'rgb_system';
    public $idConnection;

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
            echo "Conectado ... ";
        }
    }

    public function Disconnect(): void
    {
        @mysqli_close($this->idConnection);
        echo "desconectado ... ";
    }

    //METODO DE VERIFICACION DE INICIO DE SESION.
    public function Login($user, $password)
    {
        $this->Connect();
        $query = "SELECT * FROM usuarios WHERE usuario = '" . $user . "' AND password = '" . MD5($password) . "' ";
        $result = mysqli_query($this->idConnection, $query);
        $nRows = mysqli_num_rows($result);
        $this->Disconnect();
        if($nRows == 0){
            return false;
        }else if($nRows == 1){
            return true;
        }
    }
}

?>