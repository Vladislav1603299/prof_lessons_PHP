<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 	
</head>
<body>
	<div style="text-align: center" id="header">
		<h1><?= $title ?></h1>
	</div>
	
	<div style="text-align: center; display: flex; justify-content: space-around;" id="menu">
		<a style="text-decoration: none; font-family: fantasy; font-size: 20px; letter-spacing: 5px;" href="index.php">Каталог</a> | 
		<?php if ($user) {
      echo '<a style="text-decoration: none; font-family: fantasy; font-size: 20px; letter-spacing: 5px;" href="index.php?c=user&act=info">Личный кабинет</a> | <a style="text-decoration: none; font-family: fantasy; font-size: 20px; letter-spacing: 5px;" href="index.php?c=bascet&act=myGoods">Корзина</a> | <a style="text-decoration: none; font-family: fantasy; font-size: 20px; letter-spacing: 5px;" href="index.php?c=user&act=logout">Выйти (' .
          $user .
          ')</a>';
  } else {
      echo '<a style="text-decoration: none; font-family: fantasy; font-size: 20px; letter-spacing: 5px;" href="index.php?c=user&act=login">Войти</a> | <a style="text-decoration: none; font-family: fantasy; font-size: 20px; letter-spacing: 5px;" href="index.php?c=user&act=reg">Регистрация</a>';
  } ?>
	</div>
	
	<div id="content">
		<?= $content ?>
	</div>
	
	<div style="text-align: center" id="footer">
		Мой Сайт
	</div>
</body>
</html>
