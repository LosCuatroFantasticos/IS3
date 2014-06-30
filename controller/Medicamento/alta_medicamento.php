<?php 
require "../../model/moduloMedicamento.php";

$m= new Medicamento ();
if (isset($_POST['nombre'])){
	$nombre= $_POST['nombre'];
	$stock= $_POST['stock'];
	if( $m->agregarMedicamento($nombre,$stock) ){
		header("Location: principal.php");
}


}


?>