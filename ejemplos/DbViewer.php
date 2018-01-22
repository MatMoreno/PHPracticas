<h1 style="float: right;">Tablas base de datos Shop</h1><br>
<form style="margin-top: 8%" method="POST" action="?section=DbViewer.php">
    <?php
    include ("control/listarDB.php");
    include ("control/listarTablas.php");
    ?>
    <table style="margin:auto">
        <tr>
            <?php
            include ("control/rellenarCampos.php");
            ?>
        </tr>
    </table>

</form>
