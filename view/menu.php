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
<li>
<a href="index.php?view=alta_medicamento.php">Alta de medicamento</a>
</li>
</ul>