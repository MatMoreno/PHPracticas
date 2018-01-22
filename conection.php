<?php
$db=$_SESSION['databases'];
$conexion=mysqli_connect( "127.0.0.1","root","",$db);
if($conexion){
}else{
    echo("no éxito");
}

?>