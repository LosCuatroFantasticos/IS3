<?php 
if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}	
if (!login_check())
{
	View::goToPage("index.php");
}
require "model/moduloMedicamento.php";

Class MedicamentoController
{
	static public function listado()
	{
		$m= new Medicamento();
		return $m->listadoMedicamentos();
	}
	static public function getMedicamento($idMedicamento)
		{
			return Medicamento::getMedicamento($idMedicamento);
		}
}


?>