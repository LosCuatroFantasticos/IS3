<?php/*
if ( (! defined ("InitLoaded")) 
	or (!InitLoaded) )
{
	header('Location: ../index.php');
}
if (!login_check())
{
	header('Location: index.php');
}*/
?>
<ul>
	<?php
	if (login_check())
	{
	?>
	<?php } ?>
	<li>Medicamentos
		<ul>
			<li><a href="index.php?view=alta_medicamento.php">Alta de medicamento</a></li>
			<li><a href="index.php?view=listado_medicamentos.php">Listado de medicamentos</a></li>
		</ul>
	</li>
	<li>Alertas
		<ul>
			<li><a href="index.php?view=alta_alerta.php">Alta de alerta</a></li>
			<li><a href="index.php?view=listado_alertas.php">Listado de alertas</a></li>
		</ul>
	</li>
</ul>
