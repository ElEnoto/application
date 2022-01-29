<?php
class Product
{
    public $mfr, $barcode, $type, $name, $price, $color, $weight, $height, $width, $thickness;
    public function __construct($mfr, $barcode, $type, $name, $price, $color, $weight, $height, $width, $thickness)
    {
        $this->mfr = $mfr;
        $this->barcode = $barcode;
        $this->type = $type;
        $this->name = $name;
        $this->price = $price;
        $this->color = $color;
        $this->weight = $weight;
        $this->height = $height;
        $this->width = $width;
        $this->thickness = $thickness;
    }

    public function info()
    {
        echo "Страна изготовитель: $this->mfr;" ."<br>";
        echo "Штрих-код: $this->barcode;" ."<br>";
        echo "Тип товара: $this->type;" ."<br>";
        echo "Наименование товара: $this->name;" ."<br>";
        echo "Стоимость: $this->price рублей;" ."<br>";
        echo "Цвет товара: $this->color;" ."<br>";
        echo "Вес: $this->weight кг;" ."<br>";
        echo "Габариты: $this->height мм х $this->width мм х $this->thickness мм";
    }
}



class WashingMachine extends Product
{

}
$a1 = new WashingMachine ('Италия', '854632197000256', 'Бытовая техника',
    'Indesit', '15499', 'Белый', '62', '850', '600', '400');
$a1 -> info();









