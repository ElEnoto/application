<?php

declare(strict_types=1);
require_once "Abstract.php";
class WeightProduct extends AbstractProduct
{
    public int $weight;
    public function __construct($barcode, $name, $price, $weight)
    {
        $this->barcode = $barcode;
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }

    public function cost()
    {
        $cost = $this->price * $this->weight;
        echo "Доход с продажи $this->name, $this->barcode составил $cost рублей";
    }
    public function total()
    {
        $cost = $this->price * $this->weight;
        static $total = 0;
        echo $total += $cost;
    }
}
