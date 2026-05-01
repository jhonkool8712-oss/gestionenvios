<?php
include("db.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    header("Location: listar.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $conn->real_escape_string(trim($_POST['codigo'] ?? ''));
    $descripcion = $conn->real_escape_string(trim($_POST['descripcion'] ?? ''));
    $destino = $conn->real_escape_string(trim($_POST['destino'] ?? ''));

    $sql = "UPDATE envios 
            SET codigo='$codigo', descripcion='$descripcion', destino='$destino'
            WHERE id=$id";
    $conn->query($sql);

    header("Location: listar.php");
    exit;
}

$sql = "SELECT * FROM envios WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if (!$row) {
    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar envío</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">

<h2>Editar envío</h2>

<a href="index.html">Inicio</a> | <a href="listar.php">Ver envíos</a><br><br>

<form method="POST">
    Código: <input type="text" name="codigo" value="<?php echo htmlspecialchars($row['codigo']); ?>" required><br>
    Descripción: <input type="text" name="descripcion" value="<?php echo htmlspecialchars($row['descripcion']); ?>" required><br>
    Destino: <input type="text" name="destino" value="<?php echo htmlspecialchars($row['destino']); ?>" required><br>
    <button type="submit">Actualizar</button>
</form>
</div>
</body>
</html>