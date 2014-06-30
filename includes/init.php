<?php
	define ('debug', true);

   /*** include the controller class ***/ 
   include __SITE_PATH . '/controller/'. 'controller_base.class.php';

   /*** include the registry class***/
   include __SITE_PATH . '/controller/'. 'registry.class.php';

   /*** include the router class ***/
   include __SITE_PATH .'/controller/'. 'router.class.php';
   
   /*** include the template class ***/
   include __SITE_PATH .'/controller/'. 'template.class.php';
   
   /*** include the template class ***/
   include __SITE_PATH .'/controller/'. 'view.class.php';

   /*** auto load model class ***/
    function __autoload($class_name) 
    {
		$filename = strtolower($class_name).'.class.php';
		$file = __SITE_PATH .'/model/'. $filename;

		if(file_exists($file) == false)
		{	return false;}	
		
		include($file);
    }

   /*** a new registry object***/
 
   $registry = new registry;

   /*** create the database registry object ***/
   //$registry->db = db::getInstance();

?>
