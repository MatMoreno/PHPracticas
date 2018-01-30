<?php
function conexion()
{
    if (isset($_SESSION['databases'])) {
        $db = $_SESSION['databases'];
    } else {
        $db = 'phppractica';
    }
    $conexion = new mysqli("127.0.0.1", "root", "", $db);
    if ($conexion) {
        return $conexion;
    } else {
        echo("no éxito");
    }
}
?>