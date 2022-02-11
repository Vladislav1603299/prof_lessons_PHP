<?php
include_once "config/DB.php";

class Bascet extends DB{
    public function addGoodBascet($userId, $goodId, $price){
        $sqlGetGood = "SELECT * FROM `bascet` WHERE `good_id`='$goodId' AND `user_id`='$userId'";
        $resGet = mysqli_query($this->connect, $sqlGetGood);
        if(mysqli_num_rows($resGet) == 0){
            $sql = "INSERT INTO `bascet`(`user_id`, `good_id`, `price`, `count`, `order_initial`) VALUES ('$userId', '$goodId', '$price', 1, 1)";
            $res = mysqli_query($this->connect, $sql);
            return $res;
        } else {
            $sqlUpdate = "UPDATE `bascet` SET `count`= count + 1 WHERE `good_id`='$goodId' AND `user_id`='$userId'";
            $resUpdate = mysqli_query($this->connect, $sqlUpdate);
            return $resUpdate;
        }
        
    }

    public function delGoodBascet($goodId, $userId){
        $sql = "DELETE FROM `bascet` WHERE `good_id`='$goodId' AND `user_id`='$userId'";
        $res = mysqli_query($this->connect, $sql);
        return $res;  
    }

    public function getGoodsBascet($userId){
        $sql = "SELECT * FROM goods LEFT JOIN bascet ON bascet.good_id = goods.id WHERE `user_id`=$userId";
        $res = mysqli_query($this->connect, $sql);
        return $res;
    }

    
    

}

?>