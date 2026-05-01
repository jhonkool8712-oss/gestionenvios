<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear envío</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
<?php include("db.php"); ?>

<h2>Crear envío</h2>

<a href="index.html">Inicio</a> | <a href="listar.php">Ver envíos</a><br><br>

<form method="POST">
    Código: <input type="text" name="codigo"><br>
    Descripción: <input type="text" name="descripcion"><br>
    Destino: <input type="text" name="destino"><br>
    <button type="submit">Guardar</button>
</form>

<?php
if ($_POST) {
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $destino = $_POST['destino'];

    $sql = "INSERT INTO envios (codigo, descripcion, destino)
            VALUES ('$codigo', '$descripcion', '$destino')";

    $conn->query($sql);

    header("Location: listar.php");
}
?>
</div>
</body>
</html>