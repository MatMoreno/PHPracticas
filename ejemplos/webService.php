
<?php

for($i=0;$i<10;$i++) {
        $url = "https://api.themoviedb.org/3/movie/" . $i . "?language=es-ES&api_key=ceecc75430a69b2f8aaff2194fff4710";
        if (file_get_contents($url)===false) {
            echo "error";
        }else{
            $respuesta = json_decode(file_get_contents($url));
            echo $respuesta->title;

        }
}
?>

