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
<title>Sistema Domotico - Alta de alerta</title>
<header></header> 
<head></head>
<body>

<div id= class=>    
	<?php View::load("menu.php");?>
	<h2> Alta de alerta </h2>
	<form id="formulario" class="" action='controller/alta_alerta.php' method='post'>
		<p>Medicamento	<select name='idMedicamento' id='idMedicamento'>
							<?php
							foreach(MedicamentoController::listado() as $row)
							{
								?>
								<option value="<?php echo $row['idMedicamento'];?>" nombre="<?php echo $row['nombre'];?>"><?php echo $row['nombre'];?></option>
								<?php
							}
							?>
						</select> </p>
		<p>Fecha y Hora	<input type="datetime-local" name='fechayHora' id='fechayHora' > </p>
		<p>D&oacute;sis	<input type="number" min=0 name='dosis' id='dosis' > </p>
		<p>Se repite	<input type="checkbox" name='seRepite' id='seRepite' > </p>
		<p>Fecha de fin	<input type="datetime-local" name='fechaFin' id='fechaFin' > </p>
		<input type='submit' name='btnAlta' id='btnAlta' value='Registrar Alerta'>
		<input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
	</form>		
</div>
	 


</body>
</html>