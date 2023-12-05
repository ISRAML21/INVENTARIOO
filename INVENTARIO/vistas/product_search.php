<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<div class="container is-fluid mb-6">
    <h1 class="title">Productos</h1>
    <h2 class="subtitle">Buscar producto</h2>
</div>

<div class="container pb-6 pt-6">
    <?php
        require_once "./php/main.php";

        if(isset($_POST['modulo_buscador'])){
            require_once "./php/buscador.php";
        }

        if(!isset($_SESSION['busqueda_producto']) && empty($_SESSION['busqueda_producto'])){
    ?>
    <form action="" method="POST" autocomplete="off">
        <div class="form_search">
            <input type="hidden" name="modulo_buscador" value="producto">
            <input class="input_search" type="text" name="txt_buscador" placeholder="¿Qué producto buscas?"
                pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" maxlength="30">
            <div class="button_search">
                <i class="fa fa-search" type="submit"></i>
            </div>
    </form>







    <?php }else{ ?>
    <div class="columns">
        <div class="column">
            <form class="has-text-centered mt-6 mb-6" action="" method="POST" autocomplete="off">
                <input type="hidden" name="modulo_buscador" value="producto">
                <input type="hidden" name="eliminar_buscador" value="producto">
                <p>Estas buscando <strong>“<?php echo $_SESSION['busqueda_producto']; ?>”</strong></p>
                <br>
                <button type="submit" class="button is-danger is-rounded">Eliminar busqueda</button>
            </form>
        </div>
    </div>
    <?php
            # Eliminar producto #
            if(isset($_GET['product_id_del'])){
                require_once "./php/producto_eliminar.php";
            }

            if(!isset($_GET['page'])){
                $pagina=1;
            }else{
                $pagina=(int) $_GET['page'];
                if($pagina<=1){
                    $pagina=1;
                }
            }

            $categoria_id = (isset($_GET['category_id'])) ? $_GET['category_id'] : 0;

            $pagina=limpiar_cadena($pagina);
            $url="index.php?vista=product_search&page="; /* <== */
            $registros=15;
            $busqueda=$_SESSION['busqueda_producto']; /* <== */

            # Paginador producto #
            require_once "./php/producto_lista.php";
        } 
    ?>
</div>