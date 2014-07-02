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
class Alerta
	{        		
		public function listadoAlertas()
		{
			$db = DB::conectar(); //funcion que conecta con bd
			try
			{
				$result = $db->query("SELECT `idAlerta`
									  FROM `alertas` "); 										  
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