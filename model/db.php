<?php
if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}	
Class DB{

static function conectar(){

    $db_host='localhost';
    $db_database='pastillero';
    $db_username='root';
    $db_password='';
 
	
	$mysqli = mysqli_connect($db_host, $db_username, $db_password, $db_database);
	
	if (mysqli_connect_error()) 
	{
		die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
	return $mysqli;
}

	
	static function desconectar ($mysqli) 
	{
		//$db->disconnect();
		//unset($conn);
		$mysqli->close();
	}
}
?>
