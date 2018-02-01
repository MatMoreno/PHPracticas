<?php
include ("control/listados.php");
echo "<br>"."<h1>Datos</h1>";
leerSubtotalizar("datos/ordenado.txt");
echo "<br>"."<h1>Libros</h1>";

leerOrdenarSubtotalizarLibros("shop");
leerOrdenarSubtotalizarLibrosNombreCat("shop");
//listarAlumnos("pruebaphp");
ordenaAlumnos("pruebaphp");
?>