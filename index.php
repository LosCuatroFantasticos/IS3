
<?php	


 
 

 /*** error reporting on ***/
 error_reporting(E_ALL);
 /*** include the init.php file ***/
 include 'includes/init.php'; 
 //$this->load->view("inicio.php");
 if (isset($_GET['view']))
 {	View::load($_GET['view']);}
 else
 {	
	file_put_contents("localurl",$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
	View::load('inicio.php');
}
	
   
?>

