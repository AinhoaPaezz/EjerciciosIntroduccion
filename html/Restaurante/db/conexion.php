<?php

$servidor = "dwesphp.cffwimlnuujf.us-east-1.rds.amazonaws.com";
$base_datos = "restaurante";
$usuario = "admin";
$password = "dwes2026";
$port = "3306";

$dsn = "mysql:host=$servidor;port=$port;dbname=$base_datos;charset=utf8mb4";
$opciones_ssl = [
    PDO::MYSQL_ATTR_SSL_CA => '../cert/global-bundle.pem',
    // Desactivamos temporalmente la verificación estricta del nombre del host para asegurar que conecte
    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
];

$conexion = null;
$conexion = new PDO($dsn, $usuario, $password, $opciones_ssl);