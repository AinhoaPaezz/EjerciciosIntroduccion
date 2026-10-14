<?php
$preguntasDB = [
    [
        "pregunta" => "¿De que color es el cielo?",
        "opciones" => [
            "Verde",
            "Azul",
            "Naranja"
        ],
        "correcta" => 1
    ],
    [
        "pregunta" => "¿Cual es la estrella mas cerca de la tierra?",
        "opciones" => [
            "Sol",
            "Estrella polar",
            "Estrella fugaz"
        ],
        "correcta" => 0
    ],
    [
        "pregunta" => "¿Cuanto frio hace?",
        "opciones" => [
            "Poco",
            "Mucho",
            "No demasiado"
        ],
        "correcta" => 1
    ]
];
$resultado = null;
$error = "";
function evaluarTest($respuestasUsuario, $preguntasDB)
{
    $aciertos = 0;
    $resultados = [];
    foreach ($preguntasDB as $indice => $pregunta) {
        $respuestaUsuario = $respuestasUsuario[$indice];
        $esCorrecta =
            $respuestaUsuario == $pregunta["correcta"];
        if ($esCorrecta) {
            $aciertos++;
        }
        $resultados[] = [
            "pregunta" => $pregunta["pregunta"],
            "respuesta" =>
                $pregunta["opciones"][$respuestaUsuario],
            "correcta" => $esCorrecta
        ];
    }
    return [
        "aciertos" => $aciertos,
        "resultados" => $resultados
    ];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $respuestas = $_POST["respuesta"] ?? [];
    if (count($respuestas) != count($preguntasDB)) {
        $error = "Debes responder todas las preguntas.";
    } else {
        $resultado =
            evaluarTest($respuestas, $preguntasDB);
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cuestionario PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 40px auto;
        }

        .pregunta {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .correcto {
            color: green;
            font-weight: bold;
        }

        .incorrecto {
            color: red;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }
    </style>
</head>

<body>
    <?php if ($resultado == null): ?>
        <h1>Cuestionario de PHP</h1>
        <?php if ($error != ""): ?>
            <p class="error">
                <?php echo $error; ?>
            </p>
        <?php endif; ?>
        <form method="POST">
            <?php foreach ($preguntasDB as $indice => $pregunta): ?>
                <div class="pregunta">
                    <h3>
                        <?php echo ($indice + 1) . ". " . $pregunta["pregunta"]; ?>
                    </h3>
                    <?php foreach ($pregunta["opciones"] as $indiceOpcion => $opcion): ?>
                        <label><input type="radio" name="respuesta[<?php echo $indice; ?>]" value="<?php echo $indiceOpcion; ?>">
                            <?php echo $opcion; ?>
                        </label>
                        <br>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <button type="submit">
                Enviar respuestas
            </button>
        </form>
    <?php else: ?>
        <h1>Resultado del test</h1>
        <h2>
            Has conseguido
            <?php echo $resultado["aciertos"]; ?>
            de
            <?php echo count($preguntasDB); ?>
        </h2>
        <table>
            <thead>
                <tr>
                    <th>Pregunta</th>
                    <th>Tu respuesta</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado["resultados"] as $resultadoPregunta): ?>
                    <tr>
                        <td>
                            <?php echo $resultadoPregunta["pregunta"]; ?>
                        </td>
                        <td>
                            <?php echo $resultadoPregunta["respuesta"]; ?>
                        </td>
                        <td>
                            <?php if ($resultadoPregunta["correcta"]): ?>
                                <span class="correcto">
                                    Correcto
                                </span>
                            <?php else: ?>
                                <span class="incorrecto">
                                    Incorrecto
                                </span>
                            <?php endif; ?>
                        </td>
                    </tr><?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>

</html>