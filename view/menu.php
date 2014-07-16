<?php

if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}
?>

	<?php
	if (login_check())
	{
	?>
<ul>
	<?php
	if (login_check(2))
	{
	?>
	<li><p>Historico</p>
		<ul>
				<li><a href="index.php?view=listado_historico.php">Historico de Medicaciones</a></li>
		</ul>
	</li>
		<?php } ?>
	<li><p>Medicamentos</p>
		<ul>
	<?php
	if (login_check(1))
	{
	?>
			<li><a href="index.php?view=alta_medicamento.php">Alta de medicamento</a></li>
	<?php } ?>
	<?php
	if (login_check(2))
	{
	?>
			<li><a href="index.php?view=listado_medicamentos.php">Listado de medicamentos</a></li>
	<?php } ?>
		</ul>
	</li>
	<li><p>Alertas</p>
		<ul>
	<?php
	if (login_check(1))
	{
	?>
			<li><a href="index.php?view=alta_alerta.php">Alta de alerta</a></li>
	<?php } ?>
	<?php
	if (login_check(2))
	{
	?>
			<li><a href="index.php?view=listado_alertas.php">Listado de alertas</a></li>
	<?php } ?>
		</ul>
	</li>
</ul>

	<?php } ?>