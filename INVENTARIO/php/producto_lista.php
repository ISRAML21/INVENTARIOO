<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	$campos="producto.producto_id,producto.producto_codigo,producto.producto_nombre,producto.producto_precio,producto.producto_stock,producto.producto_foto,producto.categoria_id,producto.usuario_id,categoria.categoria_id,categoria.categoria_nombre,usuario.usuario_id,usuario.usuario_nombre,usuario.usuario_apellido";

	if(isset($busqueda) && $busqueda!=""){

		$consulta_datos="SELECT $campos FROM producto INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id INNER JOIN usuario ON producto.usuario_id=usuario.usuario_id WHERE producto.producto_codigo LIKE '%$busqueda%' OR producto.producto_nombre LIKE '%$busqueda%' ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(producto_id) FROM producto WHERE producto_codigo LIKE '%$busqueda%' OR producto_nombre LIKE '%$busqueda%'";

	}elseif($categoria_id>0){

		$consulta_datos="SELECT $campos FROM producto INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id INNER JOIN usuario ON producto.usuario_id=usuario.usuario_id WHERE producto.categoria_id='$categoria_id' ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(producto_id) FROM producto WHERE categoria_id='$categoria_id'";

	}else{

		$consulta_datos="SELECT $campos FROM producto INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id INNER JOIN usuario ON producto.usuario_id=usuario.usuario_id ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(producto_id) FROM producto";

	}

	$conexion=conexion();

	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas =ceil($total/$registros);

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		$tabla .= '<div class="container_categoria">';
		
		foreach($datos as $rows){
			
			
			$tabla.='<div class="tarjeta_categoria">
			 
			
			<img class="img_product" src="./img/producto/'.$rows['producto_foto'].'">
			<p class="text_id">'. "Id: " . $rows['producto_codigo'] . '</p>
			<p class="text_id">'. "Nombre: " . substr($rows['producto_nombre'], 0, 25) . '</p>
			<p class="text_id">'. "Precio: $"  . substr($rows['producto_precio'], 0, 25) . '</p>
			<p class="text_id">'. "Stock: " . substr($rows['producto_stock'], 0, 25) . '</p>
			<p class="text_id">'. "Categoria: " . substr($rows['categoria_nombre'], 0, 25) . '</p>
			<p class="text_id">'. "Registrado por : " . substr($rows['usuario_nombre'], 0, 25) . '</p>
			
					
					<a class="btn" href="index.php?vista=product_img&product_id_up='.$rows['producto_id'].'" class="btn">Imagen</a>
					<a class="btn"href="index.php?vista=product_update&product_id_up='.$rows['producto_id'].'" class="btn">Actualizar</a>
					<a class="btn"href="'.$url.$pagina.'&product_id_del='.$rows['producto_id'].'" class="btn">Eliminar</a>';
					
					if(is_file("./img/producto/".$rows['producto_foto'])){
	
					}else{
						$tabla.='<img img_product src="./img/producto.png" width="120px" >';
					}
            $tabla.='


	</div>
			            <div class="container_buttons">
			            <div>
						

			        </div>
			    </article>
				</div>
			    
            ';
            $contador++;
		}

		
		$tabla .= '<a href="index.php?vista=product_stock" class="btn">Ver Productos con Bajo Stock</a>';
		$pag_final=$contador-1;
		$tabla .= '<a href="index.php?vista=product_for_category" class="btn">Cantidad de productos por categoria</a>';
		$pag_final=$contador-1;
	}else{
		if($total>=1){
			$tabla.='
				<p class="has-text-centered" >
					<a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
						Haga clic acá para recargar el listado
					</a>
				</p>
			';
		}else{
			$tabla.='
				<p class="has-text-centered" >No hay registros en el sistema</p>
			';
		}
	}

	if($total>0 && $pagina<=$Npaginas){
	}

	$conexion=null;
	echo $tabla;





	