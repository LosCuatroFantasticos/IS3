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
require "model/moduloMedicamento.php";

Class MedicamentoController
{
	static public function listado()
	{
		$m= new Medicamento ();
		return $m->listadoMedicamentos();
	}
}


?>