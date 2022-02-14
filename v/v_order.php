
<?php
    if($_GET['status'] == "success"){?>
<h2>Ваш заказ находится в обработке. Подождите, пожалуйста. С Вами свяжутся для уточнения заказа. Спасибо!</h2>
<?php
    }else{
?>

<table style="border: 1px solid grey; border-collapse: collapse; text-align:center; margin:0 auto">
    <tr style="border: 1px solid grey;">
        <th style="border: 1px solid grey; width:250px">Good_name</th>
        <th style="border: 1px solid grey; width:250px">Good_count</th>
        <th style="border: 1px solid grey; width:250px">Good_price</th>
    </tr>
    <?php while($data = mysqli_fetch_assoc($goods)){?>
    <tr>
        <th name="name_g" style="border: 1px solid grey;"><?= $data['name'] ?></th>
        <th style="border: 1px solid grey;"><?= $data['count'] ?></th>
        <th style="border: 1px solid grey;"><?= $data['price'] ?></th>
    </tr>
    <?php } ?>
</table>
<table style="border: 1px solid grey; border-collapse: collapse; text-align:center; margin:0 auto">
    <tr style="border: 1px solid grey;">
        <th style="border: 1px solid grey; width:503px">Total:</th>
        <?php  while ($datasum = mysqli_fetch_assoc($sum)){?>
        <th style="border: 1px solid grey; width:250px"><?= $datasum['sum_all'] ?> $</th>
        <?php } ?>
    </tr>
</table>

<form action="index.php?c=bascet&act=orderBy"  style="text-align:center" method="post">
    <p>Введите Ваше ФИО:</p>
    <input type="text" required><br>
    <p>Введите Ваш Email:</p>
    <input type="email" required><br>
    <p>Введите Ваш адрес:</p>
    <input type="text" required><br>
    <p>Введите Ваш номер телефона:</p>
    <input type="text" required><br>
    <p>Ваш комментарий:</p>
    <textarea style="width: 170px; height:100px" cols="30" rows="10"></textarea><br>
    <input type="submit" value="Купить">
</form>


<?php
 
}

?>