<?php
session_start();
include("./db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shorcut icon" type="image/favicon" href="../images/logo.png" />
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <title>RGB_System</title>
</head>

<body >
    <header>
        <nav>
            <h1 class="logo"> <strong class="rgb">RGB</strong> System</h1>
            <div>
                <span class="user">
                    <?php
                       echo $_SESSION['user'];
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
                    <button class="btn-2">ELIMINAR PRODUCTO</button>
                    <legend>Buscar <input type="search" placeholder="search" /> </legend>
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
                    <tbody>
                        <?php 
                          $con = new ConnectionDB();
                          $con->GetTotalInventory();
                        ?>

                    </tbody>
                </table>
            </section>
            <section>
                <form class="form">
                    <h1 class="operation">AGREGAR PRODUCTO</h1>
                    <div class="inputs">
                        <label for="user">Nombre de producto</label>
                        <input type="text" name="user" placeholder="Cafe Listo"  required />
                    </div>
                    <div class="inputs">
                        <label for="password">Precio Unidad ($)</label>
                        <input type="password" name="password" placeholder="Ejemplo: 15.50" required />
                    </div>
                    <div class="inputs">
                        <label for="password">Total Unidades</label>
                        <input type="password" name="text" placeholder="Ejemplo: 15" required />
                    </div>
                    <div class="inputs">
                        <input type="submit" value="Agregar" />
                    </div>
                </form>
                <!-- style="display:none;" -->
                <form class="form">
                    <h1 class="operation">EDITAR PRODUCTO</h1>
                        <input type="number" name="id" id="id_producto" disabled />
                    <div class="inputs">
                        <label for="user">Nombre de producto</label>
                        <input type="text" name="nombre_producto" id="nombre_producto" placeholder="Palas" required />
                    </div>
                    <div class="inputs">
                        <label for="password">Total Unidades</label>
                        <input type="text" name="cantidad_producto" id="cantidad_producto" placeholder="Ejemplo: 15" required />
                    </div>
                    <div class="inputs">
                        <label for="password">Precio Unidad ($)</label>
                        <input type="text" name="precio_producto" id="precio_producto" placeholder="Ejemplo: 15.50" required />
                    </div>
                    <div class="inputs">
                        <input type="submit" value="Actualizar" />
                    </div>
                </form>
            </section>
        </div>
    </main>

    <script src="../js/index.js" type="module"></script>
</body>

</html>