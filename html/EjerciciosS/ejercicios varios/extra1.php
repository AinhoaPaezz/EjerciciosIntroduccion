<?php
$error = "";
$resultado = null;

function calcularTotal($precio, $cantidad, $esSocio) {

    $subtotal = $precio * $cantidad;
    if ($esSocio) {
        $descuento = $subtotal * 0.10;
    } else {
        $descuento = 0;
    }
    $base = $subtotal - $descuento;
    $iva = $base * 0.21;
    $total = $base + $iva;
    return [
        "subtotal" => $subtotal,
        "descuento" => $descuento,
        "iva" => $iva,
        "total" => $total
    ];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto = $_POST["producto"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];

    $esSocio = isset($_POST["socio"]);

    if (empty($producto)) {
        $error = "El nombre del producto no puede estar vacío.";
    } if (!is_numeric($precio) || $precio <= 0) {
        $error = "El precio debe ser un número mayor que 0.";
    } if (!is_numeric($cantidad) || $cantidad <= 0) {
        $error = "La cantidad debe ser un número mayor que 0.";
    } if (empty($errores)) {

        $resultado = calcularTotal(
        $precio,
        $cantidad,
        $esSocio
        );
    }
}
?>
