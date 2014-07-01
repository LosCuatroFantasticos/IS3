<?php
if ( (! defined ("InitLoaded")) 
	or (!InitLoaded) )
{
	header('Location: ../index.php');
}
if (!login_check())
{
	header('Location: index.php');
}
?>
<ul>
<?php
if (login_check())
{
?>
<li>
<a href="index.php?view=alta_medicamento.php">Alta de medicamento</a>
</li>
<?php } ?>
<li>
<a href="index.php?view=listado_medicamentos.php">Listado de medicamentos</a>
</li>
</ul>