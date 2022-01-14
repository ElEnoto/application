<?php

$dir1 = "jpg";
$a = opendir($dir1);
$b = scandir($dir1);
foreach ($b as $value){
    if ($value == "." or $value == "..") {
        unset($b[array_search($value,$b)]);
    }
}

$dir2 = "html";
$c = opendir($dir2);
$d = scandir($dir2);
foreach ($d as $value){
    if ($value == "." or $value == "..") {
        unset($d[array_search($value,$d)]);
    }
}

foreach ($b as $jpg) {
    $f = "jpg/" . "$jpg";
    $data1[] = $f;
}

foreach ($d as $html) {
    $h = "html/" . "$html";
    $data2[] = $h;
}

for ($i=0, $j=0; $i <= (count($data1)-1), $j <= (count($data2)-1); $i++, $j++){

echo "<a href = $data2[$j] target='_blank'><img src=$data1[$i] style='width:280px; height: 200px; padding-right: 20px'></a>";
}
?>


<form action = "/index.php" method ="get"> <br>
<input type = "file" name = " "/> <br>
<input type = "button" value = "Submit"/>
</form>
<?php


//Задание 2
function learnCsv()
{
    if (is_readable("Customers.csv")) {
        $stream = fopen("Customers.csv", "a+");
        $array = array('Сергей', 'Смирнов', '+79851231212');
        fputcsv($stream, $array, ";");
        fclose($stream);
        $stream = fopen("Customers.csv", "rw");
        $stream1 = fopen("Customers1.csv", "w+");
        while (($data = fgetcsv($stream, null, ";"))) {
            $array1[] = $data;
        }
        unset ($array1[1]);
        foreach ($array1 as $item) {

            fputcsv($stream1, $item, ";");
        }
        var_dump($data);


        fclose($stream);
        fclose($stream1);
        unlink("Customers.csv");
    }
}
print_r(learnCsv());
echo '<br>';


//Задание 3
function countWords()
{
    $stream = fopen("SKAT.TXT", "r");
    $article = file_get_contents("SKAT.TXT");
    $words = preg_split("/[\s,]+/", $article);
    return count($words);
    fclose($stream);
}

echo(countWords());