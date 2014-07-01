<?php 
include_once '../../includes/init.php'; 
sec_session_start(); // Our custom secure way of starting a PHP session.
if (!login_check())
{
	header('Location: index.php');
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