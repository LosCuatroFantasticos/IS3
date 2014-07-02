
<?php 
if (! defined("IndexLoaded"))
{	die("Acceso incorrecto");}
?>

<div id="banner">
    
</div>

<div id="workzone">
<br>
<br>
<br>
<?php 
if (!login_check())
{//Si no esta logueado, muestro formulario de login
?>
<form id="formulario" action="controller/verificar.php" method="post">
   usuario:<input name="user" id="input1"></><br>
 contrase&ntilde;a:<input type="password" name="pass" id="input2"></><br>
 <input name="login" type="submit" value="ingresar">
  
</form>
<?php
}
else
{
?>
Ya Logueado (<a href="index.php?view=logout.php">Desloguearse</a>)
<?php
}

?>
<br>
<br>
<br>
</div>
 

