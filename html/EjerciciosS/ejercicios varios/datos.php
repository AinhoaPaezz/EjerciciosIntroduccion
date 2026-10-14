<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

echo "<p>Usuario recibido: " . $usuario . "</p>";
echo "<p>Contraseña recibida correctamente.</p>";
}
?>
