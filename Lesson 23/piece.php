<?php
declare(strict_types=1);
require_once "Abstract.php";
class PieceProduct extends AbstractProduct
{
    public int $count;
    public function __construct ($barcode, $name, $price, $count){
        $this->barcode = $barcode;
        $this->name = $name;
        $this->price = $price;
        $this->count = $count;
    }
    public function cost()
    {
        $cost = $this->price * $this->count;
        echo "Доход с продажи $this->name, $this->barcode составил $cost рублей";
        return $cost;
    }
    public function total()
    {
        $cost = $this->price * $this->count;
        static $total = 0;
        echo $total += $cost;
    }
}