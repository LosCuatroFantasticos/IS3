<?php
if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}	
if (!login_check())
{
	View::goToPage("index.php");
}
include_once "db.php";	
class Medicamento
	{
        public function agregarMedicamento($nombre,$stock)
        {	
			$db = DB::conectar(); //funcion que conecta con bd
				try{
					$stmt = $db->prepare("SELECT `idMedicamento`,  `stock`
										  FROM `medicamentos` 
										  WHERE nombre = ? LIMIT 1"); 
					$stmt->bind_param('s', $nombre);
					$stmt->execute();   
					$stmt->store_result();
					
					if ($stmt->num_rows == 1) 
					{//El medicamento ya existe.
						$stmt->bind_result($db_id,$db_stock);
						$stmt->fetch();
						$resul=$db->prepare("UPDATE `medicamentos` SET `stock` = ? WHERE `idMedicamento` = ?");
						$nuevoStock = $stock + $db_stock;
						$resul->bind_param('ii',$nuevoStock,$db_id);
						$resul->execute();
						$resul->store_result();						
					}
					else
					{//No existe.
						$resul=$db->prepare("INSERT INTO `medicamentos`(`idMedicamento`, `nombre`, `stock`) VALUES ('',?,?)");
						$resul->bind_param('ss',$nombre,$stock);
						$resul->execute();
						$resul->store_result();
					}
				  }
				  catch(PDOException $e){
					return $e->getMessage();
				  }		
				  DB::desconectar($db);
				  return TRUE;
		}
        public function descontarDosis($idMedicamento,$dosis)
        {	
			$db = DB::conectar(); //funcion que conecta con bd
				try{				
					$resul=$db->prepare("UPDATE `medicamentos` SET `stock` = `stock` - ? WHERE `idMedicamento` = ?");
					$resul->bind_param('ii',$dosis,$idMedicamento);
					$resul->execute();
					$resul->store_result();		
				  }
				  catch(PDOException $e){
					return $e->getMessage();
				  }		
				  DB::desconectar($db);
				  return TRUE;
		}
		
		public function listadoMedicamentos()
		{
			$db = DB::conectar(); //funcion que conecta con bd
			try
			{
				$result = $db->query("SELECT `idMedicamento`,`nombre`,`stock`
									  FROM `medicamentos` "); 										  
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
		
		static public function getMedicamento($idMedicamento)
		{
			$db = DB::conectar(); //funcion que conecta con bd
			try
			{
				$stmt = $db->prepare("SELECT `idMedicamento`,`nombre`,`stock`
									  FROM `medicamentos` 
									  WHERE `idMedicamento` = ?
									  Limit 1"); 		
				$stmt->bind_param('i',$idMedicamento);
				$stmt->execute();
				$result = $stmt->get_result();										  
				$row = $result->fetch_array();
				$result->close();
			}
			catch(PDOException $e)
			{	return $e->getMessage();}		
			DB::desconectar($db);
			return $row;
		}
	}








?>