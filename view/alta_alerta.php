<?php
include_once 'includes/init.php'; 
sec_session_start(); // Our custom secure way of starting a PHP session.
if (!login_check())
{
	View::goToPage("index.php"); 
}
Controller::load("alertaController.php");
?>

<html>
<title>Sistema Domotico - Alta de alerta</title>
<header></header> 
<head></head>
<body>

<div id= class=>    
		<?php View::load("menu.php");?>
		<h2> Alta de alerta </h2>
		<ul>
			<?php
				foreach(AlertaController::listado() as $row)
				{
					?>
					<li>
					<?php
					echo $row['idAlerta'] . " - " . $row['nombre'] . " (" . $row['stock'] . ")";
					?>
					</li>
					<?php
				}
			?>
		</ul>
		
</div>
	 


</body>
</html>