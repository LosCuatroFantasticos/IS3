

<?php
 
    
    $link = mysql_connect('localhost', 'root', 'root')
    or die('No se pudo conectar: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('pastillero') or die('No se pudo seleccionar la base de datos');

$usuario = $_POST["user"];
$pass   = $_POST["pass"];

// Realizar una consulta MySQL
$query = 'SELECT * FROM usuario where usuario.idUsuario = $usuario and usuario.password = $pass ';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$num_rows = @mysql_num_rows($result);
if(!$num_rows) {
    this->load->view(error.php);
}

else{

    this->load->view(principal.php);
}


// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
 



?>
