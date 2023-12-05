<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>


    <div class="header-container">

        <div class="cabecera_img">
            <img src="img/logo_prin.png" width="50px">
        </div>



        <div class="navbar-menu">
            <div class="navbar-item has-dropdown">
                <a class="button_navbar">Productos</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=product_new" class="navbar-item">Nuevo</a>
                    <a href="index.php?vista=product_list" class="navbar-item">Lista</a>
                    <a href="index.php?vista=product_category" class="navbar-item">Por categoría</a>
                    <a href="index.php?vista=product_search" class="navbar-item">Buscar</a>
                </div>
            </div>


            <div class="navbar-item has-dropdown">
                <a class="button_navbar">Categorías</a>

                <div class="navbar-dropdown">
                    <a href="index.php?vista=category_new" class="navbar-item">Nueva</a>
                    <a href="index.php?vista=category_list" class="navbar-item">Lista</a>
                    <a href="index.php?vista=category_search" class="navbar-item">Buscar</a>
                </div>
            </div>

            <div class="navbar-item has-dropdown">
                <a class="button_navbar">Usuarios</a>

                <div class="navbar-dropdown">
                    <?php
        // Supongamos que tienes la información del rol actual del usuario en $id_rol
        $_SESSION['rol'] == 1; // Esto es solo un ejemplo, debes obtener el valor real del rol del usuario

        // Verificar si el id_rol es diferente de 2 (no es administrador)
        if ($_SESSION['rol'] == 1) {
            echo '<a href="index.php?vista=user_new" class="navbar-item">Nuevo</a>';
            echo '<a href="index.php?vista=user_list" class="navbar-item">Lista</a>';
            echo '<a href="index.php?vista=user_search" class="navbar-item">Buscar</a>';
        }
        ?>
                </div>

            </div>
        </div>

        <div class="navbar-end">
            <div class="button_cuenta">
                <a href="index.php?vista=logout" class="button"> <img src="./img/exit.png" width="10px"><i
                        class="ri-24-hours-fill"></i></a>
                <a href="index.php?vista=user_update&user_id_up=<?php echo $_SESSION['id']; ?>" class="button">
                    <?php echo $_SESSION['nombre']; ?>
                </a>


            </div>
        </div>


    </div>

</body>

</html>