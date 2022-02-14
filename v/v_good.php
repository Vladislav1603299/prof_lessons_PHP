<div style="width: 100%; display: flex; justify-content: center;">
<?php while ($data = mysqli_fetch_assoc($good)) { ?>
    <div style="width: 700px; min-height: 320px; text-align: center; display:flex">
        <div>
            <img style="width: 300px" src="<?= $data['img'] ?>" alt="foto">
        </div>
        <div>
            <h1 style="margin-top: 50px"><?= $data['name'] ?></h1>
            <p style="font-size: 15px"><?= $data['discription'] ?></p>
            <h2 style="color: red; font-size: 25px"><?= $data[
                'price'
            ] ?> руб.</h2>
            <?php if (isset($_SESSION['user_id'])) { ?>
            <a href="index.php?c=bascet&act=addGood&id=<?= $data[
                'id'
            ] ?>&price=<?= $data[
    'price'
] ?>"><input style="margin-bottom: 10px" type="submit" value="Добавить в корзину"></a>
            <?php } else { ?>
                <p>Зарегестрируйтесь или войдите, чтобы добавлять товары в корзину!!!</p>
            <?php } ?>  
        </div>
    </div>
<?php } ?>

</div>