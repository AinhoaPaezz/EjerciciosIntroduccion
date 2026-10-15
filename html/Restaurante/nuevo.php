<?php
require_once "db/conexion.php";
require_once "funciones.php";

// 1. Cargamos los ingredientes para los checkboxes
$ingredientesDisponibles = obtenerIngredientes($conexion);
$errores = [];

$nombre = "";
$precio = "";
$tipo = "";
$ingredientesDisponibles = "";

// 2. Si se envía el formulario, guardamos en la base de datos
$_SERVER["REQUEST_METHOD"] == "POST";
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$tipo = $_POST["tipo"];
$ingredientesDisponibles = $_POST["ingredientes"] ?? []; // Array con los seleccionados


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Añadir plato</title>
</head>

<body>

    <h1>Añadir nuevo plato</h1>

    <form action="nuevo.php" method="POST">
        <label>Nombre del plato:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Precio:</label><br>
        <input type="number" name="precio" step="0.01" required><br><br>

        <label>Tipo de plato:</label><br>
        <select name="tipo" required>
            <option value="">Selecciona un tipo</option>
            <option value="primero">Primer plato</option>
            <option value="segundo">Segundo plato</option>
            <option value="postre">Postre</option>
        </select>
        <br><br>

        <h3>Ingredientes</h3>
        <?php foreach ($ingredientesDisponibles as $ing) { ?>
            <label>
                <input type="checkbox" name="ingredientes[]" value="<?php echo $ing; ?>">
                <?php echo $ing; ?>
            </label><br>
        <?php } ?>
        <br>

        <button type="submit">Guardar plato</button>
    </form>

    <br>
    <a href="index.php">Volver al listado</a>

</body>

</html>