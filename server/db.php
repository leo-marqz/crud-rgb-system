<?php 

class ConnectionDB {
    private $server = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db_name = 'rgb_system';
    public $idConnection;
    public $name_user = "";
    public $pass_user = "";
    public $search = "";

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

    public function TotalData()
    {
        $this->Connect();
        $data = [];
        $query = "SELECT * FROM inventario";
        $result = mysqli_query($this->idConnection, $query);
        $x = 0;
        while($rs = mysqli_fetch_array($result)){
            $data[$x] = $rs;
            $x++;
        }
        $this->Disconnect();
        return $data;
    }
    

    //METODO PARA AGREGAR RODUCTOS A MI BASE DE DATOS
    public function InsertProduct($product, $units, $price): void
    {
        $this->Connect();
        $query = "INSERT INTO inventario (nombre_producto, unidades_producto, precio_producto) VALUES ('" . $product . "', '" . $units ."', '" . $price . "')";
        $result = mysqli_query($this->idConnection, $query);
        $this->Disconnect();
    }

    public function ProductExists($product_name)
    {
        $this->Connect();
        $query = "SELECT * FROM inventario WHERE nombre_producto='" . $product_name . "' ";
        $result = mysqli_query($this->idConnection, $query);
        $rs = mysqli_num_rows($result);
        if($rs == 0){
            return false;
        }else{
            return true;
        }
    }
    
    public function DeleteProduct($id)
    {
        // DELETE FROM `rgb_system`.`inventario` WHERE (`id_producto` = '1010');
        $this->Connect();
        $query = "DELETE FROM inventario WHERE (id_producto = '" . $id . "')";
        $rs = mysqli_query($this->idConnection, $query);
        $this->Disconnect();
    }

    public function UpdateProduct($nombre_producto, $c_unidades, $p_unidad, $id_producto){
        $this->Connect();
        $query = "UPDATE inventario SET nombre_producto='" . $nombre_producto . "', unidades_producto='" . $c_unidades ."', precio_producto='" . $p_unidad . "' WHERE id_producto='". $id_producto . "'";
        $result = mysqli_query($this->idConnection, $query);
        $this->Disconnect();
        return true;
    }

    //ESTE METODO DEVUELVE LOS RESULTADOS SEGUN BUSQUEDA,
    // PERO SI ESTA VACIO RETORNARA TODOS LOS PRODUCTOS
    // DE LA BASE DE DATOS Y SI NO EXISTE LANZARA MENSAJE DE QUE NO EXISTE
    public function Search()
    {
        $this->Connect();
        if($this->search != ""){
            $query = "SELECT * FROM rgb_system.inventario WHERE nombre_producto LIKE '%" . $this->search . "%' ";
            $result = mysqli_query($this->idConnection, $query);
            $rs = mysqli_num_rows($result);
            if($rs != 0){

                $x = 1;
                while($rs = mysqli_fetch_array($result)){
                    $url = "/delete.php?id='" . $rs['id_producto'] . "'";
                    echo "<tr class='row'>
                                    <td>" . $x . "</td>
                                    <td>" . $rs["id_producto"] . "</td>
                                    <td>" . $rs["nombre_producto"] . "</td>
                                    <td>" . $rs["unidades_producto"] . "</td>
                                    <td>$" . $rs["precio_producto"] . "</td>
                         </tr>";
                    $x++;
                }
            }else{
                echo "<div class='empty'> No se a encontrado nada </div>";
            }
        }else{
            $query = "SELECT * FROM rgb_system.inventario;";
        $result = mysqli_query($this->idConnection, $query);
        $x = 1;
        while($rs = mysqli_fetch_array($result)){
            $url = "/delete.php?id='" . $rs['id_producto'] . "'";
            echo "<tr class='row'>
                            <td>" . $x . "</td>
                            <td>" . $rs["id_producto"] . "</td>
                            <td>" . $rs["nombre_producto"] . "</td>
                            <td>" . $rs["unidades_producto"] . "</td>
                            <td>$" . $rs["precio_producto"] . "</td>
                 </tr>";
            $x++;
        }
        }
        $this->Disconnect();
    }
}



?>