<?php
include_once 'includes/init.php'; 
sec_session_start(); // Our custom secure way of starting a PHP session.
if (!login_check())
{
	header('Location: index.php');
}
?>

<html>
<title>Sistema Domotico</title>
<header></header> 
<head></head>
<body>
<div id="menu">
Aca ir&iacute;a el menu
<?php View::load("menu.php");?>
</div>

<div id="cuerpo">
Aca ir&iacute;a el cuerpo
</div>

</body>
</html>
