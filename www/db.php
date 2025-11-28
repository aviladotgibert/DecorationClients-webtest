<?php
$host = "db";
$user = "root";
$pass = "secret";
$name = "demo";

$conn = new mysqli($host, $user, $pass, $name);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>