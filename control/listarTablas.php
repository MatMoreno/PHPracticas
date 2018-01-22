<?php
if(isset($_POST['db'])) {
    require_once 'conection.php';
    $BD = $_POST['db'];
    $query = "SHOW TABLES FROM $BD;";
    $datos = mysqli_query($conexion, $query);
    while ($filas[] = mysqli_fetch_assoc($datos)) {
    }
    array_pop($filas);

    ?>
    <select onchange="this.form.submit()" name="elegida">
        <?php

        echo " <option value='default' selected>Seleccione tabla</option>";

        foreach ($filas as $clave => $valor) {
            foreach ($valor as $k => $v) {
                if ($_POST['elegida'] == $v) {
                    echo "<option  selected value='$v'>$v</option>";
                }else if($_POST['elegida']=="default" ){
                    return;
                }
                else {
                    echo "<option value='$v'>$v</option>";
                }

            }
        }
        ?>

    </select><br>
    <?php
}
?>