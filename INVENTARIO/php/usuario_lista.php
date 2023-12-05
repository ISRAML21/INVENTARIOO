<?php
$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
$tabla="";

if(isset($busqueda) && $busqueda!=""){

    $consulta_datos="SELECT * FROM usuario WHERE ((usuario_id!='".$_SESSION['id']."') AND (usuario_nombre LIKE '%$busqueda%' OR usuario_apellido LIKE '%$busqueda%' OR usuario_usuario LIKE '%$busqueda%' OR usuario_email LIKE '%$busqueda%')) ORDER BY usuario_nombre ASC LIMIT $inicio,$registros";

    $consulta_total="SELECT COUNT(usuario_id) FROM usuario WHERE ((usuario_id!='".$_SESSION['id']."') AND (usuario_nombre LIKE '%$busqueda%' OR usuario_apellido LIKE '%$busqueda%' OR usuario_usuario LIKE '%$busqueda%' OR usuario_email LIKE '%$busqueda%'))";

}else{

    $consulta_datos="SELECT * FROM usuario WHERE usuario_id!='".$_SESSION['id']."' ORDER BY usuario_nombre ASC LIMIT $inicio,$registros";

    $consulta_total="SELECT COUNT(usuario_id) FROM usuario WHERE usuario_id!='".$_SESSION['id']."'";
    
}

$conexion=conexion();
$datos = $conexion->query($consulta_datos);
$datos = $datos->fetchAll();

$total = $conexion->query($consulta_total);
$total = (int) $total->fetchColumn();

$Npaginas =ceil($total/$registros);

$tabla.='



<div class="container_table">
    <table class="table_users">
        <thead>
            <tr class="text_users">
                <th class="text_users">#</th>
                <th class="text_users">Nombre</th>
                <th class="text_users">Apellidos</th>
                <th class="text_users">Usuario</th>
                <th class="text_users">Email</th>
                <th class="text_users">Rol</th>
                <th class="text_users">Opciones</th>
            </tr>
        </thead>
        <tbody>
';

if($total>=1 && $pagina<=$Npaginas){
    $contador=$inicio+1;
    $pag_inicio=$inicio+1;
    foreach($datos as $rows){
        $tabla.='
            <tr>
                <td>'.$contador.'</td>
                <td>'.$rows['usuario_nombre'].'</td>
                <td>'.$rows['usuario_apellido'].'</td>
                <td>'.$rows['usuario_usuario'].'</td>
                <td>'.$rows['usuario_email'].'</td>
                <td>'.$rows['id_rol'].'</td>
                <td>
                <div class="button_users">
                    <a href="index.php?vista=user_update&user_id_up='.$rows['usuario_id'].'" class="button_update" >
                    <img src="./img/update.png" width="30px">
                    </a>
                
                    <a href="'.$url.$pagina.'&user_id_del='.$rows['usuario_id'].'" class="button_delete">
                    <img  src="./img/delete.png" width="30px">
                    </a>
                    </div>
                </td>
            </tr>
        ';
        
        // Código para eliminar el usuario y activar el disparador
		if (isset($_GET['user_id_del'])) {
			$user_id_del = $_GET['user_id_del'];
		
			// Consulta para eliminar al usuario
			$sql_delete = "DELETE FROM usuario WHERE usuario_id = :user_id_del";
			
			try {
				$stmt = $conexion->prepare($sql_delete);
				$stmt->bindParam(':user_id_del', $user_id_del, PDO::PARAM_INT);
				$stmt->execute();
				echo "Usuario eliminado correctamente.";
			} catch (PDOException $e) {
				echo "Error al eliminar usuario: " . $e->getMessage();
			}
		}
		

        $contador++;
    }
    $pag_final=$contador-1;
}else{
    if($total>=1){
        $tabla.='
            <tr class="has-text-centered" >
                <td colspan="7">
                    <a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
                        Haga clic acá para recargar el listado
                    </a>
                </td>
            </tr>
        ';
    }else{
        $tabla.='
            <tr class="has-text-centered" >
                <td colspan="7">
                    No hay registros en el sistema
                </td>
            </tr>
        ';

		
    }
}

$tabla.='</tbody></table>


</div>';
$tabla.='</tbody></table>
</div>';

// Agregar el botón de "Usuarios Eliminados"
$tabla .= '
<div class="container_button">
    <a href="index.php?vista=user_delete" class="button_produc">
        Usuarios Eliminados
    </a>
</div>';



if($total>0 && $pagina<=$Npaginas){
}


$conexion=null;	
echo $tabla;