<?php
Class DB{

static function conectar(){

    $db_type='mysql';
    $db_host='localhost';
    $db_database='pastillero';
    $db_username='root';
    $db_password='';
 
	
	try{
	
		$conn = new PDO('mysql:host=localhost;dbname=pastillero', $db_username, $db_password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	}catch(PDOException $e){
			return $e->getMessage();
	}

	return $conn;
}

	
static function desconectar ($conn) {
    //$db->disconnect();
	unset($conn);
}
}
?>