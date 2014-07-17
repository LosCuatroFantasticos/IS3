<?php 
define ("IndexLoaded", true);
include '../includes/init.php'; 
sec_session_start();
require "../model/moduloMedicamento.php";
require "../model/moduloAlerta.php";
require "../model/moduloHistoricoMedicaciones.php";
$m= new Medicamento ();
if (isset($_REQUEST['idMedicamento']) and isset($_REQUEST ['dosis']) and isset($_REQUEST['idAlerta']) and isset($_REQUEST['seRepite'])){
	Alerta::desactivarAlerta($_REQUEST['idAlerta'],$_REQUEST['seRepite']);
	$m->descontarDosis($_REQUEST['idMedicamento'],$_REQUEST['dosis']);
	HistoricoMedicaciones::agregarHistorico($_REQUEST['idMedicamento'],$_REQUEST['dosis'],date("Y-m-d H:i:s"));
}


?>