<?php
if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}	
if (!login_check())
{
	View::goToPage("index.php");
}
include_once "db.php";	
class Alerta
	{        		
		static public function listadoAlertas()
		{//Devuelve el listado de todas las alertas existentes.
			$db = DB::conectar(); //funcion que conecta con bd
			try
			{
				$result = $db->query("SELECT `idPlanMedicaciones`,`idMedicamento`,`fechayHora`,`dosis`,`seRepite`,`fechaFin`
									  FROM `PlanMedicaciones` "); 										  
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
		
		static public function siguienteAlerta()
		{//Devuelve el listado de todas las alertas existentes.
			$db = DB::conectar(); //funcion que conecta con bd
			try
			{
				$result = $db->query("SELECT `idPlanMedicaciones`,`idMedicamento`,`fechayHora`,`dosis`,`seRepite`,`fechaFin`
									  FROM `PlanMedicaciones` 
									  Order by `fechayHora` desc
									  Limit 1"); 										  
				$row = $result->fetch_array();
				$result->close();
			}
			catch(PDOException $e)
			{	return $e->getMessage();}		
			DB::desconectar($db);
			return $row;
		}
		  		
		static public function listadoAlertasPara($idMedicamento)
		{//Devuelve las alertas para un medicamento determinado.
			$db = DB::conectar(); //funcion que conecta con bd
			try
			{
				$smtp = $db->prepare("SELECT `idPlanMedicaciones`,`idMedicamento`,`fechayHora`,`dosis`,`seRepite`,`fechaFin`
										FROM `PlanMedicaciones` 
										Where `idMedicamento` = ?");
				$smtp->bind_param("i",$idMedicamento);
				$smtp->execute();
				$result = $smtp->get_result();
				$rows = array();
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
		
		static public function agregar($idMedicamento,$fechayHora,$dosis,$seRepite,$fechaFin) 
        {	
			$db = DB::conectar(); //funcion que conecta con bd
				try{
						$resul=$db->prepare("INSERT INTO `PlanMedicaciones` VALUES ('',?,?,?,?,?)");
						$resul->bind_param('isiis',$idMedicamento,$fechayHora,$dosis,$seRepite,$fechaFin);
						$resul->execute();
						$resul->store_result();
				  }
				  catch(PDOException $e){
					return $e->getMessage();
				  }		
				  DB::desconectar($db);
				  return TRUE;
		}
		
		static public function desactivarAlerta($idAlerta,$seRepite) 
        {	
			$db = DB::conectar(); //funcion que conecta con bd
				try{
						if ($seRepite = 1)
						{	$resul=$db->prepare("update `PlanMedicaciones` set `fechayHora` =  DATE_ADD(`fechayHora`,INTERVAL 1 WEEK) where `idAlerta` = ? and seRepite = 1");}
						$resul->bind_param('i',$idAlerta);
						$resul->execute();
						$resul=$db->prepare("delete from `PlanMedicaciones` where `idAlerta` = ? and (seRepite = 0 or fechaFin < NOW())");
						$resul->bind_param('i',$idAlerta);
						$resul->execute();
				  }
				  catch(PDOException $e){
					return $e->getMessage();
				  }		
				  DB::desconectar($db);
				  return TRUE;
		}
	}
?>