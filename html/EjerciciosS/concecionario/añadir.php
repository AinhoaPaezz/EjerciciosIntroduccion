<?php
// 1. Incluimos tu conexión PDO
include "db/conexion.php";

// Guardamos tus variables. Ojo: recogemos "año" con Ñ porque así viene del formulario HTML
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$precio = $_POST["precio"];
$año = $_POST["año"];

// 2. Preparamos la consulta incluyendo obligatoriamente kilometraje y combustible con marcadores
$sql = "INSERT INTO coches (marca, modelo, precio, anyo) 
        VALUES (:marca, :modelo, :precio, :anyo)";
$stmt = $conexion->prepare($sql);

// 3. Ejecutamos pasando tus datos, y rellenamos el resto con valores por defecto (0 y texto vacío)
if (
    $stmt->execute([
        'marca' => $marca,
        'modelo' => $modelo,
        'precio' => $precio,
        'anyo' => $año,          // Mapea la variable $año al marcador :anyo de la BD

    ])
) {
    // Si funciona, redirige
    header("Location: index.php");
    exit();
} else {
    echo "Error al añadir el coche.";
}
?>