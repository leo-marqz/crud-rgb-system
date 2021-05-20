<?php 

include("./db.php");
$con = new ConnectionDB();
echo "hola";
if($_GET){
    $id = $_GET['id'];
    echo $id;
    $con->DeleteProduct($id);
    // header("Location: ./main.php");
}

?>