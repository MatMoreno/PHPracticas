<?php
require_once '../conection.php';
$sql = "SELECT * FROM books ORDER BY category_id";
$db="shop";
session_start();
$_SESSION["databases"]=$db;
$con = conexion();
$result = $con->query($sql);
if ($result->num_rows > 0) {
    $xmlDom = new DOMDocument();
    $xmlDom->appendChild($xmlDom->createElement('resultados'));
    $xmlRoot = $xmlDom->documentElement;
    while ($row = mysqli_fetch_assoc($result)) {
        $xmlRowElementNode = $xmlDom->createElement('fila');
        foreach ($row as $k => $v) {
            $xmlRowElement = $xmlDom->createElement($k);
            $xmlText = $xmlDom->createTextNode($v);
            $xmlRowElement->appendChild($xmlText);
            $xmlRowElementNode->appendChild($xmlRowElement);
        }
        //  echo "<br/>";
        $xmlRoot->appendChild($xmlRowElementNode);
    }
} else  echo "No hay registros";
$con->close();
header('Content-type:  text/xml');
echo $xmlDom->saveXML();
?>