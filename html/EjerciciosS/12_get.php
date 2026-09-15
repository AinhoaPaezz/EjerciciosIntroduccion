<?php
$nombre = $_GET["nombre"];
//Cuando un usuario envía datos mediante una URL (por ejemplo: ://tusitio.com), PHP almacena esos valores de forma automática en el array 
$nombre = $_GET["nombre"];
print_r($_GET);

echo "Hola " . $nombre;
?>