<?php
require "extra1.php";
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ticket de compra</title>
    <style>
        .error {
            color: #721c24;
            background-color: #f8d7da;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            margin-bottom: 15px;
            max-width: 400px;
        }

        .ticket {
            border: 2px dashed #333;
            padding: 20px;
            max-width: 300px;
            margin-top: 20px;
            background-color: #a7a4a4;
        }

        .ticket.socio {
            border-color: #28a745;
            background-color: #f4fbf6;
        }
    </style>
</head>

<body>

    <h1>Generador de Ticket</h1>
    <!-- Corregifo: Validamos con !empty para que funcione seguro y no lance "Notice" -->
    <?php if (!empty($error)): ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <label>Nombre del producto:</label>
        <br>
        <input type="text" name="producto" value="<?php echo isset($producto) ? $producto : ''; ?>">
        <br>
        <br>
        <label>Precio:</label>
        <br>
        <input type="number" name="precio" value="<?php echo isset($precio) ? $precio : ''; ?>">
        <br>
        <label>Cantidad:</label>
        <br>
        <input type="number" name="cantidad" value="<?php echo isset($cantidad) ? $cantidad : ''; ?>">
        <br>
        <label>
            <input type="checkbox" name="socio">
            Soy socio
        </label>
        <br>
        <br>
        <button type="submit">Calcular ticket</button>
    </form>

    <?php if ($resultado != null): ?>

        <div class="ticket <?php echo $esSocio ? 'socio' : 'no-socio'; ?>">

            <h2>Ticket de compra</h2>
            <p>
                <strong>Producto:</strong>
                <?php echo $producto; ?>
            </p>
            <p>
                <strong>Precio unitario:</strong>
                <?php echo number_format($precio, 2); ?> €
            </p>
            <p>
                <strong>Cantidad:</strong>
                <?php echo $cantidad; ?>
            </p>
            <hr>
            <p>
                <strong>Subtotal:</strong>
                <?php echo number_format($resultado["subtotal"], 2); ?> €
            </p>
            <p>
                <strong>Descuento:</strong>
                <?php echo number_format($resultado["descuento"], 2); ?> €
            </p>
            <p>
                <strong>IVA (21%):</strong>
                <?php echo number_format($resultado["iva"], 2); ?> €
            </p>
            <h2>
                Total:
                <?php echo number_format($resultado["total"], 2); ?> €
            </h2>
        </div>
    <?php endif; ?>
</body>

</html>