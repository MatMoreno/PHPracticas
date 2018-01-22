<?php
session_start();
require_once 'conection.php';
$dbElegida="";
$query1="SHOW DATABASES;";
$datosDB=mysqli_query($conexion,$query1);
while($database[]=mysqli_fetch_assoc($datosDB)){
}
array_pop($database);

?>
<select onchange="this.form.submit()" name="db">
<?php
if(!isset($_POST['db'])) {
    echo " <option value='default' selected>Seleccione database</option>";
}
foreach ($database as $clave=>$valor) {
    foreach ($valor as $k => $v) {
        if ($_POST['db']==$v) {

            echo "<option  selected value='$v'>$v</option>";
        }else{
            echo "<option value='$v'>$v</option>";
        }

    }
}
$_SESSION['databases']=$_POST['db'];
?>
</select>
<br><br>