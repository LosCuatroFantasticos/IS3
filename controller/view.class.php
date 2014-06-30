<?php 

Class View{

/*
   *
   * @set undefined vars
   * @param string $index
   * @param mixed $value
   * @ return void
   */
   static public function load($viewPath)
   {
		$viewPath = __SITE_PATH . "/view/" . $viewPath;
		if (file_exists($viewPath))
		{	include($viewPath);}
		else
		{	if (debug) die("No se pudo cargar la vista $viewPath");}	
   }
  }