<?php
include_once "config/DB.php";

class Goods extends DB{
    public function getAll(){
        $sql = "SELECT * FROM goods";
        $res = mysqli_query($this->connect, $sql);
        return $res;
    }

    public function getOneGood($id){
        $sql = "SELECT * FROM goods WHERE id = '" . $id . "'";
        $res = mysqli_query($this->connect, $sql);
        return $res;
    }
}

?>