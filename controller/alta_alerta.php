<?php 
include_once '../includes/init.php'; 
sec_session_start(); // Our custom secure way of starting a PHP session.
if (!login_check())
{
	header('Location: index.php');
}
require "../model/moduloAlerta.php";

if (isset($_POST['idMedicamento']) and isset($_POST['fechayHora']) and isset($_POST['dosis']) and isset($_POST['seRepite']) and isset($_POST['fechaFin'])){

	if( Alerta::agregar($_POST['idMedicamento'],$_POST['fechayHora'],$_POST['dosis'],$_POST['seRepite'] == "on",$_POST['fechaFin']) ){
		View::goToPage("index.php?view=principal.php");
}


}


?>