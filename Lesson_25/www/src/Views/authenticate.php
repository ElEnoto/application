<?php
//require_once '../Controllers/IndexController.php'
//?>
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
    <title>Document</title>
</head>
<body>

<div style="padding: 15px">
    <h2>Войдите в систему!</h2><br>
    <form action="/?action=auth" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Имя пользователя:</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" class="form-control" name="password">
        </div>
        <input type="submit" class="btn btn-primary" value="Войти в систему">
    </form>
</div>

</body>
</html>
