<?php
include("db.php");

$id = $_GET['id'];

$sql = "DELETE FROM envios WHERE id=$id";
$conn->query($sql);

header("Location: listar.php");
?>