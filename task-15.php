<?php
//Задание 1
$result = [];
$i = 0;
while ($i <= 100) {
    if ($i % 3 == 0 and $i !== 0) {
        $result[] = $i;
    }
    $i++;
}

echo implode(', ', $result).".".'<br>';
echo '<br>';

//Задание 2
$i = 0;
do {
    if ($i == 0) {
        echo "$i - это ноль.". '<br>';
    }
    else if ($i % 2 !== 0) {
        echo "$i - нечетное число." . '<br>';
    }
    else {
        echo "$i - четное число." . '<br>';
    }
    $i++;
}
while ($i <= 10);

echo '<br>';
echo '<br>';

//Задание 3
$areas = array (
    'Московская область' => array ('Москва', 'Зеленоград', 'Клин'),
    'Ленинградская область' => array ('Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'),
    'Рязанская область' => array ('Рязань', 'Касимов', 'Сасово'));

foreach($areas as $area => $cities){
    echo $area.':' .'<br>';
    foreach($cities as $key => $items){
        if ($key == count($cities)-1){
            echo $items.'<br>';
        }
        else {
            echo $items. ', ';}
    }
}

echo '<br>';
echo '<br>';

//Задание 4
function change($string){
    $latters = array ('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l',
        'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'ph', 'х' => 'h', 'ц' => 'tc', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ъ' => '\"', 'ы' => 'i',
        'ь' => '\'', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
        'Ё' => 'E', 'Ж' => 'J', 'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L',
        'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U',
        'Ф' => 'PH', 'Х' => 'H', 'Ц' => 'TC', 'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SCH', 'Ъ' => '\"', 'Ы' => 'I',
        'Ь' => '\'', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA');
    return strtr($string, $latters);

}
$string = 'Привет МИР*** ??!!';
echo change($string);

echo '<br>';
echo '<br>';

//Задание 5

function change1($string){
    $latters = array (' ' => '_');
    return strtr($string, $latters);

}
$string = '   Привет МИР*** ??!!   ';
echo change1($string);


echo '<br>';
echo '<br>';

//Задание 6
$navbar = array (
    "Home" => array ("Action", "Another action", "Something else here"),
    "Service" => array ("Action", "Another action", "Something else here"),
    "Works" => array ("Action", "Another action", "Something else here"),
    "News" => array ("Action", "Another action", "Something else here"));
foreach ($navbar as $items => $drops){
    echo "<h3>$items</h3>";
    echo "<ul>";
    foreach ($drops as $key => $value){
        echo "<li>$value</li>";
    }
    echo "</ul>";
}

echo '<br>';
echo '<br>';

//Задание 7
for ($i=0; $i < 10; print $i, $i++) {}

echo '<br>';
echo '<br>';

//Задание 8

$areas = array (
    'Московская область' => array ('Москва', 'Зеленоград', 'Клин'),
    'Ленинградская область' => array ('Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'),
    'Рязанская область' => array ('Рязань', 'Касимов', 'Сасово'));

foreach($areas as $area => $cities){
    echo $area.':' .'<br>';
    foreach($cities as $key => $items){
        $K = preg_split('//u',$items,-1,PREG_SPLIT_NO_EMPTY);
        $items1 = [];
        if ($K[0] == 'К'){
            $items1[] = $items;
            echo implode(', ', $items1).'<br>';
        }
    }
}


echo '<br>';
echo '<br>';

//Задание 9
function change3($string){
    $latters1 = array ('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l',
        'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'ph', 'х' => 'h', 'ц' => 'tc', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ъ' => '\"', 'ы' => 'i',
        'ь' => '\'', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
        'Ё' => 'E', 'Ж' => 'J', 'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L',
        'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U',
        'Ф' => 'PH', 'Х' => 'H', 'Ц' => 'TC', 'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SCH', 'Ъ' => '\"', 'Ы' => 'I',
        'Ь' => '\'', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA');
    $latters2 = array (' ' => '_');
    $change4 = strtr($string, $latters1);
    return strtr($change4, $latters2);

}

$string = '   Привет МИР*** ??!!   ';
echo change3($string);