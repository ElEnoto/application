<?php
declare(strict_types=1);
require_once 'db.php';
?>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap-grid.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap-reboot.css">
<form action="index.php" method="post">
    <!--    <input type="text" name="username"><br>-->
    <!--    <input type="text" name="message"><br>-->
    <input class="form-control" type="text" name="title" placeholder="Введите название книги или ФИО автора"><br>
    <input type="submit" class="btn btn-primary" value="Поиск">
</form>


<?php
?>

<?php
if (empty($_POST['title'])) {
$content = getAllInformation(); ?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
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
        <td><?= $item['name_book'] ?></td>
        <td><?= $item['first_name'] . ' ' . $item['last_name'] ?></td>
        <td><?= $item['page_number'] ?></td>
        <td><?= $item['year_of_publishing'] ?></td>
    </tr>
    <?php }
    }
    else {
    $content = getSomeInformation(htmlspecialchars($_POST['title']));
    if (!empty($content)){ ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
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
            <td><?= $item['name_book'] ?></td>
            <td><?= $item['first_name'] . ' ' . $item['last_name'] ?></td>
            <td><?= $item['page_number'] ?></td>
            <td><?= $item['year_of_publishing'] ?></td>
        </tr>
        <?php }}
    else {
        echo 'Информация не найдена';
    }}?>
        </tbody>
    </table>




