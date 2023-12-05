<?php
$tabla="";

if(isset($busqueda) && $busqueda!=""){
    $consulta_datos="SELECT * FROM usuario WHERE ((usuario_id!='".$_SESSION['id']."') AND (usuario_nombre LIKE '%$busqueda%' OR usuario_apellido LIKE '%$busqueda%' OR usuario_usuario LIKE '%$busqueda%' OR usuario_email LIKE '%$busqueda%')) ORDER BY usuario_nombre ASC LIMIT $inicio,$registros";

    $consulta_total="SELECT COUNT(usuario_id) FROM usuario WHERE ((usuario_id!='".$_SESSION['id']."') AND (usuario_nombre LIKE '%$busqueda%' OR usuario_apellido LIKE '%$busqueda%' OR usuario_usuario LIKE '%$busqueda%' OR usuario_email LIKE '%$busqueda%'))";
} else {
    $consulta_total="SELECT COUNT(usuario_id) FROM usuario WHERE usuario_id!='".$_SESSION['id']."'";
}

$consulta_usuarios_eliminados = "SELECT * FROM antiguos";
$conexion = conexion();

$usuarios_eliminados = $conexion->query($consulta_usuarios_eliminados);
$usuarios_eliminados = $usuarios_eliminados->fetchAll();

$conexion = null;

$tabla .= '
<div class="container_delete">
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
                </tr>
            </thead>
            <tbody>
';

$contador = 1;
foreach ($usuarios_eliminados as $usuario_eliminado) {
    $tabla .= '
        <tr>
            <td>'.$contador.'</td>
            <td>'.$usuario_eliminado['usuario_nombre'].'</td>
            <td>'.$usuario_eliminado['usuario_apellido'].'</td>
            <td>'.$usuario_eliminado['usuario_usuario'].'</td>
            <td>'.$usuario_eliminado['usuario_email'].'</td>
            <td>'.$usuario_eliminado['id_rol'].'</td>
        </tr>
    ';
    $contador++;
}

$tabla .= '
            </tbody>
        </table>
    </div>
</div>';

echo $tabla;
?>