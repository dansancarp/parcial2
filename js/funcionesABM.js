function votar()
{
	var miDni = $("#dni").val();
	if(miDni.length>0)
	{		
		Modificar(miDni);
		return;
	}	
	var miProvincia = $("#provincia").val();	
	if(miProvincia == "")
	{
		alert("INGRESE UNA PROVINCIA");
		return;
	}
	var miSexo = $('input:radio[name=sexo]:checked').val();
	var miCandidato = $("#candidato").val();
	var miAjax= $.ajax({
		method:"post",
		url:"nexo.php",
		data:{
			queHago:"votar",
			provincia:miProvincia,
			sexo:miSexo,
			candidato:miCandidato
		}
	});
	miAjax.done(function(resultado){
		$("#principal").html("<h2>Has Votado</h2>");
		$("#Contador").load("index.php #Contador");
	});
}

function BorrarVoto(dni)
{	
	var miDni = dni;
	var miAjax= $.ajax({
		method:"post",
		url:"nexo.php",
		data:{
			queHago:"borrar",
			dni:miDni
		}
	});
	miAjax.done(function(resultado){
		MostrarListado();		
	});
}

function EditarVoto(dni)
{	
	MostrarFormVotacion();
	var miDni = dni;
	var miAjax= $.ajax({
		method:"post",
		url:"nexo.php",
		data:{
			queHago:"editar",
			dni:miDni
		}
	});
	miAjax.done(function(resultado){
		var voto = JSON.parse(resultado);		
		$("#dni").val(voto.dni);
		$('input:radio[name=sexo]:checked').val(voto.sexo);
		$("#provincia").val(voto.provincia);
		$("#candidato").val(voto.candidato);		
	});		
}

function Modificar(dni)
{
	var miDni = dni;
	var miProvincia = $("#provincia").val();	
	if(miProvincia == "")
	{
		alert("INGRESE UNA PROVINCIA");
		return;
	}
	var miSexo = $('input:radio[name=sexo]:checked').val();
	var miCandidato = $("#candidato").val();
	var miAjax= $.ajax({
		method:"post",
		url:"nexo.php",
		data:{
			queHago:"modificar",
			provincia:miProvincia,
			sexo:miSexo,
			candidato:miCandidato,
			dni:miDni
		}
	});
	miAjax.done(function(resultado){
		MostrarListado();				
	});
}