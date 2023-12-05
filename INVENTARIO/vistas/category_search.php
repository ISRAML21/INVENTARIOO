<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <title></title>
</head>

<body>


    <div class="container is-fluid mb-6">
        <h1 class="title">Categorías</h1>
        <h2 class="subtitle">Buscar categoría</h2>
    </div>

    <div class="container pb-6 pt-6">
        <?php
        require_once "./php/main.php";

        if(isset($_POST['modulo_buscador'])){
            require_once "./php/buscador.php";
        }

        if(!isset($_SESSION['busqueda_categoria']) && empty($_SESSION['busqueda_categoria'])){
    ?>
        <form action="" method="POST" autocomplete="off">
            <div class="form_search">
                <input type="hidden" name="modulo_buscador" value="categoria">
                <input class="input_search" type="text" name="txt_buscador" placeholder="¿Que categoria buscas?"
                    pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30">
                <div class="button_search">
                    <i class="fa fa-search" type="submit"></i>

                </div>
        </form>


        <?php }else{ ?>
        <div class="columns">
            <div class="column">
                <form action="" method="POST" autocomplete="off">
                    <input type="hidden" name="modulo_buscador" value="categoria">
                    <input type="hidden" name="eliminar_buscador" value="categoria">
                    <p>Estos son los resultados d tu busqueda:
                        <strong>“<?php echo $_SESSION['busqueda_categoria']; ?>”</strong>
                    </p>
                    <br>
                    <button type="submit" class="button_produc">Eliminar busqueda</button>
                </form>
            </div>
        </div>

        <?php
            # Eliminar categoria #
            if(isset($_GET['category_id_del'])){
                require_once "./php/categoria_eliminar.php";
            }

            if(!isset($_GET['page'])){
                $pagina=1;
            }else{
                $pagina=(int) $_GET['page'];
                if($pagina<=1){
                    $pagina=1;
                }
            }

            $pagina=limpiar_cadena($pagina);
            $url="index.php?vista=category_search&page="; /* <== */
            $registros=15;
            $busqueda=$_SESSION['busqueda_categoria']; /* <== */

            # Paginador categoria #
            require_once "./php/categoria_lista.php";
        } 
    ?>
    </div>

</body>

</html>