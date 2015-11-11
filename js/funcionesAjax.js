function MostrarLogin()
{	
	var miAjax= $.ajax({
		method:"post",
		url:"nexo.php",
		data:{
			queHago:"MostrarLogin"
		}
	});
	miAjax.done(function(resultado){
		$("#principal").html(resultado);
		$("#tiempo").load("index.php #tiempo");
	});
}

function MostrarFormVotacion()
{
	var miAjax= $.ajax({
		method:"post",
		url:"nexo.php",
		data:{
			queHago:"MostrarFormVotacion"
		}
	});
	miAjax.done(function(resultado){
		$("#principal").html(resultado);
		$("#tiempo").load("index.php #tiempo");
	});
}

function MostrarListado()
{
	var miAjax= $.ajax({
		method:"post",
		url:"nexo.php",
		data:{
			queHago:"MostrarListado"
		}
	});
	miAjax.done(function(resultado){
		$("#principal").html(resultado);
		$("#tiempo").load("index.php #tiempo");
	});
}