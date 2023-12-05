<div class="container is-fluid mb-6">
    <h2 class="subtitle">Prductos con bajo stock</h2>

</div>
<?php
        require_once "./php/main.php";

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
        $url="index.php?vista=product__for_category&page="; /* <== */
        $registros=15;
        $busqueda="";

        # Paginador producto #
        require_once "./php/producto_categoria.php";
    ?>

</div>
</div>