<?php
include_once 'includes/init.php'; 
sec_session_start(); // Our custom secure way of starting a PHP session.
if (!login_check())
{
	View::goToPage("index.php"); 
}
Controller::load("Medicamento/listado_medicamento.php");
?>

<html>
<title>Sistema Domotico - Listado Medicamentos</title>
<header></header> 
<head></head>
<body>

<div id= class=>    
		<?php View::load("menu.php");?>
		<h2> Listado Medicamentos </h2>
		<ul>
			<?php
				foreach(MedicamentoController::listado() as $row)
				{
					echo $row['idMedicamento'] . " - " . $row['nombre'] . " (" . $row['stock'] . ")";
				}
			?>
		</ul>
		
</div>
	 


</body>
</html>