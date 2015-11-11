<?php

if(!Login::EsSesionValida())
{
	echo "<h2>Necesita ingresar DNI para votar</h2>";
}
else
{	
?>
<h3>Voto</h3>
<form class="form-ingreso">
<input type="hidden" id="dni" name="dni">
<input type="text" id="provincia" name="provincia" placeholder="Provincia"><br>
<select name="candidato" id="candidato">
	<option value="Scioli">Scioli</option>
	<option value="Macri">Macri</option>
	<option value="Massa">Massa</option>
</select><br>
<input type="radio" name="sexo" id="sexo" value="m">Masculino
<input type="radio" name="sexo" id="sexo" value="f">Femenino<br>
<input type="button" value="Guardar" onclick="votar()" class="MiBotonUTN">
</form>
<?php
}
?>