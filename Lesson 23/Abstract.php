<?php
declare(strict_types=1);
abstract class AbstractProduct
{
    public int $barcode;
    public string $name;
    public int $price;
    abstract function cost();
    abstract function total();
}



