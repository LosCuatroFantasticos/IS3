<?php
define ("IndexLoaded", true);
include_once '../includes/init.php'; 

sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['user'], $_POST['pass'])) {
    $usuario = $_POST['user'];
    $password = $_POST['pass'];
	
    if (login($usuario, $password)) {
        // Login success 
        header('Location: ../index.php?view=principal.php');
    } else {
        // Login failed 
        View::load("error.php", Array( error => "Fall&oacute; el login" ));
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}

?>
