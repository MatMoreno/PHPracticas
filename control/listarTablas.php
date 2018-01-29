<?php
if(isset($_POST['db'])) {
    require_once 'conection.php';
    $BD = $_SESSION["databases"];
    $query = "SHOW TABLES FROM $BD;";
    $datos = mysqli_query($conexion, $query);
echo mysqli_num_rows($datos);
if(mysqli_num_rows($datos)>0) {
    while ($filas[] = mysqli_fetch_assoc($datos)) {
    }
    ?>
    <select value="ca" onchange="this.form.submit()" name="elegida">
    <option value='default'>Seleccione tabla</option>;
    <?php
    foreach ($filas as $clave => $valor) {
        echo "hola";
        foreach ($valor as $k => $v) {
            echo "hola";
            if ($_POST['elegida'] == $v) {
                $_SESSION["tabla"] = $v;
                echo "<option  selected value='$v'>$v</option>";
            } else if ($_POST['elegida'] == "default") {
                $_SESSION["tabla"]="";
            }
                echo "<option value='$v'>$v</option>";
        }
    }
}
?>

    </select><br>
    <?php
}
?>