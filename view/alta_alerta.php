<?php

if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}
if (!login_check())
{
	View::goToPage("index.php"); 
}
Controller::load("Medicamento/listado_medicamento.php");
?>
<div id="" class="contenedor" >    
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
		<p>D&oacute;sis	<input type="number" min=0 name='dosis' id='dosis' required > </p>
		<p>Se repite todas las semanas	<input type="checkbox" name='seRepite' id='seRepite' > </p>
		<div id="divFechaFin" style="display: none;"><p>Fecha de fin	<input type="datetime-local" name='fechaFin' id='fechaFin' > </p></div>
		<input type='submit' name='btnAlta' id='btnAlta' value='Registrar Alerta'>
		<input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
	</form>		
</div>
<script>
$("#fechayHora").val((new Date).toJSON().slice(0,16));
$("#fechayHora").min = (new Date).toJSON().slice(0,16);
$("#seRepite").change(function(){$("#divFechaFin").toggle();});
$("#fechaFin").val((new Date).toJSON().slice(0,16));
$("#fechaFin").min = (new Date).toJSON().slice(0,16);
$("#formulario").submit(function()
						{if ($("#dosis").val() == "")
						{	return false;}
						});
</script>
	 