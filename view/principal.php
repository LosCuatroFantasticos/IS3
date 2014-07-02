<?php
include_once 'includes/init.php'; 
sec_session_start(); // Our custom secure way of starting a PHP session.
if (!login_check())
{
	header('Location: index.php');
}
?>


<div id="cuerpo">
Aca ir&iacute;a el cuerpo
</div>

