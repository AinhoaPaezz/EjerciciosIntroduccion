<?php
$usuarios = [
    "admin" => [
        "password" => "1234",
        "rol" => "Administrador",
        "color" => "#d9ead3"
    ],
    "maria" => [
        "password" => "abcd",
        "rol" => "Editor",
        "color" => "#fce5cd"
    ],
    "juan" => [
        "password" => "5678",
        "rol" => "Usuario",
        "color" => "#d9eaf7"
    ]
];
$logueado = false;
$error = "";
if (isset($_GET["logout"])) {
    $logueado = false;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"] ?? "";
    $password = $_POST["password"] ?? "";
    if (empty($usuario) || empty($password)) {
        $error = "Debes rellenar todos los campos.";
    } elseif (
        isset($usuarios[$usuario]) &&
        $usuarios[$usuario]["password"] === $password
    ) {
        $logueado = true;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de autenticación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
        }

        form {
            border: 1px solid #ccc;
            padding: 25px;
        }

        input {
            display: block;
            margin: 10px 0 20px;
            padding: 8px;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .tarjeta {
            padding: 30px;
            border-radius: 15px;
        }

        .cerrar {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php if (!$logueado): ?>
        <h1>Inicio de sesión</h1>
        <?php if ($error != ""): ?>
            <p class="error">
                <?php echo $error; ?>
            </p>
        <?php endif; ?>
        <form method="POST">
            <label>Usuario:</label>
            <input type="text" name="usuario">
            <label>Contraseña:</label>
            <input type="password" name="password"><button type="submit">
                Iniciar sesión
            </button>
        </form>
    <?php else: ?>
        <div class="tarjeta" style="background-color: <?php echo $usuarios[$usuario]["color"]; ?>">
            <h1>
                ¡Bienvenido, <?php echo strtoupper($usuario); ?>!
            </h1>
            <p>
                <strong>Rol:</strong>
                <?php echo $usuarios[$usuario]["rol"]; ?>
            </p>
            <a class="cerrar" href="?logout=1">
                Cerrar sesión
            </a>
        </div>
    <?php endif; ?>
</body>

</html>