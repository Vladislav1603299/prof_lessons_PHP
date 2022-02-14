<div style="display:flex; justify-content: space-around; flex-wrap: wrap;">
    <?php while ($data = mysqli_fetch_assoc($goods)) { ?>
    <a style="text-decoration: none; " href="index.php?c=goods&act=getGood&id=<?= $data[
        'id'
    ] ?>">
    <div style="border: 1px solid black; width: 300px; min-height: 320px; text-align: center">
        <img style="width: 130px" src="<?= $data['img'] ?>" alt="foto">
        <h1><?= $data['name'] ?></h1>
        <p><?= $data['discription'] ?></p>
        <h2 style="color: red;"><?= $data['price'] ?> руб.</h2>
    </div>
    </a>
    <?php } ?>
</div>