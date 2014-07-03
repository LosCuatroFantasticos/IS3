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
	"idAlerta": "<?php echo  $alerta["idPlanMedicaciones"];?>",
	"idMedicamento": "<?php echo  $alerta["idMedicamento"];?>",
	"dosis": "<?php echo  $alerta["dosis"];?>",
	"seRepite": "<?php echo  $alerta["seRepite"];?>",
	"nombre": "<?php echo  $medicamento["nombre"];?>",
	"time": "<?php 
				$datetime1 = new DateTime("now");
				$datetime2 = new DateTime($alerta["fechayHora"]);
				$interval = $datetime2->getTimestamp() - $datetime1->getTimestamp();
				echo $interval>0?$interval * 1000:1;	?>"
}