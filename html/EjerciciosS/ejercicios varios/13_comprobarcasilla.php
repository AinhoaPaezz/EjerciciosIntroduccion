
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Comprobar campo</title>
</head>
<body>

  <h1>Formulario</h1>
  <form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre">
    <button type="submit">Enviar</button>
  </form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    if (empty($nombre)) {
        echo "<p>El campo está vacío.</p>";
    } else {
      echo "<p>Hola " . $nombre . "</p>";
    }
  }
?>
</body>
</html>