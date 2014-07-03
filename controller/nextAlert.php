<?php
 define ("IndexLoaded", true);
 include '../includes/init.php'; 
 sec_session_start();
 
require "../model/moduloAlerta.php";
require "../model/moduloMedicamento.php";

$alerta = Alerta::siguienteAlerta();
$medicamento = Medicamento::getMedicamento($alerta["idMedicamento"]);
?>

{
	idAlerta: <?php echo  $alerta["idAlerta"];?>,
	idMedicamento: <?php echo  $alerta["idMedicamento"];?>,
	dosis: <?php echo  $alerta["dosis"];?>,
	seRepite: <?php echo  $alerta["seRepite"];?>,
	nombre: <?php echo  $medicamento["nombre"];?>,
	fechayHora: <?php //echo  $alerta["fechayHora"]; Falta calcular la diferencia entre el momento actual y la fecha de la alerta, y convertirlo en ms.?>
}