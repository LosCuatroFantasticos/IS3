<?php 
if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}	
if (!login_check())
{
	View::goToPage("index.php");
}
require "model/moduloHistoricoMedicaciones.php";

Class HistoricoMedicacionesController
{//Si se le pasa el id de una medicamento devuelve las alertas para ese medicamento, sino devuelve todas las alertas.
	static public function listado()
	{	
		return HistoricoMedicaciones::listadoHistoricoMedicaciones();
	}
	
}


?>