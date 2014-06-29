<html>
<!- Es la base no tiene CSS ni nada todo lo del estilo deberia ir en un archivo .css
  y hay que cambiar el estilo es solo la maquetacion jajjajaaja


-!>
<head>
<style>
body{
   
   color:black;
   background-color:yellow;
      

}


#workzone{
   background-color:blue;
   text-align:center;
   margin-left:50px;
   margin-right:50px;
   margin-top:20px;
}

#banner{
   background-color:green;
   padding-bottom:80px;
}

#input1{
  margin-left:23px;

}

#input2{
  margin-right:3px;
}

</style>


</head>
<header>
   


   
   
</header>
<body>

<div id="banner">
    
</div>

<div id="workzone">
<br>
<br>
<br>
<form>
   usuario:<input id="input1"></><br>
 contrase&ntildea:<input id="input2"></><br>
</form>
<br>
<br>
<br>
</div>

<?php	


 
 

 /*** error reporting on ***/
 error_reporting(E_ALL);

 /*** define the site path constant ***/
 $site_path = realpath(dirname(__FILE__));
 define ('__SITE_PATH', $site_path);

 /*** include the init.php file ***/
 include 'includes/init.php';

?>

</body>

<footer></footer>
</html>
