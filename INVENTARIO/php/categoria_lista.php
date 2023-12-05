<?php
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	if(isset($busqueda) && $busqueda!=""){

		$consulta_datos="SELECT * FROM categoria WHERE categoria_nombre LIKE '%$busqueda%' OR categoria_ubicacion LIKE '%$busqueda%' ORDER BY categoria_nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(categoria_id) FROM categoria WHERE categoria_nombre LIKE '%$busqueda%' OR categoria_ubicacion LIKE '%$busqueda%'";

	}else{

		$consulta_datos="SELECT * FROM categoria ORDER BY categoria_nombre ASC LIMIT $inicio,$registros";

		$consulta_total="SELECT COUNT(categoria_id) FROM categoria";
		
	}

	$conexion=conexion();

	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas =ceil($total/$registros);

	$tabla.='

	';

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		$tabla = '';
		$tabla .= '<div class="container_categoria">';
		foreach($datos as $rows){
			$tabla .='<div class="tarjeta_categoria">

					<p class="text_id">' . $rows['categoria_nombre'] . '</p>
					<p class="text_id">' . "Ubicacion " . substr($rows['categoria_ubicacion'], 0, 25) . '</p>
					
					
			<a href="index.php?vista=product_category&category_id=' . $rows['categoria_id'] . '" class="btn">Ver productos</a>
			<a href="index.php?vista=category_update&category_id_up=' . $rows['categoria_id'] . '" class="btn">Actualizar</a>

			<a href="' . $url . $pagina . '&category_id_del=' . $rows['categoria_id'] . '" class="btn">Eliminar</a></div>
			';

			
		
		}
		$tabla .= '</div>'
		;
	} else {
		if($total>=1){
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="5">
						<a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
							Haga clic acá para recargar el listado
						</a>
					</td>
				</tr>
			';
		}else{
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="5">
						No hay registros en el sistema
					</td>
				</tr>
			';
		}
	}


	$tabla.='</tbody></table></div>';

	if($total>0 && $pagina<=$Npaginas){
	}

	$conexion=null;
	echo $tabla;

	