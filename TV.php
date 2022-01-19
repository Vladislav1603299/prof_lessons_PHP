<?php
class TV{
    protected $title;
    protected $price;
    protected $color;
    protected $nameFoto;


    function __construct($title, $price, $color, $nameFoto){
        $this->title = $title;
        $this->price = $price;
        $this->color = $color;
        $this->nameFoto = $nameFoto;
    }

    public function showProduct(){?>

        <div style="border:1px solid black; width: 400px; text-align: center">
            <img style="width:200px" src="img/<?=$this->nameFoto?>" alt="photo">
            <h3><?= $this->title ?></h3>
            <p><?= $this->color ?></p>
            <p style="color:red"><?= $this->price ?> тыс.рублей</p>
        </div>

<?php
    }

};


class TVDiscount extends TV{
    private $discount;

    function __construct($title, $price, $color, $nameFoto, $discount){
        parent::__construct($title, $price, $color, $nameFoto);
        $this->discount = $discount;
    }

    public function showProduct(){?>
        
        <div style="border:1px solid black; width: 400px; text-align: center">
            <?php parent::showProduct() ?>
            <h2 style="color:green">Скидка <?=$this->discount?> %.</h2>
        </div>

<?php
    }
};







$product1 = new TVDiscount("Samsung", 40000, "Черный", "tv_samsung_black.png", 30);
$product2 = new TV("Sony", 45000, "Черный", "tv_sony_black.png");
$product2->showProduct();
?>

<br>
<br>
<br>
<?php
$product1->showProduct();



?>