<?php
declare(strict_types=1);
abstract class AbstractProduct
{
    public int $barcode;
    public string $name;
    public int $price;
    public static int $total = 0;
    public function __construct (int $barcode, string $name, int $price)
    {
        $this->barcode = $barcode;
        $this->name = $name;
        $this->price = $price;
    }
    abstract function cost();
    abstract function total();
}



