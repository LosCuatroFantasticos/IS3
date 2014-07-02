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
{//Si se le pasa el id de una medicamento devuelve las alertas para ese medicamento, sino devuelve todas las alertas.
	static public function listado($idMedicamento = null)
	{		
		if ($idMedicamento == null)
		{	return Alerta::listadoAlertas();}
		else
		{	return Alerta::listadoAlertasPara($idMedicamento);}
	}
	
}


?>