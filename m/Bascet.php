<?php
include_once 'config/DB.php';

class Bascet extends DB
{
    public function addGoodBascet($userId, $goodId, $price)
    {
        $sqlGetGood = "SELECT * FROM `bascet` WHERE `good_id`='$goodId' AND `user_id`='$userId' AND `order_initial` is NULL";
        $resGet = mysqli_query($this->connect, $sqlGetGood);
        if (mysqli_num_rows($resGet) == 0) {
            $sql = "INSERT INTO `bascet`(`user_id`, `good_id`, `price`, `count`, `order_initial`, `status`) VALUES ('$userId', '$goodId', '$price', 1, NULL, 0)";
            $res = mysqli_query($this->connect, $sql);
            return $res;
        } else {
            $sqlUpdate = "UPDATE `bascet` SET `count`= count + 1 WHERE `good_id`='$goodId' AND `user_id`='$userId'";
            $resUpdate = mysqli_query($this->connect, $sqlUpdate);
            return $resUpdate;
        }
    }

    public function delGoodBascet($goodId, $userId)
    {
        $sql = "DELETE FROM `bascet` WHERE `good_id`='$goodId' AND `user_id`='$userId'";
        $res = mysqli_query($this->connect, $sql);
        return $res;
    }

    public function getGoodsBascet($userId)
    {
        $sql = "SELECT * FROM goods LEFT JOIN bascet ON bascet.good_id = goods.id WHERE `user_id`=$userId AND `order_initial` is NULL";
        $res = mysqli_query($this->connect, $sql);
        return $res;
    }

    public function sumGoodsBascet($userId)
    {
        $sql = "SELECT SUM(`price` * `count`) as `sum_all` FROM `bascet` WHERE `user_id`=$userId AND `order_initial` is NULL";
        $res = mysqli_query($this->connect, $sql);
        return $res;
    }

    public function orderAllBy($userId, $datetime)
    {
        $sql = "INSERT INTO `orders`(`user_id`, `datetime`, `status`) VALUES ('$userId', '$datetime', 1)";
        $res = mysqli_query($this->connect, $sql);
        if ($res) {
            $sqlGetIdOrder = "SELECT * FROM `orders` WHERE `user_id`=$userId ORDER BY `id` DESC LIMIT 1";
            $resGetIdOrder = mysqli_query($this->connect, $sqlGetIdOrder);
            while ($data = mysqli_fetch_assoc($resGetIdOrder)) {
                $idOrder = $data['id'];
            }
            $sqlUpdate = "UPDATE `bascet` SET `order_initial`=$idOrder, `status`=1 WHERE `order_initial` is NULL AND `user_id`=$userId";
            $resUpdate = mysqli_query($this->connect, $sqlUpdate);

            $sqlGetOrderBascet = "SELECT * FROM `goods` LEFT JOIN `bascet` ON bascet.good_id = goods.id WHERE `user_id`=$userId AND `order_initial`= $idOrder";
            $resGetOrderBascet = mysqli_query(
                $this->connect,
                $sqlGetOrderBascet
            );
            return $resGetOrderBascet;
        }
    }

    public function status($userId)
    {
        $sql = "SELECT * FROM `bascet` WHERE `order_initial` is NULL AND `user_id`=$userId";
        $res = mysqli_query($this->connect, $sql);
        return $res;
    }
}

?>
