<?php

define("MAX_FILE_SIZE", 5000000);
?>
    <form action="task-17.php" method="post" enctype="multipart/form-data">
        <input type="file" name="photo">
        <br>
        <input type="submit" value="Отправить">
    </form>

<?php
//if(function_exists('imagescale')) echo 'Библиотека подключена'; else echo 'no';

if (!empty($_FILES['photo'])) {
    $messages_files = [];
    $messages_copies = [];
    if ($_FILES['photo']['name'] == '') {
        echo 'Файл не выбран!';
        return;
    }
    if ($_FILES['photo']['size'] >= MAX_FILE_SIZE) {
        echo "Файл не должен превышать размер в 5 Мб!";
        return;
    }

    if (file_exists('data_copies.json') and file_exists('data_files.json')) {
        $content_files = json_decode(file_get_contents('data_files.json'), true);
        $messages_files = $content_files;
        $content_copies = json_decode(file_get_contents('data_copies.json'), true);
        $messages_copies = $content_copies;
    }

    $name = basename($_FILES["photo"]['name']);
    $ext = pathinfo($name, PATHINFO_EXTENSION);

    if (!in_array($ext, ['png', 'jpeg', 'gif'])) {
        echo "Файл должен иметь одно из известных расширений графических изображений (gif, jpeg или png)!";
        return;
    }
    copy($_FILES["photo"]['tmp_name'], "copies/$name");
    move_uploaded_file($_FILES["photo"]['tmp_name'], "files/$name");


//    if (!move_uploaded_file($_FILES["photo"]['tmp_name'], "files/$name")) {
//        echo "Не удалось скопировать загруженный файл!";}
//
//    $imageDir = "files/";
//    $imageSmallDir = "copies/";
//    $fileOriginal = $imageDir . $name;
//    $fileSmall = $imageSmallDir . $name;
//    if (!is_dir($imageSmallDir)) {
//        mkdir($imageSmallDir);
//    }
//    if (!move_uploaded_file($_FILES["photo"]['tmp_name'], $fileOriginal)) {
//        echo "Не удалось скопировать загруженный файл!";
//    } else {
//        if ($_FILES["photo"]['type'] == "image/jpeg") {
//            $image = imagecreatefromjpeg($fileOriginal);
//        } elseif ($_FILES["photo"]['type'] == "image/png") {
//            $image = imagecreatefrompng($fileOriginal);
//        }
//        if (!empty($image)) {
//            $imageSmall = imagescale($image, 200);
//            if ($_FILES["photo"]['type'] == "image/jpeg") {
//                imagejpeg($imageSmall, $fileSmall);
//            } elseif ($_FILES["photo"]['type'] == "image/png") {
//                imagepng($imageSmall, $fileSmall);
//            }
//        }
//    }


    $data_copies['photo'] = "copies/$name";
    $data_files['photo'] = "files/$name";


    $messages_copies[] = $data_copies;
    $messages_files[] = $data_files;
    file_put_contents('data_copies.json', json_encode($messages_copies));
    file_put_contents('data_files.json', json_encode($messages_files));

    if (file_exists('data_copies.json') and file_exists('data_files.json')) {
        $content_copies = json_decode(file_get_contents('data_copies.json'), true);
        $content_files = json_decode(file_get_contents('data_files.json'), true);
        foreach ($content_copies as $message_copies) {
            $copies = $message_copies['photo'];
            $array_copies[] = $copies;
        }
        foreach ($content_files as $message_files) {
            $files = $message_files['photo'];
            $array_files[] = $files;
        }

        if (!empty($array_files) and !empty($array_copies)) {
            for ($i = 0, $j = 0; $i <= (count($array_copies) - 1), $j <= (count($array_files) - 1); $i++, $j++)
                echo "<a href= $array_files[$i] target='_blank'><img src= $array_copies[$j]  style='width:280px; height: 200px; padding: 10px'></a>";
        }
    }


} else {
    if (file_exists('data_copies.json') and file_exists('data_files.json')) {
        $content_copies = json_decode(file_get_contents('data_copies.json'), true);
        $content_files = json_decode(file_get_contents('data_files.json'), true);
        foreach ($content_copies as $message_copies) {
            $copies = $message_copies['photo'];
            $array_copies[] = $copies;
        }
        foreach ($content_files as $message_files) {
            $files = $message_files['photo'];
            $array_files[] = $files;
        }

        if (!empty($array_files) and !empty($array_copies)) {
            for ($i = 0, $j = 0; $i <= (count($array_copies) - 1), $j <= (count($array_files) - 1); $i++, $j++)
                echo "<a href=  $array_files[$i]  target='_blank'><img src= $array_copies[$j]  style='width:280px; height: 200px; padding: 10px'></a>";
        }
    }
}

