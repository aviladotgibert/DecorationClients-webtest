<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM clientes WHERE id = $id");
}

header("Location: index.php");
exit();