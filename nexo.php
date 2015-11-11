<?php
session_start();
require "clases/AccesoDatos.php";
require "clases/Voto.php";
require "clases/Login.php";
$queHago = $_POST['queHago'];
switch ($queHago) {
	case 'MostrarLogin':
		include "partes/formingreso.php";
		break;
	case 'MostrarFormVotacion':
		include "partes/formvotacion.php";
		break;
	case 'MostrarListado':
		include "partes/listado.php";
		break;
	case 'VerEnMapa':
		include "partes/formMapaGoogle.php";
		break;
	case 'MostrarEncriptado':
		include "partes/formEncriptado.php";
		break;
	case 'login':
		Login::Logear($_POST['dni']);
		if(!isset($_COOKIE['contVotos']))
			setcookie("contVotos",0);
		break;		
	case 'votar':
		$dni = $_SESSION["dni"];
		$voto = new Voto();
		$voto->dni = $dni;
		$voto->provincia = $_POST['provincia'];
		$voto->sexo = $_POST['sexo'];
		$voto->candidato = $_POST['candidato'];
		$voto->InsertarVoto();
		setcookie("contVotos",(int)$_COOKIE['contVotos'] + 1);		
		session_destroy();
		$_SESSION=null;		
		break;
	case 'borrar':
		Voto::BorrarVoto($_POST['dni']);
		break;
	case 'editar':	
		$voto = Voto::TraerUnVoto($_POST['dni']);		
		echo json_encode($voto);		
		break;
	case 'modificar':
		$dni = $_POST["dni"];		
		$voto = new Voto();
		$voto->dni = $dni;
		$voto->provincia = $_POST['provincia'];
		$voto->sexo = $_POST['sexo'];
		$voto->candidato = $_POST['candidato'];
		$voto->ModificarVoto();		
		break;
}
?>