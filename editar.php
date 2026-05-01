<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar envío</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
<?php
include("db.php");

$id = intval($_GET['id']);

$sql = "SELECT * FROM envios WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<h2>Editar envío</h2>

<a href="index.html">Inicio</a> | <a href="listar.php">Ver envíos</a><br><br>

<form method="POST">
    Código: <input type="text" name="codigo" value="<?php echo $row['codigo']; ?>"><br>
    Descripción: <input type="text" name="descripcion" value="<?php echo $row['descripcion']; ?>"><br>
    Destino: <input type="text" name="destino" value="<?php echo $row['destino']; ?>"><br>
    <button type="submit">Actualizar</button>
</form>

<?php
if ($_POST) {
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $destino = $_POST['destino'];

    $sql = "UPDATE envios 
            SET codigo='$codigo', descripcion='$descripcion', destino='$destino'
            WHERE id=$id";

    $conn->query($sql);

    header("Location: listar.php");
}
?>
</div>
</body>
</html>