<?php
function leerSubtotalizar($file){
    if(!file_exists($file)){
        echo "fichero no encontrado";
        die();
    }else {
        $total=0;
        $fich_desc =fopen($file,"r");
        $dato = fgets($fich_desc);
        while (!feof($fich_desc)) {
            $sub=0;
            $c = explode("#", $dato)[0];
            $c_ant=$c;
            echo $c;
         while(!feof($fich_desc)&& ($c==$c_ant)){
             $sub+=(int)explode("#",$dato)[1];
             $dato = fgets($fich_desc);
             $c=explode("#", $dato)[0];
            }
           echo " Subtotal=".$sub."<br>";
           $total+=$sub;
        }
       echo "TOTAL=".$total;
    }
}

/**
 * @param $db
 */
function leerOrdenarSubtotalizarLibros($db){
    session_start();
    $_SESSION["databases"]=$db;
   require_once 'conection.php';
    $query="Select * from books order by category_id ASC";
    $con = conexion();
    $datos=$con->query($query);
    $total=0;

if($datos) {
    $i =0;
    while ($filas[$i] =  $datos->fetch_assoc()) {
      $category=(int)$filas[$i] ["category_id"];
      $category_ant=$category;
      $subtotal=0;
      echo "Libros de la categoría- ".$category."<br>";
      while ($category==$category_ant && $i<count($filas)){
          $nombre=$filas[$i]["title"];
          echo $nombre."<br>";
          $subtotal+=$precio=(int)$filas[$i]["price"];
          $i++;
          $filas[$i]=$datos->fetch_assoc();
          $category=(int)$filas[$i] ["category_id"];

          if($category==$category_ant){
              $nombre=$filas[$i]["title"];
              echo $nombre."<br>";
              $subtotal+=$precio=(int)$filas[$i]["price"];
              $i++;

          }
      }
      $total+=$subtotal;
      echo "Subtotal=".$subtotal."<br>";
    }
    echo "Precio Final=".$total;
    array_pop($filas);

}
session_destroy();
}

?>