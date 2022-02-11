<?php
include_once "m/Goods.php";
include_once "C_Base.php";

class C_Goods extends C_Base{
    public function action_index(){
        $this->title .= "Каталог";
        $get_goods = new Goods();
        $goods = $get_goods->getAll();
        $this->content = $this->Template('v/v_goods.php', [
            'goods' => $goods
        ]);
    }

    public function action_getGood(){
        $id = $_GET['id'];
        if(isset($id)){
            $this->title .= "Карточка товара";
            $get_good = new Goods();
            $good = $get_good->getOneGood($id);
            $this->content = $this->Template('v/v_good.php', [
                'good' => $good
            ]); 
        }
    }
}

?>