<?php
class Product
{
    public $mfr, $barcode, $type, $class, $name, $price, $color, $weight, $height, $width, $thickness;
    public function __construct($mfr, $barcode, $type, $class, $name, $price, $color, $weight, $height, $width, $thickness)
    {
        $this->mfr = $mfr;
        $this->barcode = $barcode;
        $this->type = $type;
        $this->class = $class;
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
        echo "Класс товара: $this->class;" ."<br>";
        echo "Наименование товара: $this->name;" ."<br>";
        echo "Стоимость: $this->price рублей;" ."<br>";
        echo "Цвет товара: $this->color;" ."<br>";
        echo "Вес: $this->weight кг;" ."<br>";
        echo "Габариты: $this->height мм х $this->width мм х $this->thickness мм";
    }
}



class WashingMachine extends Product
// Мы знаем, что все стиральные машины - это бытовая техника, поэтому type и class указывать не нужно,
// онb одинаковый
{
    public function __construct($mfr, $barcode, $name, $price, $color, $weight, $height, $width, $thickness){
        $this->mfr = $mfr;
        $this->barcode = $barcode;
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
        echo "Тип товара: Бытовая техника;" ."<br>";
        echo "Класс товара: Стиральная машина;" ."<br>";
        echo "Наименование товара: $this->name;" ."<br>";
        echo "Стоимость: $this->price рублей;" ."<br>";
        echo "Цвет товара: $this->color;" ."<br>";
        echo "Вес: $this->weight кг;" ."<br>";
        echo "Габариты: $this->height мм х $this->width мм х $this->thickness мм";
    }
}
class Indesit extends WashingMachine
// Мы знаем, что стиральные машины Indesit производятся в Италии, поэтому $mfr указывать не нужно,
// он одинаковый
{
    public function __construct($barcode, $name, $price, $color, $weight, $height, $width, $thickness){
        $this->barcode = $barcode;
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
        echo "Страна изготовитель: Италия;" ."<br>";
        echo "Штрих-код: $this->barcode;" ."<br>";
        echo "Тип товара: Бытовая техника;" ."<br>";
        echo "Класс товара: Стиральная машина;" ."<br>";
        echo "Наименование товара: $this->name;" ."<br>";
        echo "Стоимость: $this->price рублей;" ."<br>";
        echo "Цвет товара: $this->color;" ."<br>";
        echo "Вес: $this->weight кг;" ."<br>";
        echo "Габариты: $this->height мм х $this->width мм х $this->thickness мм";
    }

}

$a2 = new Indesit ('854632197000256','Indesit iwsd 51051', '15499',
    'Белый', '62', '850', '600', '400');
$a2 -> info();






