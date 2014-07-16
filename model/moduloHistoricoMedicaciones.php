<?php
if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}	
if (!login_check())
{
	View::goToPage("index.php");
}
include_once "db.php";	
class HistoricoMedicaciones
	{
        static public function agregarHistorico($idmedicamento,$dosis,$fechaYHora)
        {	
			$db = DB::conectar(); //funcion que conecta con bd
				try
				{
					$resul=$db->prepare("INSERT INTO `historicomedicaciones`(`idMedicamento`, `dosis`, `horarioTomado`) VALUES (?,?,?)");
					$resul->bind_param('iis',$idmedicamento,$dosis,$fechaYHora);
					$resul->execute();
					$resul->store_result();
				}
				catch(PDOException $e)
				{
					return $e->getMessage();
				}		
			DB::desconectar($db);
			return TRUE;
		}
		
		static public function listadoHistoricoMedicaciones()
		{
			$db = DB::conectar(); //funcion que conecta con bd
			$rows = array();
			try
			{
				$result = $db->query("SELECT `idHistorico`,`idMedicamento`,`dosis`,`horarioTomado`
									  FROM `historicomedicaciones` "); 										  
				while($row = $result->fetch_array())
				{
					$rows[] = $row;
				}
				$result->close();
			}
			catch(PDOException $e)
			{	return $e->getMessage();}		
			DB::desconectar($db);
			return $rows;
		}
	}








?>