<?php 

if (! defined("IndexLoaded"))
{	die("Acceso incorrecto");}
Class View{

/*
   *
   * @set undefined vars
   * @param string $index
   * @param mixed $value
   * @ return void
   */
   static public function load($viewPath, $params = array())
   {
		$viewPath = __SITE_PATH . "/view/" . $viewPath;
		if (file_exists($viewPath))
		{	include($viewPath);}
		else
		{	if (debug) die("No se pudo cargar la vista $viewPath");}	
   }
   
	static public function goToPage($relativeUrl)
	{
		header("Location: http://" . View::baseUrl() . $relativeUrl);		
	}
	
	static public function baseUrl()
	{
		$baseUrl = file_get_contents(__SITE_PATH . "/localurl");
		$baseUrl = str_replace("index.php","",$baseUrl);
		RETURN $baseUrl;
	}
}