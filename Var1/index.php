<?php
include_once "view/view.php";



$my_foto = scandir('img');

$content = Templater('theme/v_fotos.php', 
    array(
        'fotos' => $my_foto
    )
);

if($_GET['img']){
    $bigFoto = Templater('theme/v_bigFoto.php');
    echo $bigFoto;
}

echo $content;

?>