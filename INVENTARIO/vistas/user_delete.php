<div class="container is-fluid mb-6">
    <h2 class="subtitle">Lista de usuarios eliminados</h2>
</div>

<div class="container pb-6 pt-6">
    <?php
        require_once "./php/main.php";

        # Eliminar usuario #
        if(isset($_GET['user_id_del'])){
            require_once "./php/usuario_eliminar.php";
        }

        if(!isset($_GET['page'])){
            $pagina=1;
        }else{
            $pagina=(int) $_GET['page'];

        }

        $pagina=limpiar_cadena($pagina);
        $url="index.php?vista=user_delete&page=";
        $registros=15;
        $busqueda="";

        # Paginador usuario #
        require_once "./php/usuario_eliminado.php";
    ?>
</div>