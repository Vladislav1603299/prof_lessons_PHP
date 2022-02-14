<?php 
if (mysqli_num_rows($goods) == 0 || mysqli_num_rows($status) == 0) { ?>
    <p style="text-align: center">Ваша корзина пуста!</p>
    <div style="text-align: center">
        <a href="index.php">Перейти к заказам</a>
    </div>
     
<?php } else { ?>
    <?php while ($dataSum = mysqli_fetch_assoc($sum)) { ?>
<h3 style="text-align:center">Сумма всего: <?= $dataSum['sum_all'] ?> руб.</h3>
    <?php } ?>
<div style="display:flex; justify-content: space-around; flex-wrap: wrap;">
    <?php while ($data = mysqli_fetch_assoc($goods)) { ?>
    <div style="border: 1px solid black; width: 300px; min-height: 320px; text-align: center">
        <img style="width: 130px" src="<?= $data['img'] ?>" alt="foto">
        <h1><?= $data['name'] ?></h1>
        <p><?= $data['discription'] ?></p>
        <h2>Количество: <?= $data['count'] ?> шт.</h2>
        <h2 style="color: red;"><?= $data['price'] ?> руб.</h2>
        <a href="index.php?c=bascet&act=delGood&id=<?= $data[
            'good_id'
        ] ?>"><input style="margin-bottom: 10px" type="submit" value="Удалить из корзины"></a>
    </div>
    <?php } ?>
</div>
<br>
<br>
<div style="text-align: center">
    <a href="index.php?c=bascet&act=order"><input type="submit" value="Оформить заказ"></a>
</div>

<?php }

?>
