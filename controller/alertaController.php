<?php 
if ( (! defined ("InitLoaded")) 
	or (!InitLoaded) )
{
	header('Location: ../../index.php');
}	
if (!login_check())
{
	View::goToPage("index.php");
}
require "model/moduloAlerta.php";

Class AlertaController
{
	static public function listado()
	{
		$a= new Alerta ();
		return $a->listadoAlertas();
	}
}


?>