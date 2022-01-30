<?php
declare(strict_types=1);
require_once "piece.php";
class DigitalProduct extends PieceProduct
{
    public function cost()
    {
        $cost = $this->price * $this->count / 2;
        echo "Доход с продажи $this->name, $this->barcode составил $cost рублей";
        return $cost;
    }

    public function total()
    {
        $cost = $this->price * $this->count / 2;
        static $total = 0;
        echo $total += $cost;
    }
}
