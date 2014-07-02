<html>
<head>
<link rel="stylesheet" type="text/css" href="css/estilo_error.css">

</head>
<body>
<?php 
if ( (! defined ("InitLoaded")) 
	or (!InitLoaded) )
{
	header('Location: ../index.php');
}
if (!login_check())
{
	header('Location: index.php');
}
echo $params["error"] . "<br />";

?>

</body>
</html>
