<?php
$host = "jhonatan1_gestión_usuarios";
$user = "jhonatan1";
$password = "clase123";
$db = "gestion_envios";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>