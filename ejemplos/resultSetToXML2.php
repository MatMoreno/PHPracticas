<?php
require_once '../conection.php';
$db="shop";
$sql = "SELECT * FROM categories";
session_start();
$_SESSION["databases"]=$db;
$con = conexion();
$result = $con->query($sql);
$myXMLData="";
if ($result->num_rows > 0) {
    header('Content-type:  text/xml');
    $myXMLData = "<?xml version='1.0' encoding='UTF-8'?>";
    $myXMLData .= "<resultados>";
    while ($row = mysqli_fetch_assoc($result)) {
        $myXMLData .= "<fila>";
        foreach ($row as $k => $v) {
            $myXMLData .= "<$k>";
            $myXMLData .= "$v";
            $myXMLData .= "</$k>";
        }
        $myXMLData .= "</fila>";
    }
    $myXMLData .= "</resultados>";
} else  echo "No hay registros";
//var_dump($myXMLData);
$xml = simplexml_load_string($myXMLData) or die('Error: No es posible crear el objeto XML');
echo $xml->asXML();
?>