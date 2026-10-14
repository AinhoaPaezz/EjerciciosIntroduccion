
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario</title>
  </head>
  <body>
    <h1>Inicio de sesión</h1>
    <form method="POST">
    <label>Usuario:</label>
    <input type="text" name="usuario">
    <br>
    <br>
    <label>Contraseña:</label>
    <input type="password" name="clave">
    <br>
    <br>
    <button type="submit">Entrar</button>
  </form>
<?php
require "datos.php";
?>