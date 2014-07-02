
<?php	


 
 

 /*** error reporting on ***/
 error_reporting(E_ALL);
 define ("IndexLoaded", true);
 /*** include the init.php file ***/
 include 'includes/init.php'; 
 sec_session_start();
 //$this->load->view("inicio.php");
 View::load('HTMLhead.php');
 if (isset($_GET['view']))
 {	View::load($_GET['view']);}
 else
 {	
	file_put_contents("localurl",$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
}
 View::load('HTMLfoot.php');
	
   
?>

