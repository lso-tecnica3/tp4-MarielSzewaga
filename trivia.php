<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <title>Mostrar Trivia</title>
</head>
<body>
    <form method="get" action="resultado.php">


    <?php
        $archivoNombre = $_GET['archivo'];
        $archivoRuta = "trivias/$archivoNombre";

        $archivoAbrir = fopen($archivoRuta, "r");

        $nombreTrivia = fgetcsv($archivoAbrir);
        print "Trivia: " . $nombreTrivia[0] . "<br><br>";
        print "<input type ='hidden' name='archivo' value='$archivoNombre'> ";
        $numPregunta = 1;
        while ($lineaPregunta = fgetcsv($archivoAbrir)) {
            if (count($lineaPregunta) >= 5 && $lineaPregunta[0] != "") {
                print "Pregunta $numPregunta: " . $lineaPregunta[0] . "<br>";
                
                for ($i = 1; $i <= 3; $i++) {
                    $respuesta = $lineaPregunta[$i];
                    $idRadio = "preg" . $numPregunta . "_resp" . $i;
                    print '<input type="radio" id="' . $idRadio . '" name="pregunta' . $numPregunta . '" value="' . $respuesta . '" required>';
                    print '<label for="' . $idRadio . '">' . $respuesta . '</label><br>';
                }

                print "<hr>";
                $numPregunta++;
            }
        }

        fclose($archivoAbrir);
    ?>
    <button type="submit">Enviar respuestas</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>
