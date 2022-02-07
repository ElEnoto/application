<?php

declare(strict_types=1);
require_once "Abstract.php";
class WeightProduct extends AbstractProduct
{
    public float $weight;
    public function __construct(int $barcode, string $name, int $price, float $weight)
    {
        parent::__construct($barcode, $name, $price);
        $this->weight = $weight;
    }

    public function cost(): float
    {
        $cost = $this->price * $this->weight;
        return $cost;;
    }
    public function total(): float
    {
        $cost = $this->price * $this->weight;
        return self::$total += $cost;
    }
}

$a1 = new WeightProduct(151666, 'test1', 12, 6.4);
$cost1 = $a1->cost();
echo "Доход с продажи $a1->name, $a1->barcode составил $cost1 рублей";
echo '<br>';
$total1 = $a1->total();
echo "Прибыль итого: $total1";
echo '<br>';

$a2 = new WeightProduct(151666, 'test2', 9, 3.7);
$cost2 = $a2->cost();
echo "Доход с продажи $a2->name, $a2->barcode составил $cost2 рублей";
echo '<br>';
$total2 = $a2->total();
echo "Прибыль итого: $total2";
echo '<br>';