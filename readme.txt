***Attention, english users: this is a project written fully in spanish.***

# PHPLoto #

Bienvenidos a PHPLoto. �ste es un simple script que cuenta con las siguientes funciones:
* Generaci�n de tres n�meros aleatorios entre unos l�mites definidos: n�mero, serie y complementario.</li>
<li>Perxonalizaci�n completa, pudiendo definir de forma interactiva n�meros m�nimo y m�ximo y en el escript el n�mero de series, adem�s de poder a�adir f�cilmente campos para hacer esto �ltimo tambi�n de forma interactiva.
* Soporte para contrase�a: solo el propietario y/o las personas autorizadas con una contrase�a (por defecto: sorteandoando) podr�n sortear.
* Comprobaci�n si los n�meros ganador y complementario son iguales. En caso negativo, se intenta regenerar el complementario hasta 10 veces (para activarlo, establezca ignore_min_equals_max en True). Si no se consigue, se muestra la advertencia pertinente al usuario.
* No se requieren m�dulos adicionales: la ejecuci�n se apoya en funciones totalmente nativas de PHP, desde su versi�n 4.
Este script est� pensado para loter�as o juegos de azar similares, de forma que se puede sortear r�pidamente y sin ninguna necesidad de bombos o tecnolog�a adicional. 

## Primeros pasos ##

1�. Verifique que tiene instalado y actualice PHP. Si no tiene instalado PHP, en Ubuntu:
apt-get install php5
y para actualizar:
apt-get update php5
En otros sistemas, como CentOS, Fedora o Arch-Linux el sistema de gesti�n de paquetes instalados cambia su nombre, aunque el modo de instalaci�n es similar.
2�. si desea descargar el archivo directamente en su servidor, es recomendable tener git. Si no, puede subirlo v�a FTP, SCP o wget si lo tiene en otro servidor accesible desde internet. En Ubuntu, para instalar git, ejecute:
apt-get install git
Una vez tenga git (deber�a valer para cualquier sistema operativo basado en Linux, inclu�do OSX):
git clone https://github.com/ivnc/PHPLoto && cp PHPLoto/PHPLoto.php /var/www/html && mv /var/www/html/PHPLoto.php /var/www/html/MiLoto.php
Nota: cambie /var/www/html por el directorio ra�z de Apache, puede encontrarlo en /etc/apache2/sites-enabled/misitio.conf (misitio puede ser otro nombre, como 000_default) en DocumentRoot. Cambie tambi�n MiLoto.php al final de la secuencia de comandos por el nombre de su loter�a o servicio.
3�. Se recomienda ver el c�digo antes de ponerlo en producci�n, ya que hay cosas que pueden ser personalizadas. Estas son algunas recomendaciones:
* En title, al principio de la p�gina, recomendable cambiar MiLoto por el nombre de su loter�a o servicio.
* En:
if($pass != "sorteandoando")
cambie sorteandoando (no retire las comillas) por la contrase�a que desea utilizar para acceder a los sorteos. Para no hacer uso de la contrase�a, retire del script esa y las tres l�neas inmediatamente inferiores, ahsta:
die();
}
�stas inclu�das.
* En:
$serie = rand(0, 1);
es recomendable ajustar 0 y 1 de forma que representen, respectivamente, los extremos m�nimo y m�ximo del intervalo de series. Por ejemplo, si tiene series de la 1 a la 10, ambas inclu�das, substituya 0 por 1 y 1 por 10. Sin embargo, en este mismo caso, si el 1 y el 10 no est�n inclu�dos, substituya 0 por 2 y 1 por 9.
* En el Copyright recmendable substitu�r por el nombre de su loter�a, servicio, empresa o marca MiLoto, o simplemente retirar esa l�nea. Para la extensi�n de este script, se pide a todos los usuarios no retiren los cr�ditos inferiores sobre sel script, que incluyen referencias al desarrollador original y el enlace al repositorio p�blico de GitHub.

## Uso ##

En su primer uso, es recomendable acceder al script enviando el campo debug por el m�todo get en True. Por ejemplo, si la URL al archivo php es http://example.com/ruta/al/archivo.php, se recomeinda acceer a http://example.com/ruta/al/archivo.php?debug=True
* Introduzca los valroes entre los que estar�n sus n�meros ganador y complementario o deje los que est�n por defecto (1 y 99999, puede cambiar esto en las respectivas etiquetas input, en value). Luego introduzca la contrase�a (v�ase primeros pasos, 3.2).
* Si ejecut� el archivo en modo debug, deber�a serle notificado que �ste est� activo e indic�rsele convenientemente todos los pasos por los que el proceso ha ido pasando hasta llegar al n�mero final.

## Han contribuido con PHPLoto ##

* Iv�n Novegil (desarrollador principal) <info@inovegil.site40.net>

---
Si�ntase libre de realizar alguna pull request ante errores o mejoras realizadas en el c�digo que crea conveniente compartir con la comunidad.
---
Licenciado bajo GNU-General Public License. Copia y distribuci�n regida por sus t�rminos.