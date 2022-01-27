<?php
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  $loader = new Twig_Loader_Filesystem('theme');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('v_fotos.tmpl');
  
  $my_foto = scandir('img');
  unset($my_foto[0]);
  unset($my_foto[1]);
  $my_foto ;


  
  $content = $template->render(array(
    'fotos' => $my_foto
  ));


  echo $content;
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}

?>