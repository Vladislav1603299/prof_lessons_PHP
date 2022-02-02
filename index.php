<?php
include_once "Database.php";
$i = $_GET['goods']? $_GET['goods']: 0;
$get = $database->getGoodsLimit('goods', $i);
$getAll = $database->getGoodsAll('goods');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/ajax_script.js"></script>
    <title>Document</title>
</head>
<body>
    <?php include_once "templates/header.php"?>
    <main>
        <div class="list" style="display: flex; justify-content: space-around; flex-wrap:wrap; width: 1300px; margin: 0 auto">
        <?php
            while($data = mysqli_fetch_assoc($get)){?>
                <div class="item" style="border: 1px solid black; width: 250px; text-align: center; margin-bottom: 20px" data-id=<?= $data['id']?>>
                    <img style="width: 200px" src="<?= $data['image'] ?>" alt="photo">
                    <p><?= $data['name'] ?></p>
                    <p><?= $data['price'] ?></p>
                </div>
            <?php
            }
            ?>
        </div>
        <div style="text-align: center; margin-top: 20px">
                <a id="btn" href="">Еще</a>
        </div>
    </main>
</body>
</html>

