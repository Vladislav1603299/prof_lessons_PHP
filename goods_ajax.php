<?php
include_once "Database.php";
$getAll = $database->getGoodsAll('goods');
$num = mysqli_num_rows($getAll);
$i = $_POST['GOODS'];
$str = "";
$result = [];
$get = $database->getGoodsLimit('goods', $i);
    while($data = mysqli_fetch_assoc($get)){   
        $str .= "<div class='item' style='border: 1px solid black; width: 250px; text-align: center; margin-bottom: 20px' data-id=" . $data['id'] . "><img style='width: 200px' src='" . $data['image'] . "' alt='photo'><p>" . $data['name'] . "</p><p>" . $data['price'] . "</p></div>";
    }

$result['html'] = $str;
$result['allGoods'] = $num;
echo json_encode($result);
?>