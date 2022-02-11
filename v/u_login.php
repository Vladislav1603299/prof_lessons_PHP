<h3><?php if(isset($text)){?><h2 style="text-align: center;"><?= $text ?></h2><?php }?></h3>
<br>
<form style="border: 1px solid black; width: 250px; text-align: center; margin: 0 auto" method="post">
	<br><br>
	<input type="text" name="login" placeholder="Введите логин" required><br><br>
	<input type="password" name="password" placeholder="Введите пароль" required><br><br>
	<input type="submit" name="button" value="Войти"><br><br>
</form>