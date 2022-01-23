<?php
declare(strict_types=1);
require_once 'db.php';


define("MAX_FILE_SIZE", 5000000);

function show()
{
    $content_copies = get_copies();
    $content_files = get_files();

    if (!empty($content_copies) and !empty ($content_files)) {
        foreach ($content_copies as $message_copies) {
            $copies = $message_copies['copies'];
            $array_copies[] = $copies;
        }
        foreach ($content_files as $message_files) {
            $files = $message_files['files'];
            $array_files[] = $files;
        }
        for ($i = 0, $j = 0; $i <= (count($array_copies) - 1), $j <= (count($array_files) - 1); $i++, $j++)
            echo "<a href=  $array_files[$i]  target='_blank'><img src= $array_copies[$j]  style='padding: 5px'></a>";
    }
}


function getSmallCopies($filename)
{
    $imageDir = "files/";
    $imageSmallDir = "copies/";
    $fileOriginal = $imageDir . $filename;
    $fileSmall = $imageSmallDir . $filename;
    if (!is_dir($imageSmallDir)) {
        mkdir($imageSmallDir);
    }
    if (!move_uploaded_file($_FILES["photo"]['tmp_name'], $fileOriginal)) {
        echo "Не удалось скопировать загруженный файл!";
    } else {
        if ($_FILES["photo"]['type'] == "image/jpeg") {
            $image = imagecreatefromjpeg($fileOriginal);
        } elseif ($_FILES["photo"]['type'] == "image/png") {
            $image = imagecreatefrompng($fileOriginal);
        }
        if (!empty($image)) {
            $imageSmall = imagescale($image, 200);
            if ($_FILES["photo"]['type'] == "image/jpeg") {
                imagejpeg($imageSmall, $fileSmall);
            } elseif ($_FILES["photo"]['type'] == "image/png") {
                imagepng($imageSmall, $fileSmall);
            }
        }
    }
}

function downloadPhoto()
{
    if (!empty($_FILES['photo'])) {
        if ($_FILES['photo']['name'] == '') {
            echo '<h3>Не удалось загрузить фотографию. Файл не выбран!</h3>' . '<br>';
            return show();
        }
        if ($_FILES['photo']['size'] >= MAX_FILE_SIZE) {
            echo "<h3>Не удалось загрузить фотографию. Файл не должен превышать размер в 5 Мб!</h3>" . '<br>';
            return show();
        }


        $name = basename($_FILES["photo"]['name']);
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $ext;
        if (!in_array($ext, ['png', 'jpeg', 'gif'])) {
            echo "<h3>Не удалось загрузить фотографию. 
        Файл должен иметь одно из известных расширений графических изображений (gif, jpeg или png)!</h3>" . '<br>';
            return show();
        }
        getSmallCopies($filename);
        $data_copies = "copies/$filename";
        $data_files = "files/$filename";
        add_photo($_SESSION['user_id'], $data_files, $data_copies);
        show();
    } else {
        return show();
    }
}

