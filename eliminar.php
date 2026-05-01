<?php
include("db.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id > 0) {
    $sql = "DELETE FROM envios WHERE id=$id";
    $conn->query($sql);
}

header("Location: listar.php");
exit;
?>