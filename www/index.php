<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes — DecoNatural</title>
    <style>
        <?php include 'style.css'; ?>
    </style>
</head>
<body>

<div class="container">

<h1>DecoNatural · Clientes</h1>
<p style="text-align:center;">
    <a class="button" href="add.php">➕ Añadir cliente</a>
</p>

<?php
$conn->query("CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(120)
)");

$result = $conn->query("SELECT * FROM clientes ORDER BY id DESC");

if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acción</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['nombre']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td>
                    <a class="delete" href="delete.php?id=<?= $row['id'] ?>"
                       onclick="return confirm('¿Eliminar este cliente?')">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p style="text-align:center; color:#4a5a3c;">No hay clientes registrados aún.</p>
<?php endif; ?>

</div>

</body>
</html>
