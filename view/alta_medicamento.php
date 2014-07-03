<?php

if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}
if (!login_check())
{
	View::goToPage("index.php"); 
}
?>

<div  class="contenedor" >    
     
		<h2> Alta Medicamento </h2>
			<form id="formulario" class="" action='controller/Medicamento/alta_medicamento.php' method='post'>
				<p>Nombre de Medicamento: <input name='nombre'  id='nombre' type='text'  value=''  class='' required></p>
				<p> Stock	<input name='stock' id='stock' type='number' value='' > </p>
				
				 <input class="botones" type='submit' name='btnAlta' id='btnAlta' value='Registrar Medicamento'>
				 <input  class="botones" type='button' name='btnCancel' id='btnCancel' value='Cancelar' onClick='window.history.back()'>
			 </form>
</div>
	 
 