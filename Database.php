<?php

class Database{
    private $connect;
    const HOST = 'localhost';
    const LOGIN = 'root';
    const PASS = 'root';
    const NAME_BD = 'goods_catalog';

public function connect(){

    $this->connect = mysqli_connect(self::HOST, self::LOGIN, self::PASS, self::NAME_BD)  or die('Error: ' . mysqli_error($this->connect));
    if (!mysqli_set_charset($this->connect, 'utf8')) {
        printf('Error: ' . mysqli_error($this->connect));
    }

}

public function getGoodsLimit($table, $id){
    $sql = "SELECT * FROM {$table} where id>$id limit 5";
    $res = mysqli_query($this->connect, $sql); 
    return $res;
}

public function getGoodsAll($table){
    $sql = "SELECT * FROM {$table}";
    $res = mysqli_query($this->connect, $sql); 
    return $res;
}
}


$database = new Database();
$database->connect();
?>