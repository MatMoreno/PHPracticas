<?php
if(isset($_POST["elegida"]) && isset($_POST["db"])) {
    if ($_POST['elegida'] != "default" && $_POST['db'] != "default") {
        echo $_POST["elegida"];
        $tabla = $_POST['elegida'];
        $consulta = "select* from $tabla ;";
        $datos2 = mysqli_query($conexion, $consulta);
        while ($fila[] = mysqli_fetch_assoc($datos2)) {
        }
        foreach ($fila as $clave => $valor) {
            foreach ($valor as $k => $v) {
                echo "<th style='border: 2px solid black;padding-right: 30px;padding-left: 30px'>" . $k . "</th>";

            }
            break;
        }
        echo "</tr>";

        foreach ($fila as $clave => $valor) {
            echo "<tr>";
            if (is_array($valor) || is_object($valor)) {
                foreach ($valor as $k => $v) {
                    echo "<td style='border: 2px solid black'>" . $v . "</td>";

                }
            }
            echo "</tr>";

        }
    }
}
?>