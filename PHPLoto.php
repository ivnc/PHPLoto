<html>
<head>
<meta charset="utf-8">
<title>Sorteos de Mi-loto</title>
</head>
<body>
<main><form method="post">
Número mínimo: <input type="text" name="min" value="1"><br>
Número máximo: <input type="text" name="max" value="99999">
<br>Contraseña de sorteo: <input type="password" name="pass"><br><hr>
<input type="submit" value="Siguiente"></form></main>
<?php
// Comprueba si el modo debug/en detalle está activado y si se envió el formulario, si no se envió, muestra instrucciones. Para activar debug, enviar vía get debug en True.
if(!$_GET['debug']) {
 $debug = "False";
}
else {
 $debug = $_GET['debug'];
}
if(!$_POST) {
 echo "<p>Pulse siguiente para continuar.</p>";
}
else {
 $min = $_POST['min'];
 $max = $_POST['max'];
 $pass = $_POST['pass'];
 $ignore_min_equals_max = "False";
 if($pass != "sorteandoando") {
  echo "<p>ERROR: Lo sentimos, contraseña no válida, inténtelo de nuevo. Code: 1</p>";
  die();
 }
 // Después de comprobar si la contraseña es correcta y establecer algunas variables, comprobamos si mínimo y máximo son iguales.
 if($min == $max && $ignore_min_equals_max == "False") {
  echo "<p>ERROR: ¡Atención! Los números mínimo y máximo son iguales. Esto hará entrar a PHP en un bucle, en parte. Code: 2.";
  if($debug == "True") {
   echo "\n<br>Info de desarrollo: Si de todos modos desea hacer que PHP ignore esta condición, ponga ignore_min_equals_max en True.";
  }
  echo "</p>";
  die();
 }
 if($debug == "True") {echo "<p>Modo a prueba de errores/en detalle (debug) activado. Info de desarrollo: para desactivarlo, establezca debug en False.</p>\n<p>Contraseña correcta, continuando...</p>\n";}
 // Generamos el número.
 $num = rand($min, $max);
 if($debug == "True") {echo "<p>Progreso: 1. Número ganador";}
 // El complementario.
 $comp = rand($min, $max);
 if($debug == "True") {echo ", 2. Complementario";}
 // Y la serie, asumiendo que solo tenemos dos, 0 y 1. Personalizar valores de aquí para añadir más series, teniendo en cuenta que, de acuerdo con la sintaxis de la función rand en PHP, el primer número es el mínimo y el segundo el máximo, componiendo un intervalo (mínimo,máximo).
 $serie = rand(0, 1);
 if($debug == "True") {echo ", 3. Serie.\n</p>";}
 if($debug == "True") {echo "<p>Calculando si el número ganador y el complementario son iguales...</p>\n";}
 $min_equals_max_counter = "0";
 // Pues eso, anunciamos que vamos a recalcular comp si es igual a num, definimos una variable para usarla después para terminar el while en caso de bucle, y vamos a ello.
 while($num == $comp && $min_equals_max_counter < 10) {
  if($min_equals_max_counter > 0 && $debug == "True") {
   echo " Comprobando nuevamente si los números son idénticos...</p>\n";
   // Aunque esté al principio del while, se usa en el final de la última línea que se pasa por pantalla.
  }
  if($min_equals_max_counter == 0) {echo "<p>El complementario original es igual al número ganador. Recalculando...</p>\n";}
  $comp = rand($min, $max);
  ++$min_equals_max_counter;
  if($debug == "True") {echo "<p>Recalculado por " . $min_equals_max_counter . "ª vez.";}
 }
 if($min_equals_max_counter == 10) {
  if($debug == "True") {echo "</p>";}
  echo "\n<p>ERROR: El número complementario es igual al ganador, debido a que el sistema ha llegado a su número máximo de re-cálculos. Code: 3</p>\n";
 }
 echo "<p>Proceso finalizado.<br>Estos son los datos resultantes de la consulta:<br><ul><li>Número ganador: " . $serie . "_" . $num . "</li>\n<li>Complementario: " . $comp . "</li>\n</ul>\n<br>Felicidades a los premiados.</p>";
}
?>
<p>Copyright (C) <?php echo date(y); ?> | Todos los derechos reservados / All rights resserved.</p>
<p>Este script PHP es software libre. Escrito originalmente por: <a href="mailto:info@inovegil.site40.net">Iván Novegil</a><br><a href="https://github.com/ivnc/PHPLoto">Repositorio de PHPLoto, en Github</a></p>
</body></html>