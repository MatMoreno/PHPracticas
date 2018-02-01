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
           echo "Subtotal=".$sub."<br>";
           $total+=$sub;
        }
       echo "TOTAL=".$total;
    }
}

/**
 * @param $db
 */
function leerOrdenarSubtotalizarLibros($db){
    echo "<h2 style='color: red'>Listar y ordenar, con doble while en lectura.</h2><br>";
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
          $precio=(float)$filas[$i]["price"];
          echo $nombre."~~".$precio."<br>";
          $subtotal+=$precio=(float)$filas[$i]["price"];
          $i++;
          $filas[$i]=$datos->fetch_assoc();
          $category=(int)$filas[$i] ["category_id"];

          if($category==$category_ant){
              $nombre=$filas[$i]["title"];
              $precio=(float)$filas[$i]["price"];
              echo $nombre."~~".$precio."<br>";
              $subtotal+=(float)$filas[$i]["price"];
              $i++;
          }
      }
      $total+=$subtotal;
      echo "Subtotal=".$subtotal."<br><br>";
    }
    echo "Precio Final=".$total;
    array_pop($filas);
}
session_destroy();
}
function leerOrdenarSubtotalizarLibrosNombreCat($db)
{
        echo "<h2 style='color: red'>Listar y ordenar, con doble while en lectura.</h2><br>";
        session_start();
        $_SESSION["databases"] = $db;
        require_once 'conection.php';
        $query = "Select categories.category_name,books.title,books.price from books inner join categories on books.category_id = categories.category_id order by books.category_id";
        $con = conexion();
        $datos = $con->query($query);
        $total = 0;

        if ($datos) {
            $i = 0;
            while ($filas[$i] = $datos->fetch_assoc()) {
                $category = $filas[$i] ["category_name"];
                $category_ant = $category;
                $subtotal = 0;
                echo "Libros de la categoría- " . $category . "<br>";
                while ($category == $category_ant && $i < count($filas)) {
                    $nombre = $filas[$i]["title"];
                    $precio = (float)$filas[$i]["price"];
                    echo $nombre . "~~" . $precio . "<br>";
                    $subtotal += $precio = (float)$filas[$i]["price"];
                    $i++;
                    $filas[$i] = $datos->fetch_assoc();
                    $category = $filas[$i] ["category_name"];

                    if ($category == $category_ant) {
                        $nombre = $filas[$i]["title"];
                        $precio = (float)$filas[$i]["price"];
                        echo $nombre . "~~" . $precio . "<br>";
                        $subtotal += (float)$filas[$i]["price"];
                        $i++;
                    }
                }
                $total += $subtotal;
                echo "Subtotal=" . $subtotal . "<br><br>";
            }
            echo "Precio Final=" . $total;
            array_pop($filas);
        }
        session_destroy();

}
function listarAlumnos($db)
{
    echo "<h2 style='color: red'>Listar y ordenar alumnos y edades.</h2><br>";
    session_start();
    $_SESSION["databases"] = $db;
    require_once 'conection.php';
    $query = "Select grupos.nombre as nombreGrupo,alumnos.nombre,TIMESTAMPDIFF(YEAR,alumnos.fecha, CURDATE()) AS fecha from alumnos inner join grupos on alumnos.id_grupo = grupos.id order by alumnos.id_grupo";
    $con = conexion();
    $datos = $con->query($query);
    $total = 0;
    if ($datos) {
        $cambio=false;
        while ($filas = $datos->fetch_assoc()) {
            $mediaClase = 0;
            if($cambio==false){
                $cambio=true;
            $grupo = $filas["nombreGrupo"];
            $grupo_ant = $grupo;
            echo "Alumnos del grupo - " . $grupo . "<br>";
            }

            while ($grupo == $grupo_ant) {

                $nombre = $filas["nombre"];
                $fecha = (int)$filas["fecha"];
                echo $nombre . "~~" . $fecha . "<br>";
                $filas = $datos->fetch_assoc();
                $grupo = $filas["nombreGrupo"];
                $mediaClase+=(int)$filas["fecha"];

                if($grupo != $grupo_ant && $grupo!=null ){
                    $grupo = $filas["nombreGrupo"];
                    $grupo_ant = $grupo;

                    echo "Alumnos del grupo - " . $grupo . "<br>";
                    $cambio=true;
                    $nombre = $filas["nombre"];
                    $fecha = (int)$filas["fecha"];
                    echo $nombre . "~~" . $fecha . "<br>";
                    $filas = $datos->fetch_assoc();
                }
                $mediaClase+=$fecha;

                echo "caca";
            }

           // $total += $mediaClase;
           // echo "Subtotal=" . $mediaClase . "<br><br>";
        }
       // echo "Precio Final=" . $total;
    }
    session_destroy();
}

function ordenaAlumnos($db)
{
    echo "<h2 style='color: red'>Listar y ordenar alumnos y edades.</h2><br>";
    session_start();
    $_SESSION["databases"] = $db;
    require_once 'conection.php';
    $query="Select grupos.nombre as grupo,alumnos.nombre,TIMESTAMPDIFF(YEAR,alumnos.fecha, CURDATE()) AS fecha from alumnos inner join grupos on alumnos.id_grupo = grupos.id order by alumnos.id_grupo";    $con = conexion();
    $datos = $con->query($query);
    $total = 0;
    $grupo_ant="";
    $media=0;
    $cont=0;
    $cont_total=0;
    if ($datos) {
        while ($fila = $datos -> fetch_assoc()) {
            $grupo=$fila["grupo"];
            if($media!=0 && $grupo_ant!=$grupo){
                echo "La media es ".round($media/$cont)."<br><br>";
                $total+=$media;
                $media=0;
                $cont=0;
            }
            if($grupo_ant!=$grupo) {
               echo "Alumnos del Grupo: ".$grupo."<br>";
               $grupo_ant=$grupo;
            }
            if ($grupo_ant==$grupo ){
                $cont++;
                $cont_total++;
                $nombre = $fila["nombre"];
                $fecha = (int)$fila["fecha"];
                $media+=$fecha;
                echo $nombre . "~~" . $fecha . "<br>";
            }
        }
        echo "La media es". round($media/$cont)."<br>";
        $total+=$media;

        echo "<br><h3 style='margin-bottom: 40px'>Edad media final=".round($total/$cont_total)."</h3>";
    }
    session_destroy();
}
?>