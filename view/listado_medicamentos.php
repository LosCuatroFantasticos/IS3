<?php
include_once 'includes/init.php'; 
sec_session_start(); // Our custom secure way of starting a PHP session.
if (!login_check())
{
	View::goToPage("index.php"); 
}
Controller::load("Medicamento/listado_medicamento.php");
?>

<div id= class=>    
		<h2> Listado Medicamentos </h2>
		<table>
			<tr>
			  <th>idMedicamento</th>
			  <th>nombre</th> 
			  <th>stock</th>
			  <th>Alertas</th>
			</tr>
			<?php
				foreach(MedicamentoController::listado() as $row)
				{
					?>
					<tr>
						<td><?php echo $row['idMedicamento']; ?></td>
						<td><?php echo $row['nombre']; ?></td> 
						<td><?php echo $row['stock']; ?></td>
						<td><form action='index.php?view=listado_alertas.php' method='post'>
								<input hidden value="<?php echo $row['idMedicamento']; ?>" name="idMedicamento">
								<input hidden value="<?php echo $row['nombre']; ?>" name="nombre">	
								<input type="submit" value="Ver alertas">
							</form>
						</td>
					</tr>
					<?php
				}
			?>
		</table>
		
</div>
	 
