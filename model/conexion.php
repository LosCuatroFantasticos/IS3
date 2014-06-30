<?php
   
function verificar_usuarios($usuario,$pass){
// Conectando, seleccionando la base de datos

$link = mysql_connect('localhost', 'root', 'root')
    or die('No se pudo conectar: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('pastillero') or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL
$query = 'SELECT * FROM usuario where $usuario == usuario.idUsuario and $pass == usuario.password';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());


// Imprimir los resultados en HTML
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";



// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
 



}


?>
