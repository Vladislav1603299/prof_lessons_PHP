<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Foto</title>
</head>
<body>
    <header class="header">
        <h1 class="header_name">Ваше фото <?= $_GET['img'] ?></h1>
    </header>
    <main class="main_foto">
        <h3>Нажмите на фото, чтобы увеличить его</h3>
        <img class="foto" src="../img/<?= $_GET[
            'img'
        ] ?>" alt="foto" style="width:200px;" onclick="this.style.width='1250px'" onmouseout="this.style.width='200px'" ><br><br>
        <a class="end" href="<?= $_SERVER[
            'HTTP_REFERER'
        ] ?>">Вернуться назад</a>
    </main>
    <footer>

    </footer>
</body>
</html>