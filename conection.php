<?php
if(isset($_SESSION['databases'])) {
    $db = $_SESSION['databases'];
}else{
    $db='phppractica';
}
$conexion=mysqli_connect( "127.0.0.1","root","",$db);
if($conexion){
}else{
    echo("no éxito");
}

?>