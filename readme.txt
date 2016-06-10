***Attention, english users: this is a project written fully in spanish.***

# PHPLoto #

Bienvenidos a PHPLoto. Éste es un simple script que cuenta con las siguientes funciones:
* Generación de tres números aleatorios entre unos límites definidos: número, serie y complementario.</li>
<li>Perxonalización completa, pudiendo definir de forma interactiva números mínimo y máximo y en el escript el número de series, además de poder añadir fácilmente campos para hacer esto último también de forma interactiva.
* Soporte para contraseña: solo el propietario y/o las personas autorizadas con una contraseña (por defecto: sorteandoando) podrán sortear.
* Comprobación si los números ganador y complementario son iguales. En caso negativo, se intenta regenerar el complementario hasta 10 veces (para activarlo, establezca ignore_min_equals_max en True). Si no se consigue, se muestra la advertencia pertinente al usuario.
* No se requieren módulos adicionales: la ejecución se apoya en funciones totalmente nativas de PHP, desde su versión 4.
Este script está pensado para loterías o juegos de azar similares, de forma que se puede sortear rápidamente y sin ninguna necesidad de bombos o tecnología adicional. 

## Primeros pasos ##

1º. Verifique que tiene instalado y actualice PHP. Si no tiene instalado PHP, en Ubuntu:
apt-get install php5
y para actualizar:
apt-get update php5
En otros sistemas, como CentOS, Fedora o Arch-Linux el sistema de gestión de paquetes instalados cambia su nombre, aunque el modo de instalación es similar.
2º. si desea descargar el archivo directamente en su servidor, es recomendable tener git. Si no, puede subirlo vía FTP, SCP o wget si lo tiene en otro servidor accesible desde internet. En Ubuntu, para instalar git, ejecute:
apt-get install git
Una vez tenga git (debería valer para cualquier sistema operativo basado en Linux, incluído OSX):
git clone https://github.com/ivnc/PHPLoto && cp PHPLoto/PHPLoto.php /var/www/html && mv /var/www/html/PHPLoto.php /var/www/html/MiLoto.php
Nota: cambie /var/www/html por el directorio raíz de Apache, puede encontrarlo en /etc/apache2/sites-enabled/misitio.conf (misitio puede ser otro nombre, como 000_default) en DocumentRoot. Cambie también MiLoto.php al final de la secuencia de comandos por el nombre de su lotería o servicio.
3º. Se recomienda ver el código antes de ponerlo en producción, ya que hay cosas que pueden ser personalizadas. Estas son algunas recomendaciones:
* En title, al principio de la página, recomendable cambiar MiLoto por el nombre de su lotería o servicio.
* En:
if($pass != "sorteandoando")
cambie sorteandoando (no retire las comillas) por la contraseña que desea utilizar para acceder a los sorteos. Para no hacer uso de la contraseña, retire del script esa y las tres líneas inmediatamente inferiores, ahsta:
die();
}
éstas incluídas.
* En:
$serie = rand(0, 1);
es recomendable ajustar 0 y 1 de forma que representen, respectivamente, los extremos mínimo y máximo del intervalo de series. Por ejemplo, si tiene series de la 1 a la 10, ambas incluídas, substituya 0 por 1 y 1 por 10. Sin embargo, en este mismo caso, si el 1 y el 10 no están incluídos, substituya 0 por 2 y 1 por 9.
* En el Copyright recmendable substituír por el nombre de su lotería, servicio, empresa o marca MiLoto, o simplemente retirar esa línea. Para la extensión de este script, se pide a todos los usuarios no retiren los créditos inferiores sobre sel script, que incluyen referencias al desarrollador original y el enlace al repositorio público de GitHub.

## Uso ##

En su primer uso, es recomendable acceder al script enviando el campo debug por el método get en True. Por ejemplo, si la URL al archivo php es http://example.com/ruta/al/archivo.php, se recomeinda acceer a http://example.com/ruta/al/archivo.php?debug=True
* Introduzca los valroes entre los que estarán sus números ganador y complementario o deje los que están por defecto (1 y 99999, puede cambiar esto en las respectivas etiquetas input, en value). Luego introduzca la contraseña (véase primeros pasos, 3.2).
* Si ejecutó el archivo en modo debug, debería serle notificado que éste está activo e indicársele convenientemente todos los pasos por los que el proceso ha ido pasando hasta llegar al número final.

## Han contribuido con PHPLoto ##

* Iván Novegil (desarrollador principal) <info@inovegil.site40.net>

---
Siéntase libre de realizar alguna pull request ante errores o mejoras realizadas en el código que crea conveniente compartir con la comunidad.
---
Licenciado bajo GNU-General Public License. Copia y distribución regida por sus términos.