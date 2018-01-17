<form method="POST" action="?section=ejemplo4.php">
<?php
require_once 'conection.php';
$BD="shop";
$query="SHOW TABLES FROM $BD;";
$datos=mysqli_query($conexion,$query);
while($filas[]=mysqli_fetch_assoc($datos)){
}
array_pop($filas);
?>
<select name="elegida">
    <?php
foreach ($filas as $clave=>$valor) {
    foreach ($valor as $k => $v) {
        if ($_POST['elegida']==$v) {
            echo "<option  selected value='$v'>$v</option>";
        }else{
        echo "<option value='$v'>$v</option>";
        }

    }
}
?><input type="submit" value="Seleccionar Tabla"> </input>
</select>
<table>

</table>

</form>
<?php

?>