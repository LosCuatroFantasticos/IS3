<?php 
 define ("IndexLoaded", true);
 include '../../includes/init.php'; 
 sec_session_start();
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