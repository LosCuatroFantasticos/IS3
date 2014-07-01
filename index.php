
<?php	


 
 

 /*** error reporting on ***/
 error_reporting(E_ALL);

 /*** include the init.php file ***/
 include 'includes/init.php'; 
 //$this->load->view("inicio.php");
 if (isset($_GET['view']))
 {	View::load($_GET['view']);}
 else
 {	View::load('inicio.php');}
   
?>

