<?php
include_once "m/Bascet.php";
include_once "C_Base.php";

class C_Bascet extends C_Base{
    public function action_addGood(){
        $goodId = $_GET['id'];
        $price = $_GET['price'];
        $userId = $_SESSION['user_id'];
        $getBascet = new Bascet();
        $addGood = $getBascet->addGoodBascet($userId, $goodId, $price);
        return header("Location: index.php?c=goods&act=getGood&id=$goodId");
    }

    public function action_myGoods(){
        $this->title .= "Корзина";
        $userId = $_SESSION['user_id'];
        $getGoodsBascet = new Bascet();
        $goods = $getGoodsBascet->getGoodsBascet($userId);
        $this->content = $this->Template('v/v_bascet.php', [
            'goods' => $goods
        ]);
    }

    public function action_delGood(){
        $goodId = $_GET['id'];
        $userId = $_SESSION['user_id'];
        $getBascet = new Bascet();
        $delGood = $getBascet->delGoodBascet($goodId, $userId);
        return header("Location: index.php?c=bascet&act=myGoods");
    }
}


?>