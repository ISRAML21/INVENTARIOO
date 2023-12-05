<?php
$conexion = conexion(); // Establece tu conexión a la base de datos aquí

$consulta = "
    SELECT c.categoria_id, c.categoria_nombre, COUNT(p.producto_id) AS TotalProductos
    FROM categoria c
    LEFT JOIN producto p ON c.categoria_id = p.categoria_id
    GROUP BY c.categoria_id, c.categoria_nombre
    ORDER BY c.categoria_nombre ASC;
";

$resultado = $conexion->query($consulta);
$datos = $resultado->fetchAll();

$conexion = null; // Cierra la conexión a la base de datos

// Genera la tabla HTML con los resultados
echo '
<div class="container_table">
    <table class="table_users">
        <thead>
        <tr class="text_users">
                <th>Categoría ID</th>
                <th>Categoría Nombre</th>
                <th>Total de Productos</th>
            </tr>
        </thead>
        <tbody>
        </thead>
        <tbody>
        
        ';

foreach ($datos as $row) {
    echo '<tr>
            <td>' . $row['categoria_id'] . '</td>
            <td>' . $row['categoria_nombre'] . '</td>
            <td>' . $row['TotalProductos'] . '</td>
          </tr>';
}

echo '</tbody>
      </table>';
?>