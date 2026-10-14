<?php
include "db/conexion.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conexion->prepare("SELECT * FROM coches WHERE id = ?");
    $stmt->execute([$id]);
    $coche = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$coche) {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <h1>EDITAR COCHES</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $coche["id"]; ?>">

        <label>MARCA:</label>
        <input type="text" name="marca" value="<?php echo $coche["marca"]; ?>">
        <label>MODELO:</label>
        <input type="text" name="modelo" value="<?php echo $coche["modelo"]; ?>">
        <label>PRECIO:</label>
        <input type="text" name="precio" value="<?php echo $coche["precio"]; ?>">
        <label>AÑO:</label>
        <input type="text" name="año" value="<?php echo $coche["año"]; ?>">

        <button type="submit">Guardar cambios</button>
    </form>

    <a href="index.php">VOLVER</a>
</body>

</html>