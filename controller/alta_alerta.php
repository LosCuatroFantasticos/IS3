<?php 

 define ("IndexLoaded", true);
 include '../includes/init.php'; 
 sec_session_start();
 
require "../model/moduloAlerta.php";

if (isset($_POST['idMedicamento']) and isset($_POST['fechayHora']) and isset($_POST['dosis']) and isset($_POST['fechaFin'])){

	if( $res = Alerta::agregar($_POST['idMedicamento'],$_POST['fechayHora'],$_POST['dosis'],isset($_POST['seRepite']),$_POST['fechaFin']) ){
		View::goToPage("index.php?view=principal.php");
}
}


?>