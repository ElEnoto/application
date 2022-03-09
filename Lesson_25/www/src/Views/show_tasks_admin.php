<?php
use Otus\View;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../Public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../Public/bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../../Public/bootstrap/css/bootstrap-reboot.css">
    <title><?php echo View::$title?></title>
</head>
<h2><?php echo View::$name ?></h2>
<body>
<?php if (View::$error){?>
<h2><?php echo View::$error;?></h2><?php
        }?>

<div style="padding: 15px">
    <form action="/?action=download_task" method="post" enctype="multipart/form-data">
        <input type="text" name="id" placeholder="Номер" /><br>
        <input type="text" name="task" placeholder="Задача" /><br>
        <input type="text" name="firstname" placeholder="Фамилия" /><br>
        <input type="text" name="lastname" placeholder="Имя" /><br>
        <input type="submit" value="Загрузить данные">


<table class="table">
    <thead>
    <tr>
        <th scope="col">№п/п</th>
        <th scope="col">Задача</th>
        <th scope="col">Ответственный</th>
        <th scope="col">Дата</th>
    </tr>
    </thead>
    <?php
    foreach (View::$content as $item) { ?>
    <tbody>
    <tr>
        <th scope="col"><?= $item['id'] ?></th>
        <td><?= $item['task'] ?></td>
        <td><?= $item['first_name'] . ' ' . $item['last_name'] ?></td>
        <td><?= $item['date'] ?></td>
    </tr>
    <?php } ?>


</body>
</html>
