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
<title>Sistema Domotico - Listado de alertas</title>
<header></header> 
<head></head>
<body>

<div >    
		<?php View::load("menu.php"); ?>
		<h2> Listado de alertas <?php echo (! isset($_POST['idMedicamento'])?"":"para el medicamento " . $_POST['nombre']);?></h2>
		<?php 
		$listado = isset($_POST['idMedicamento'])?AlertaController::listado($_POST['idMedicamento']):AlertaController::listado();

		if (count($listado) > 0)
		{
		?>
		<table >
			<tr>
			  <th>idPlanMedicaciones</th>
			  <th>idMedicamento</th> 
			  <th>fechayHora</th>
			  <th>dosis</th>
			  <th>seRepite</th>
			  <th>fechaFin</th>
			</tr>
			<?php
				foreach($listado as $row)
				{
					?>
					<tr>
						<td><?php echo $row['idPlanMedicaciones']; ?></td>
						<td><?php echo $row['idMedicamento']; ?></td> 
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
</body>
</html>