<?php
    $inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;
    $tabla = "";



    $conexion = conexion();

    // Llamada al procedimiento almacenado
// ... Tu código anterior ...

// Llamada al procedimiento almacenado
$query_procedimiento = "CALL stockbajo()";
$result_procedimiento = $conexion->query($query_procedimiento);

$tabla = '<div class="container_table">';
$tabla .= '<table class="table_users">
<thead>
            <tr>
                <th>ID Producto</th>
                <th>Nombre Producto</th>
                <th>Stock</th>
                </thead>
            </tr>';

// Recorremos los resultados del procedimiento almacenado y los mostramos en la tabla
while ($row = $result_procedimiento->fetch(PDO::FETCH_ASSOC)) {
    $tabla .= '<tr>';
    $tabla .= '<td>' . $row['producto_id'] . '</td>';
    $tabla .= '<td>' . $row['producto_nombre'] . '</td>';
    $tabla .= '<td>' . $row['producto_stock'] . '</td>';
    $tabla .= '</tr>';
}

$tabla .= '</table>';
$tabla .= '</div>';

// Cerramos el cursor de la consulta anterior
$result_procedimiento->closeCursor();

// Cerramos la conexión a la base de datos
$conexion = null;
echo $tabla;

// ... Resto de tu código ...