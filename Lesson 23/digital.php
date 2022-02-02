<?php
declare(strict_types=1);
require_once "Abstract.php";
class DigitalProduct extends AbstractProduct
{
    public int $count;
    public function __construct (int $barcode, string $name, int $price, int $count){
        parent::__construct($barcode, $name, $price);
        $this->count = $count;
    }
    public function cost()
    {
        $cost = $this->price * $this->count / 2;
        echo "Доход с продажи $this->name, $this->barcode составил $cost рублей";
    }

    public function total()
    {
        $cost = $this->price * $this->count / 2;
        echo "Прибыль итого:" . self::$total += $cost;
    }
}
$a1 = new DigitalProduct(151666, 'test1', 12, 6);
$a1->cost();
echo '<br>';
$a1->total();
echo '<br>';

$a2 = new DigitalProduct(151666, 'test2', 10, 3);
$a2->cost();
echo '<br>';
$a2->total();