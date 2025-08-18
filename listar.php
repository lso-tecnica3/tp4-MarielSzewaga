<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" 
          crossorigin="anonymous">
    <title>Trivia cargada</title>
</head>
<body>
    <div class="container text-center">

<?php

$nombre = $_GET["nombre"];

$archivo = fopen("trivias/$nombre.csv", "w");

$datos = [$nombre];
fputcsv($archivo, $datos);

$preguntar = $_GET["preg"];
$res1 = $_GET["res1"];
$res2 = $_GET["res2"];
$res3 = $_GET["res3"];
$correcta = $_GET["correcta"];
$datos = [$preguntar, $res1, $res2, $res3, $correcta];
fputcsv($archivo, $datos);

$preguntar = $_GET["preg2"];
$res1 = $_GET["resp1"];
$res2 = $_GET["resp2"];
$res3 = $_GET["resp3"];
$correcta = $_GET["correcta2"];
$datos = [$preguntar, $res1, $res2, $res3, $correcta];
fputcsv($archivo, $datos);

$preguntar = $_GET["preg3"];
$res1 = $_GET["respu1"];
$res2 = $_GET["respu2"];
$res3 = $_GET["respu3"];
$correcta = $_GET["correcta3"];
$datos = [$preguntar, $res1, $res2, $res3, $correcta];
fputcsv($archivo, $datos);

$preguntar = $_GET["preg4"];
$res1 = $_GET["respues1"];
$res2 = $_GET["respues2"];
$res3 = $_GET["respues3"];
$correcta = $_GET["correcta4"];
$datos = [$preguntar, $res1, $res2, $res3, $correcta];
fputcsv($archivo, $datos);

$preguntar = $_GET["preg5"];
$res1 = $_GET["respuesta1"];
$res2 = $_GET["respuesta2"];
$res3 = $_GET["respuesta3"];
$correcta = $_GET["correcta5"];
$datos = [$preguntar, $res1, $res2, $res3, $correcta];
fputcsv($archivo, $datos);

fclose($archivo);

echo "<h1>Trivia ya cargada</h1>";

$archivos = scandir("trivias");
echo "<h2>Trivias disponibles:</h2>";

for ($f = 2; $f < count($archivos); $f++) {
    $archivo = $archivos[$f];
    $tamañoArchivo = strlen($archivo);
    print "<a href='trivia.php?archivo=" . $archivo . "'>Link a la trivia " . $archivo . "</a><br>";
 
}
?>

    </div>
</body>
</html>
