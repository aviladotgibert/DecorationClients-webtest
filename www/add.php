<?php
include 'db.php';

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email  = $conn->real_escape_string($_POST['email']);

    if (!empty($nombre)) {
        $conn->query("INSERT INTO clientes (nombre, email) VALUES ('$nombre', '$email')");
        header("Location: index.php");
        exit();
    } else {
        $msg = "El nombre es obligatorio.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Cliente — DecoNatural</title>
    <style>
        <?php include 'style.css'; ?>
    </style>
</head>
<body>

<div class="container">

<h1>+ Añadir Cliente</h1>

<?php if ($msg): ?>
    <p style="color:red; text-align:center;"><?= $msg ?></p>
<?php endif; ?>

<form method="POST">
    <label>Nombre</label><br>
    <input type="text" name="nombre" required><br>

    <label>Email</label><br>
    <input type="email" name="email"><br>

    <button type="submit">Guardar</button>
</form>

<p style="text-align:center;">
    <a class="button" href="index.php">⬅ Volver</a>
</p>

</div>
</body>
</html>
