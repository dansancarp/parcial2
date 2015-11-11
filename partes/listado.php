<?php

if(!Login::EsSesionValida())
{
	echo "<h2>Necesita ingresar DNI para votar</h2>";
}
else
{	
	require_once "clases/Voto.php";
	$votos = Voto::TraerVotos();	
	echo "<table border=1>";
	echo "<tr><td>DNI</td><td>Sexo</td><td>Candidato</td><td>Provincia</td></tr>";
	foreach ($votos as $v) {
		echo "<tr>";
		echo "<td>$v->dni</td>";
		echo "<td>$v->sexo</td>";
		echo "<td>$v->candidato</td>";
		echo "<td>$v->provincia</td>";
		echo "<td><input type='button' class='MiBotonUTN' onclick=BorrarVoto('$v->dni') value='Borrar'></td>";
		echo "<td><input type='button' class='MiBotonUTN' onclick=EditarVoto('$v->dni') value='Editar'></td>";
		echo "</tr>";
	}
	echo "</table>";
}

?>