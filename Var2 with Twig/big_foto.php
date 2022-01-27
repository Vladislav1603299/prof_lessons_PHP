<?php
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  $loader = new Twig_Loader_Filesystem('theme');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('v_bigFoto.tmpl');
  
  $img = $_GET['img'];


  
  $content = $template->render(array(
    'img' => $img
  ));


  echo $content;
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>