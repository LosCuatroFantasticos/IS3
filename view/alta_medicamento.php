<?php
include_once 'includes/init.php'; 
sec_session_start(); // Our custom secure way of starting a PHP session.
if (!login_check())
{
	header('Location: index.php');
}
?>

<html>
<title>Sistema Domotico - Alta Medicamento</title>
<header></header> 
<head></head>
<body>
<?php View::load("menu.php");?>
<div id= class=>    
     
		<h2> Alta Medicamento </h2>
			<form id="formulario" class="" action='controller/Medicamento/alta_medicamento.php' method='post'>
				<p>Nombre de Medicamento: <input name='nombre'  id='nombre' type='text'  value=''  class='' required></p>
				<p> Stock	<input name='stock' id='stock' type='number' value='' > </p>
				
				 <input type='submit' name='btnAlta' id='btnAlta' value='Registrar Medicamento'>
				 <input name='btnCancel' type='button' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
			 </form>
</div>
	 


</body>
</html>