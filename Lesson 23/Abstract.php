<?php
declare(strict_types=1);
abstract class AbstractProduct
{
    public int $barcode;
    public string $name;
    public float $price;
    public static float $total = 0;
    public function __construct (int $barcode, string $name, float $price)
    {
        $this->barcode = $barcode;
        $this->name = $name;
        $this->price = $price;
    }
    abstract function cost();
    abstract function total();
}



