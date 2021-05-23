<?php
session_start();
include("./db.php");
$con = new ConnectionDB();


$productSave = '<div class="alert success">Producto guardado exitosamente <a class="cerrar" onClick="Cerrar()">X</a></div>';
$errorProductExists = '<div class="alert danger">Error <br/> Este producto ya existe!! <a class="cerrar" onClick="Cerrar()">X</a></div>';
$errorInputs = '<div class="alert danger">Error <br/> Los campos estan vacios o ingresaste datos erroneos<a class="cerrar" onClick="Cerrar()">X</a></div>';
$delete = '<div class="alert success">Producto Eliminado <a class="cerrar" onClick="Cerrar()">X</a></div>';
$update = '<div class="alert success">Producto Actualizado <a class="cerrar" onClick="Cerrar()">X</a></div>';


if ($_POST) {
    if (isset($_POST['agregar'])) {

        $nombre_producto = $_POST['producto'];
        $unidades = intval($_POST['unidades']);
        $precio = floatval($_POST['precio']);
        if ($nombre_producto != "" && $unidades >= 1 &&  $precio > 0.0) {
            if ($con->ProductExists($nombre_producto) == false) {
                $con->InsertProduct($nombre_producto, $unidades, $precio);
                echo $productSave;
            } else {
                echo $errorProductExists;
            }
        } else {
            echo $errorInputs;
        }
    }

    if (isset($_POST['editar'])) {
        $id = $_POST['id_producto'];
        $editar_nombre = $_POST['editar_nombre'];
        $editar_unidades = intval($_POST['editar_unidades']);
        $editar_precio = floatval($_POST['editar_precio']);

        if ($con->UpdateProduct($editar_nombre, $editar_unidades, $editar_precio, $id)) {
            echo $update;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="../js/alerts.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shorcut icon" type="image/favicon" href="../images/logo.png" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>RGB_System</title>
</head>

<body>
    <header>
        <nav>
            <h1 class="logo"> <strong class="rgb">RGB</strong> System</h1>
            <div>
                <span class="user">
                    <?php
                    if ($_SESSION['user'] == null) {
                        header("Location: ../login.php");
                    } else {

                        echo $_SESSION['user'];
                    }
                    ?>
                </span>
                <a class="btn-1" href="./close.php">Cerrar Sesión</a>
            </div>
        </nav>
    </header>

    <main>

        <div class="grid">
            <section>
                <h1>INVENTARIO</h1>
                <nav class="nav-search">
                    <form class="formulario-eliminar">
                        <div id="ocultar">
                            <input type="number" id="id_eliminar" name="id_eliminar" />
                        </div>
                        <button type="submit" class="btn-2" id="eliminar">Eliminar</button>
                    </form>
                    <form class="form-search">
                        <input type="search" placeholder="search" />
                        <input type="submit" class="btn-1" value="Buscar">
                    </form>
                </nav>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>ID</th>
                            <th>PRODUCTO</th>
                            <th>CANTIDAD</th>
                            <th>PRECIO C/U ($)</th>
                        </tr>
                    </thead>
                </table>
                <div class="secction-table">
                    <table class="table">
                        <tbody>
                            <div class="body-table">
                                <?php $con->GetTotalInventory(); ?>
                            </div>

                        </tbody>
                    </table>
                </div>

            </section>
            <section>
                <form class="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h1 class="operation">AGREGAR PRODUCTO</h1>
                    <div class="inputs">
                        <label>Nombre de producto</label>
                        <input type="text" name="producto" placeholder="Ejemplo: Laptop HP" autocomplete="off" required />
                    </div>
                    <div class="inputs">
                        <label>Total Unidades</label>
                        <input type="text" name="unidades" placeholder="Ejemplo: 15" autocomplete="off" required />
                    </div>
                    <div class="inputs">
                        <label>Precio Unidad ($)</label>
                        <input type="text" name="precio" placeholder="Ejemplo: 1500" autocomplete="off" required />
                    </div>
                    <div class="inputs">
                        <input type="submit" name="agregar" value="Agregar" />
                    </div>
                </form>
                <!-- style="display:none;" -->
                <form class="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h1 class="operation">EDITAR PRODUCTO</h1>
                    <div class="inputs in-groups">
                        <div class="group">
                            <label for="user">Nombre de producto</label>
                            <input type="text" name="editar_nombre" id="nombre_producto" placeholder="Palas" autocomplete="off" required />
                        </div>
                        <div class="group" id="ocultar">
                            <label>Identificador</label>
                            <input type="number" name="id_producto" id="id_producto" />
                        </div>
                    </div>
                    <div class="inputs">
                        <label for="password">Total Unidades</label>
                        <input type="text" name="editar_unidades" id="cantidad_producto" placeholder="Ejemplo: 15" autocomplete="off" required />
                    </div>
                    <div class="inputs">
                        <label for="password">Precio Unidad ($)</label>
                        <input type="text" name="editar_precio" id="precio_producto" placeholder="Ejemplo: 15.50" autocomplete="off" required />
                    </div>
                    <div class="inputs">
                        <input type="submit" name="editar" value="Actualizar" />
                    </div>
                </form>
            </section>
        </div>
    </main>

    <script src="../js/main.js" type="module"></script>
</body>

</html>