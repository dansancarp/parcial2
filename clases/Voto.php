<?php
class Voto
{
	public $dni;
 	public $candidato;
  	public $sexo;
  	public $provincia;  	

  	public static function BorrarVoto($dni)
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("delete from votos where dni=$dni");					
			$consulta->execute();			
	 } 		
  	
	
	 public function InsertarVoto()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into votos (dni,candidato,sexo,provincia) values(:dni,:candidato,:sexo,:provincia)");
				$consulta->bindValue(':dni',$this->dni, PDO::PARAM_INT);
				$consulta->bindValue(':candidato', $this->candidato, PDO::PARAM_STR);
				$consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);				
				$consulta->bindValue(':provincia', $this->provincia, PDO::PARAM_STR);				
				$consulta->execute();						
	 }

	 public function ModificarVoto()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE votos SET candidato=:candidato,sexo=:sexo,provincia=:provincia where dni=:dni");
				$consulta->bindValue(':dni',$this->dni, PDO::PARAM_INT);
				$consulta->bindValue(':candidato', $this->candidato, PDO::PARAM_STR);
				$consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);				
				$consulta->bindValue(':provincia', $this->provincia, PDO::PARAM_STR);				
				$consulta->execute();						
	 }	 

  	public static function TraerVotos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from votos");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Voto");		
	}
	public static function TraerUnVoto($dni) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from votos where dni=$dni");
			$consulta->execute();
			$aBuscado= $consulta->fetchObject("Voto");
			return $aBuscado;							
	}	
}
?>