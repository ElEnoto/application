<?php
declare(strict_types=1);
require_once 'db.php';
require_once 'index.php';

define("MAX_FILE_SIZE", 5000000);

$err = '';?>


<?php


function showAllBooksForUsers()
{
    if (empty($_POST['title'])) {
        $content = getAllInformation();
        if (!empty ($content)) { ?>
            <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Обложка</th>
                <th scope="col">Название книги</th>
                <th scope="col">Автор</th>
                <th scope="col">Количество страниц</th>
                <th scope="col">Год издания</th>
            </tr>
            </thead>
            <?php
            foreach ($content as $item) { ?>
                <tbody>
                <tr>
                    <th scope="col"><?= $item['id_book'] ?></th>
                    <td><?php
                        $a = 'picture_file';
                        $b = 'picture_copy';?>
                        <a data-fancybox href='<?=$item[$a]?>'><img src= <?=$item[$b]?>  style='padding: 5px'></a></td>
                    <td><?= $item['name_book'] ?></td>
                    <td><?= $item['first_name'] . ' ' . $item['last_name'] ?></td>
                    <td><?= $item['page_number'] ?></td>
                    <td><?= $item['year_of_publishing'] ?></td>
                </tr>
            <?php }
        } else {
            global $err;
            $err = 'Библиотека еще не сформирована';
            echo "<h3 style='padding: 15px'>$err</h3>";
        }
    } else {
        $content = getSomeInformation(htmlspecialchars($_POST['title']));
        if (!empty($content)) { ?>
            <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Обложка</th>
                <th scope="col">Название книги</th>
                <th scope="col">Автор</th>
                <th scope="col">Количество страниц</th>
                <th scope="col">Год издания</th>
            </tr>
            </thead>
            <?php foreach ($content as $item) { ?>
                <tbody>
                <tr>
                    <th scope="col"><?= $item['id_book'] ?></th>
                    <td><?php $a = 'picture_file';
                        $b = 'picture_copy';?>
                        <a data-fancybox href='<?=$item[$a]?>'><img src= <?=$item[$b]?>  style='padding: 5px'></a></td>
                    <td><?= $item['name_book'] ?></td>
                    <td><?= $item['first_name'] . ' ' . $item['last_name'] ?></td>
                    <td><?= $item['page_number'] ?></td>
                    <td><?= $item['year_of_publishing'] ?></td>
                </tr>
            <?php }
        } else {
            global $err;
            $err = 'Информация не найдена';
            echo "<h3 style='padding: 15px'>$err</h3>";
        }
    } ?>
    </tbody>
</table>
<?php }


function showAllBooksForAdmin()
{
    ?>
<form action="index.php" method="post">
    <?php if (empty($_POST['title'])) {
    $content = getAllInformation();
    if (!empty ($content)) { ?>

        <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Обложка</th>
            <th scope="col">Название книги</th>
            <th scope="col">Автор</th>
            <th scope="col">Количество страниц</th>
            <th scope="col">Год издания</th>
            <th scope="col">Удалить данные</th>
        </tr>
        </thead>
        <?php
        foreach ($content as $item) {?>

            <tbody>
            <tr>
                    <th scope="col"><?= $item['id_book'] ?></th>
                    <td><?php
                        $a = 'picture_file';
                        $b = 'picture_copy';?>
                        <a data-fancybox href='<?=$item[$a]?>'><img src= <?=$item[$b]?>  style='padding: 5px'></a>

                    </td>

                    <td><?= $item['name_book'] ?></td>
                    <td><?= $item['first_name'] . ' ' . $item['last_name'] ?></td>
                    <td><?= $item['page_number'] ?></td>
                    <td><?= $item['year_of_publishing'] ?></td>
                    <td>
                        <input type="checkbox" class="form-check-input" name="id_book[]" value="<?= $item['id_book'] ?>">
                    </td>
            </tr>

        <?php }
    } else {
        global $err;
        $err = 'Библиотека еще не сформирована';
        echo "<h3 style='padding: 15px'>$err</h3>";
    }
} else {
    $content = getSomeInformation(htmlspecialchars($_POST['title']));
    if (!empty($content)) { ?>
        <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Обложка</th>
            <th scope="col">Название книги</th>
            <th scope="col">Автор</th>
            <th scope="col">Количество страниц</th>
            <th scope="col">Год издания</th>
            <th scope="col">Удалить данные</th>
        </tr>
        </thead>
        <?php foreach ($content as $item) { ?>
            <tbody>
            <tr>
                <th scope="col"><?= $item['id_book'] ?></th>
                <td><?php $a = 'picture_file';
                    $b = 'picture_copy';?>
                    <a data-fancybox href='<?=$item[$a]?>'><img src= <?=$item[$b]?>  style='padding: 5px'></a></td>
                <td><?= $item['name_book'] ?></td>
                <td><?= $item['first_name'] . ' ' . $item['last_name'] ?></td>
                <td><?= $item['page_number'] ?></td>
                <td><?= $item['year_of_publishing'] ?></td>
                <td>
                    <input type="checkbox" class="form-check-input" name="id_book[]" value="<?= $item['id_book'] ?>">
                </td>
            </tr>
        <?php }
    } else {
        global $err;
        $err = 'Информация не найдена';
        echo "<h3 style='padding: 15px'>$err</h3>";
    }
} ?>
    </tbody>
</table>
<input type="submit" class="btn btn-primary" name="delete" value="Удалить">
</form>
    <?php
    if (!empty ($_POST['id_book'])) {
        var_dump($_POST);
        echo '<br>';
        foreach ($_POST['id_book'] as $contentId) {
            echo $contentId;
            deletePicture($contentId);
            deleteAuthors($contentId);
            deleteBooks ($contentId);
        }

        return showAllBooksForAdmin();

    }
//    var_dump($_POST['id']);
}







//
//function show1()
//{
//    $content_copies = get_copies();
//    $content_files = get_files();
//
//    if (!empty($content_copies) and !empty ($content_files)) {
//        foreach ($content_copies as $message_copies) {
//            $copies = $message_copies['copies'];
//            $array_copies[] = $copies;
//        }
//        foreach ($content_files as $message_files) {
//            $files = $message_files['files'];
//            $array_files[] = $files;
//        }
//        for ($i = 0, $j = 0; $i <= (count($array_copies) - 1), $j <= (count($array_files) - 1); $i++, $j++)
//            echo "<a href=  $array_files[$i]  target='_blank'><img src= $array_copies[$j]  style='padding: 5px'></a>";
//    }
//}


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


function addBook()
{
    if (empty($_POST['firstname']) and empty($_POST['lastname']) and empty($_POST['name_book'])
        and empty($_POST['page_number']) and empty($_POST['year_of_publishing']) and empty($_FILES['photo'])) {
        return showAllBooksForAdmin();
    } elseif (!empty($_POST['firstname']) and !empty($_POST['lastname']) and !empty($_POST['name_book'])
        and !empty($_POST['page_number']) and !empty($_POST['year_of_publishing']) and !empty($_FILES['photo'])) {

        $contentData = [];
        $contentData['FIRSTNAME'] = $_POST['firstname'];
        $contentData['LASTNAME'] = $_POST['lastname'];
        $contentData['NAME_BOOK'] = $_POST['name_book'];
        $contentData['PAGE_NUMBER'] = $_POST['page_number'];
        $contentData['YEAR_OF_PUBLISHING'] = $_POST['year_of_publishing'];
        if ($_FILES['photo']['size'] >= MAX_FILE_SIZE) {
            global $err;
            $err = 'Не удалось загрузить данные. Файл не должен превышать размер в 5 Мб!';
            echo "<h3 style='padding: 15px'>$err</h3>". '<br>';
            return showAllBooksForAdmin();
        }

        $name = basename($_FILES["photo"]['name']);
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $ext;
        if (!in_array($ext, ['png', 'jpeg', 'gif'])) {
            global $err;
            $err = 'Не удалось загрузить данные. 
            Файл должен иметь одно из известных расширений графических изображений (gif, jpeg или png)!';
            echo "<h3 style='padding: 15px'>$err</h3>". '<br>';
            return showAllBooksForAdmin();
        }
        getSmallCopies($filename);
        $data_copies = "copies/$filename";
        $data_files = "files/$filename";
        $contentData['PICTURE_FILE'] = $data_files;
        $contentData['PICTURE_COPY'] = $data_copies;
        add_photo($_SESSION['user_id'], $data_files, $data_copies);
        insertContentAuthors($contentData);
        insertContentBooks($contentData);
        insertContentAuthorsBooks($contentData);
        insertContentPicture($contentData);
        return showAllBooksForAdmin();

    } else {
//        global $err;
//        $err = 'Не удалось загрузить данные. Для загрузки данных необходимо заполнить все ячейки';
//        echo "<h3 style='padding: 15px'>$err</h3>". '<br>';
//        return showAllBooksForAdmin();

        echo 'Не удалось загрузить данные. Для загрузки данных необходимо заполнить все ячейки';

        return showAllBooksForAdmin();

    }



}














//
//function downloadPhoto()
//{
//    if (!empty($_FILES['photo'])) {
//        if ($_FILES['photo']['name'] == '') {
//            echo '<h3>Не удалось загрузить обложку. Файл не выбран!</h3>' . '<br>';
//            return show();
//        }
//        if ($_FILES['photo']['size'] >= MAX_FILE_SIZE) {
//            echo "<h3>Не удалось загрузить обложку. Файл не должен превышать размер в 5 Мб!</h3>" . '<br>';
//            return show();
//        }
//
//
//        $name = basename($_FILES["photo"]['name']);
//        $ext = pathinfo($name, PATHINFO_EXTENSION);
//        $filename = uniqid() . '.' . $ext;
//        if (!in_array($ext, ['png', 'jpeg', 'gif'])) {
//            echo "<h3>Не удалось загрузить обложку.
//        Файл должен иметь одно из известных расширений графических изображений (gif, jpeg или png)!</h3>" . '<br>';
//            return show();
//        }
//        getSmallCopies($filename);
//        $data_copies = "copies/$filename";
//        $data_files = "files/$filename";
//        add_photo($_SESSION['user_id'], $data_files, $data_copies);
//        show();
//    } else {
//        return show();
//    }
//}

