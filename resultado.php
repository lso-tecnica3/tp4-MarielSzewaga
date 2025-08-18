<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <title>Resultado Trivia</title>
</head>
<body>
<?php
if (isset($_GET['archivo'])) {
    $archivoNombre = $_GET['archivo'];
    $archivoRuta = "trivias/$archivoNombre";

    $archivoAbrir = fopen($archivoRuta, "r");

    if ($archivoAbrir) {
        $nombreTrivia = fgetcsv($archivoAbrir);
        print "<h2>Resultado de la Trivia: " . $nombreTrivia[0] . "</h2>";

        $numPregunta = 1;
        $correctas = 0;

        while ($lineaPregunta = fgetcsv($archivoAbrir)) {
            if (!$lineaPregunta) {
                break;
            }

            if (count($lineaPregunta) >= 5 && $lineaPregunta[0] != "") {
                $pregunta = $lineaPregunta[0];
                $correcta = $lineaPregunta[4];

                $nombre = "pregunta" . $numPregunta;
                if (isset($_GET[$nombre])) {
                    $respuestaUsuario = $_GET[$nombre];
                } else {
                    $respuestaUsuario = "";
                }

                print "<p><strong>Pregunta $numPregunta:</strong> $pregunta<br>";
                print "Tu respuesta: $respuestaUsuario<br>";
                print "Respuesta correcta: $correcta<br>";

                if ($respuestaUsuario == $correcta) {
                    print "<span style='color:green;'>Correcto</span>";
                    $correctas++;
                } else {
                    print "<span style='color:red;'>Incorrecto</span>";
                }
                print "</p><hr>";

                $numPregunta++;
            }
        }

        fclose($archivoAbrir);

        $totalPreguntas = $numPregunta - 1;
        print "<h3>Resultado final: Respondiste correctamente $correctas de $totalPreguntas preguntas.</h3>";
    } else {
        print "No se pudo abrir el archivo: $archivoRuta";
    }
}

else {
    print "No se especificó el archivo de la trivia.";
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>
