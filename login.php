<?php 
session_start();
include("./server/db.php");
if($_POST){
    $con = new ConnectionDB();
    $con->name_user = $_POST['user'];
    $con->pass_user = $_POST['password'];
    if($con->Login()){
        $_SESSION['user'] = $con->GetName();
        header("Location: ./server/main.php");
    }else{
        echo '<div class="alert danger">Error <br/> Usuario o contraseña invalida <a class="cerrar" onClick="Cerrar()">X</a></div>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/inicio_sesion.css" />
    <link rel="shorcut icon" type="image/favicon" href="./images/logo.png" />
    <title>Login - RGB_System</title>
</head>
<body>
<div class="container-login">
    <form class="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <h1 class="logo"> <strong class="rgb">RGB</strong> System</h1>
        <div class="inputs">
        <label for="user">Usuario</label>
            <input type="text" name="user" placeholder="Ingresa tu nombre de usuario" autofocus autocomplete="off" required />
        </div>
        <div class="inputs">
            <label for="password">Contraseña</label>
            <input class="form-control" type="password" name="password" placeholder="Ingresa tu contraseña" required />
        </div>
        <div class="inputs">
            <input type="submit" value="Iniciar Sesión" />
        </div>
    </form>

</div>
</div>
<footer>
    <h4>©2021 - Todos los derechos reservados </h4>
    <div class="logo"><strong class="rgb">RGB</strong> System  <img class="logo-img" src="./images/logo.png" /></div>
</footer>
<script src="./js/alerts.js"></script>
</body>
</html>



