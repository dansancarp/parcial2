<?php
if(!Login::EsSesionValida())
{
	echo "<h2>Necesita ingresar DNI para votar</h2>";
}
else
{
	echo "<h2>DNI: ".$_SESSION['dni']."</h2>";
	echo "<h2>DNI encriptado: ".md5($_SESSION['dni'])."</h2>";
}
?>