<?php
if ( (! defined ("InitLoaded")) 
	or (!InitLoaded) )
{
	header('Location: ../index.php');
}
if (!login_check())
{
	header('Location: index.php');
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
	}








?>