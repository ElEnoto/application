<?php
declare(strict_types=1);
session_start();
require_once 'db.php';
require_once "function.php";
?>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap-grid.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap-reboot.css">
<link rel="stylesheet" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">

<?php
if (!empty($_COOKIE['remember_token']) && empty($_SESSION['user_id'])) {
    $result = authenticate_by_token($_COOKIE['remember_token']);
    if ($result) {
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['name'] = $result['username'];
    }
}
if (!empty($_GET['action']) && $_GET['action'] == 'auth' && empty($_SESSION['user_id'])) {
    $result = authenticate($_POST['username'], $_POST['password']);
    if (!$result) {
        echo '<h2>Невреное имя пользователя или пароль!</h2><br>';
    } else {
        $_SESSION['user_id'] = $result;
        $_SESSION['name'] = $_POST['username'];
        if (!empty($_POST['remember_me']) && $_POST['remember_me'] == 'on') {
            $token = uniqid();
            set_remember_token($_SESSION['user_id'], $token);
            setcookie('remember_token', $token, time() + 60 * 60 * 24 * 30);
        }
    }
}

if (empty($_SESSION['user_id'])) { ?>
    <div style="padding: 15px">
        <h2>Для просмотра библиотеки вы должны войти в систему!</h2><br>
        <form action="index.php?action=auth" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Имя пользователя:</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="remember_me">
                <label for="remember_me">Запомнить меня:</label>
            </div>
            <input type="submit" class="btn btn-primary" value="Войти в систему">
        </form>
    </div>
    <?php
} else {
    echo "<h2 style='padding: 15px'>Добро пожаловать {$_SESSION['name']}</h2>";
    if ($_SESSION['name'] == 'admin') { ?>
        <div style="padding: 15px">
            <form action="index.php?action=download_file" method="post" enctype="multipart/form-data">
                <input type="text" name="firstname" placeholder="Имя" /><br>
                <input type="text" name="lastname" placeholder="Фамилия" /><br>
                <input type="text" name="name_book" placeholder="Название книги" /><br>
                <input type="text" name="page_number" placeholder="Количество страниц" /><br>
                <input type="text" name="year_of_publishing" placeholder="Год издания" /><br>

                <div class="form-group">
                    <input type="file" class="form-control-file" name="photo">
                    <input type="submit" value="Загрузить данные">
                </div>
                <div>
                    <input class="form-control" type="text" name="title" placeholder="Введите название книги или ФИО автора"><br>
                    <input type="submit" class="btn btn-primary" value="Поиск">
                </div>
            </form>
        </div>
        <?php addBook();

    } else {?>
        <form action="index.php" method="post">
            <input class="form-control" type="text" name="title" placeholder="Введите название книги или ФИО автора"><br>
            <input type="submit" class="btn btn-primary" value="Поиск">
        </form>
        <?php showAllBooksForUsers();
    }
}
?>

