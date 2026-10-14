<?php
// 1. Incluimos tu archivo de conexión
include "db/conexion.php";

// 2. Recogemos el ID que viaja seguro por POST desde el formulario
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // 3. Preparamos la consulta SQL para borrar el coche usando PDO (estilo profesor)
    $sql = "DELETE FROM coches WHERE id = :id";
    $stmt = $conexion->prepare($sql);

    // 4. Ejecutamos la consulta asociando tu variable $id
    $stmt->execute(['id' => $id]);
}

// 5. Redirigimos al usuario de vuelta a la lista automáticamente
// NOTA: Si tu archivo principal no se llama index.php, cambia "index.php" por su nombre real (ej: lista.php)
header("Location: index.php");
exit;
?>