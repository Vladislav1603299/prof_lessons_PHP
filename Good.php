<?php
abstract class GoodBasic{
    private $name;
    protected $quantity;


    function __construct($name, $quantity){
        $this->name = $name;
        $this->quantity = $quantity;
    }

    public function getName(){
        return $this->name . "<br>";
    }

    abstract function getPrice();
        
    
    abstract function getQuantity();
       

    abstract function quantityPriceAll();


    public function render(){
        echo $this->getName();
        echo $this->getPrice();
        echo $this->getQuantity();
        echo $this->quantityPriceAll();
    } 
}


class Good1 extends GoodBasic{
    private $bytes1Price;

    function __construct($name, $quantity, $bytes1Price){
        parent::__construct($name, $quantity);
        $this->bytes1Price = $bytes1Price;
    }

    public function getPrice(){
        return "Цена подписка на 1 месяц: "  . $this->bytes1Price . " руб.<br>";
    }

    public function getQuantity(){
        return "Всего: " . $this->quantity . " мес.<br>";
    }

    public function quantityPriceAll(){
        $total = $this->bytes1Price * $this->quantity;
        echo "Общая стоимость: " . $total . " руб.<br>";
        return $this->profit($total);
    }

    public function profit($total){
        $costGood = $total / 100 * 15;
        echo "Доход составляет: " . $costGood . " руб.<br><br>";
    }
};


class Good2 extends GoodBasic{
    private $things1Price;

    function __construct($name, $quantity, $things1Price){
        parent::__construct($name, $quantity);
        $this->things1Price = $things1Price;
    }

    public function getPrice(){
        return "Цена за 1 шт: " . $this->things1Price . " руб.<br>";
    }

    public function getQuantity(){
        return "Всего: " . $this->quantity . " шт.<br>";
    }

    public function quantityPriceAll(){
        $total = $this->things1Price * $this->quantity;
        echo "Общая стоимость: " . $total . " руб.<br>";
        return $this->profit($total);
    }

    public function profit($total){
        $costGood = $total /100 * 15;
        echo "Доход составляет: " . $costGood . " руб.<br><br>";
    }
};

class Good3 extends GoodBasic{
    private $kilogram1Price;

    function __construct($name, $quantity, $kilogram1Price){
        parent::__construct($name, $quantity);
        $this->kilogram1Price = $kilogram1Price;
    }

    public function getPrice(){
        return "Цена за 1 кг: " . $this->kilogram1Price . " руб.<br>";
    }

    public function getQuantity(){
        return "Всего: " . $this->quantity . " кг.<br>";
    }

    public function quantityPriceAll(){
        $total = $this->kilogram1Price * $this->quantity;
        echo "Общая стоимость: " . $total . " руб.<br>";
        return $this->profit($total);
       
        
    }

    public function profit($total){
        $costGood = $total / 100 * 15;
        echo "Доход составляет: " . $costGood . " руб.<br><br>";
    }
};

$example1 = new Good2("Телевизор", 3, 25000);
$example2 = new Good3("Яблоки", 10, 50);
$example3 = new Good1("Подписка на музыку", 2, 150);
$example1->render();
$example2->render();
$example3->render();






?>