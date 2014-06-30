<?php

include_once "db.php";	
class Medicamento
	{
        public function agregarMedicamento($nombre,$stock)
        {
				try{
				  $db=conectar(); //funcion que conecta con bd
				  $resul=$db->prepare("INSERT INTO  medicamento( idMedicamento, nombre, stock) VALUES ('',?,?)");
				  $resul->bindParam(1,$nombre);
				  $resul->bindParam(2,$stock);
				  }
				  catch(PDOException $e){
					return $e->getMessage();
				  }		
				  $resul->execute();
				  desconectar($db);
				  return TRUE;
		}
	}








?>