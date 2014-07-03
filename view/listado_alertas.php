<?php

if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}
if (!login_check())
{
	View::goToPage("index.php"); 
}
Controller::load("alertaController.php");
Controller::load("Medicamento/listado_medicamento.php");
?>
<div class="contenedor" >    
		<h2> Listado de alertas <?php echo (! isset($_POST['idMedicamento'])?"":"para el medicamento " . $_POST['nombre']);?></h2>
<div class="tableContenedor" >    
		<?php 
		$listado = isset($_POST['idMedicamento'])?AlertaController::listado($_POST['idMedicamento']):AlertaController::listado();

		if (count($listado) > 0)
		{
		?>
		<table >
			<tr>
			  <th>Id</th>
			  <th>Medicamento</th> 
			  <th>Fecha y Hora</th>
			  <th>Dosis</th>
			  <th>Repetitivo</th>
			  <th>Fecha de fin</th>
			</tr>
			<?php
				foreach($listado as $row)
				{
					?>
					<tr>
						<td><?php echo $row['idPlanMedicaciones']; ?></td>
						<td><?php echo MedicamentoController::getMedicamento($row['idMedicamento'])["nombre"]; ?></td> 
						<td><?php echo $row['fechayHora']; ?></td>
						<td><?php echo $row['dosis']; ?></td>
						<td><input type="checkbox" <?php echo $row['seRepite']==1?"checked":""; ?> disabled></td> 
						<td><?php echo $row['fechaFin']; ?></td>
					</tr>
					<?php
				}
			?>
		</table>
		<?php 
		}
		else
		{
		?>		
			No existen alertas cargadas.		
		<?php 
		}
		?>
</div>
</div>