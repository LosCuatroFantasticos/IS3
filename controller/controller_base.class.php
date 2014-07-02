<?php
if (!defined("IndexLoaded"))
{	die("Acceso incorrecto");}
  class Controller {

          
     
   static public function load($controllerPath, $params = array())
   {
		$controllerPath = __SITE_PATH . "controller/" . $controllerPath;
		if (file_exists($controllerPath))
		{	include($controllerPath);}
		else
		{	if (debug) die("No se pudo cargar el controlador $controllerPath");}	
   }
}







?>
