<div style="width: 100%; display: flex; justify-content: center;">
<?php
    while ($data = mysqli_fetch_assoc($good)) {
    ?>
    <div style="border: 1px solid black; width: 300px; min-height: 320px; text-align: center">
        <img style="width: 130px" src="<?=$data['img']?>" alt="foto">
        <h1><?= $data['name'] ?></h1>
        <p><?= $data['discription'] ?></p>
        <h2 style="color: red;"><?= $data['price'] ?> руб.</h2>
        <?php if(isset($_SESSION['user_id'])){?>
        <a href="index.php?c=bascet&act=addGood&id=<?= $data['id'] ?>&price=<?= $data['price'] ?>"><input style="margin-bottom: 10px" type="submit" value="Добавить в корзину"></a>
        <?php } else { ?>
            <p>Зарегестрируйтесь или войдите, чтобы добавлять товары в корзину!!!</p>
        <?php
        }
        ?>
    </div>
<?php
    }
?>

</div>