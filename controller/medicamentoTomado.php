<?php 
 define ("IndexLoaded", true);
 include '../includes/init.php'; 
require "../../model/moduloMedicamento.php";

$m= new Medicamento ();
if (isset($_POST['idMedicamento']) and isset($_POST['dosis']) and isset($_POST['idAlerta']) and isset($_POST['seRepite'])){
	$m->descontarDosis($_POST['idMedicamento'],$_POST['dosis']);
	Alerta::desactivarAlerta($_POST['idAlerta'],$_POST['seRepite']);
}


?>