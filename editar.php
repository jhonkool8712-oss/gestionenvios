<?php
include("db.php");

$id = $_GET['id'];

$sql = "SELECT * FROM envios WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<h2>Editar envío</h2>

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