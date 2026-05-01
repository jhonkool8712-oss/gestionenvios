<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $conn->real_escape_string(trim($_POST['codigo'] ?? ''));
    $descripcion = $conn->real_escape_string(trim($_POST['descripcion'] ?? ''));
    $destino = $conn->real_escape_string(trim($_POST['destino'] ?? ''));

    $sql = "INSERT INTO envios (codigo, descripcion, destino)
            VALUES ('$codigo', '$descripcion', '$destino')";
    $conn->query($sql);

    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear envío</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">

<h2>Crear envío</h2>

<a href="index.html">Inicio</a> | <a href="listar.php">Ver envíos</a><br><br>

<form method="POST">
    Código: <input type="text" name="codigo" required><br>
    Descripción: <input type="text" name="descripcion" required><br>
    Destino: <input type="text" name="destino" required><br>
    <button type="submit">Guardar</button>
</form>
</div>
</body>
</html>