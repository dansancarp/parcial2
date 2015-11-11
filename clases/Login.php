<?php
class Login{

public static function Logear($dni)
{		
	session_start();
	$_SESSION["dni"] = $dni;
	$_SESSION["tiempo"] = 60;
	$fecha = date("Y-m-d H:i:s");  		
	$_SESSION["ingreso"] = $fecha;
}

public static function EsSesionValida()
{	
	if(!isset($_SESSION))
	{
		return false;
	}
	else
	{
		$fecha = $_SESSION["ingreso"];
		$ahora = date("Y-m-d H:i:s");
		$tiempo = strtotime($ahora)-strtotime($fecha);
		$_SESSION['tiempo'] = 60 - $tiempo;
		if((int)$_SESSION['tiempo']>0)
		{				 
			return true;
		}
		else
		{
			$_SESSION['tiempo']=null;
			return false;
		}

	}
}

}
?>