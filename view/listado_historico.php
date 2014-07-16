<?php

if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}
if (!login_check())
{
	View::goToPage("index.php"); 
}
Controller::load("historicoMedicacionesController.php");
Controller::load("Medicamento/listado_medicamento.php");
?>

<div id="" class="contenedor" >    
		<h2> Historico </h2>
		<div class="tableContenedor" >    
		<table>
			<tr>
			  <th>Id</th>
			  <th>Medicamento</th> 
			  <th>Dosis</th>
			  <th>Fecha y Hora</th>
			</tr>
			<?php
				foreach(HistoricoMedicacionesController::listado() as $row)
				{
					?>
					<tr>
						<td><?php echo $row['idHistorico']; ?></td>
						<td><?php echo MedicamentoController::getMedicamento($row['idMedicamento'])["nombre"]; ?></td> 
						<td><?php echo $row['dosis']; ?></td>
						<td><?php echo $row['horarioTomado']; ?></td>
					</tr>
					<?php
				}
			?>
		</table>
		
</div>
</div>
	 
