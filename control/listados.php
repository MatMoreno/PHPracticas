<?php
function caca($file){
    if(!file_exists($file)){
    echo "fichero no encontrado";
    }else {
        $c1_total=0;
        $c1_sub=0;
        $fich_desc =fopen($file,"r");
        $c1_ant="";
        while (!feof($fich_desc)) {

            $dato = fgets($fich_desc);
            $c1 = explode("#", $dato)[0];
            if($c1_ant==""){
                $c1_ant=$c1;
            }
            while (!feof($fich_desc) && $c1==$c1_ant){
                $c2 = (int)explode("#", $dato)[1];
                $c1_sub+=$c2;
                $dato = fgets($fich_desc);

            }
            $c1_ant="";
            $c1_total+=$c1_sub;
        }
        fclose($fich_desc);

    }

}
function caca2($file){
    if(!file_exists($file)){
        echo "fichero no encontrado";
    }else {
        $c1_total=0;
        $c1_sub=0;
        $fich_desc =fopen($file,"r");

        while (!feof($fich_desc)) {
            $dato = fgets($fich_desc);
            $c1 = explode("#", $dato)[0];
            $c1_ant=$c1;
            echo "<br>".$c1;
            while(!feof($fich_desc) && $c1_ant==$c1){
                $c1 = explode("#", $dato)[0];
                $c2 = (int)explode("#", $dato)[1];
                $c1_sub+=$c2;
                $dato = fgets($fich_desc);
            }
            echo "<br>Subtotal"." = ".$c1_sub;
        }

    }

}

?>