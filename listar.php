<?php include("db.php"); ?>

<h2>Lista de envíos</h2>

<a href="crear.php">Nuevo envío</a><br><br>

<table border="1">
<tr>
    <th>ID</th>
    <th>Código</th>
    <th>Descripción</th>
    <th>Destino</th>
    <th>Acciones</th>
</tr>

<?php
$sql = "SELECT * FROM envios";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['codigo']}</td>
        <td>{$row['descripcion']}</td>
        <td>{$row['destino']}</td>
        <td>
            <a href='editar.php?id={$row['id']}'>Editar</a>
            <a href='eliminar.php?id={$row['id']}'>Eliminar</a>
        </td>
    </tr>";
}
?>
</table>