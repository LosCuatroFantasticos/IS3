<?php 
if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}	
if (!login_check())
{
	View::goToPage("index.php");
}
require "../../model/moduloMedicamento.php";

$m= new Medicamento ();
if (isset($_POST['nombre'])){
	$nombre= $_POST['nombre'];
	$stock= $_POST['stock'];
	if( $m->agregarMedicamento($nombre,$stock) ){
		View::goToPage("index.php?view=principal.php");
}


}


?>