<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shorcut icon" type="image/favicon" href="../images/logo.png" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>RGB_System</title>
</head>

<body >
    <header>
        <nav>
            <h1 class="logo"> <strong class="rgb">RGB</strong> System</h1>
            <div>
                <span class="user">Nelson Garcia</span>
                <a class="btn-1" hrf="#">Cerrar Sesión</a>
            </div>
        </nav>
    </header>

    <main>

        <div class="grid">
            <section>
                <h1 class="">INVENTARIO</h1>
                <nav>
                    <button class="btn-2">Eliminar</button>
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
                        <tr>
                            <td>1</td>
                            <td>1005</td>
                            <td>Cafe Listo</td>
                            <td>50</td>
                            <td>$4.05</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1005</td>
                            <td>Cafe Listo</td>
                            <td>50</td>
                            <td>$4.05</td>
                        </tr>

                    </tbody>
                </table>
            </section>
            <section>
                <form class="form">
                    <h1 class="operation">AGREGAR</h1>
                    <div class="inputs">
                        <label for="user">Nombre de producto</label>
                        <input type="text" name="user" placeholder="Cafe Listo" autofocus required />
                    </div>
                    <div class="inputs">
                        <label for="password">Precio c/d ($)</label>
                        <input type="password" name="password" placeholder="Ejemplo: 15.50" required />
                    </div>
                    <div class="inputs">
                        <label for="password">Cantidad</label>
                        <input type="password" name="text" placeholder="Ejemplo: 15" required />
                    </div>
                    <div class="inputs">
                        <input type="submit" value="Agregar" />
                    </div>
                </form>

                <form class="form">
                    <h1 class="operation">EDITAR</h1>
                    <div class="inputs">
                        <label for="user">Nombre de producto</label>
                        <input type="text" name="user" placeholder="Cafe Listo" required />
                    </div>
                    <div class="inputs">
                        <label for="password">Precio c/d ($)</label>
                        <input type="password" name="password" placeholder="Ejemplo: 15.50" required />
                    </div>
                    <div class="inputs">
                        <label for="password">Cantidad</label>
                        <input type="password" name="text" placeholder="Ejemplo: 15" required />
                    </div>
                    <div class="inputs">
                        <input type="submit" value="Actualizar" />
                    </div>
                </form>
            </section>
        </div>
    </main>
</body>

</html>