<?php
if($_SESSION["tabla"]!="" && isset($_POST["db"])) {
    if ($_POST['elegida'] != "default" && $_POST['db'] != "default") {
        $tabla = $_SESSION["tabla"];
        $consulta = "select* from $tabla ;";
        $datos2 = mysqli_query(conexion(), $consulta);
        if(mysqli_num_rows($datos2)>0) {
            $cabecera = mysqli_fetch_assoc($datos2);
            foreach ($cabecera as $indice => $valor) {
                echo "<th style='border: 2px solid black;padding-right: 30px;padding-left: 30px'>" . $valor . "</th>";
            }
            echo "</tr>";

            while ($fila[] = mysqli_fetch_assoc($datos2)) {
            }

            foreach ($fila as $clave => $valor) {
                echo "<tr>";
                if (is_array($valor) || is_object($valor)) {
                    foreach ($valor as $k => $v) {
                        echo "<td style='border: 2px solid black'>" . $v . "</td>";

                    }
                }
                echo "</tr>";
            }
        } else{
            echo "</br> Tabla vacía";
        }
    }
}
?>