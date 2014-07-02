<?php

if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}
if (!login_check())
{
	View::goToPage("index.php"); 
}
?>


<div id="cuerpo">
Aca ir&iacute;a el cuerpo
</div>

