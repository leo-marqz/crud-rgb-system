<?php 

include("./db.php");
$con = new ConnectionDB();
if($_POST){
    $id = $_POST['id_eliminar'];
    $con->DeleteProduct($id);
    header("Location: ./main.php");
}

?>