<?php
declare(strict_types=1);
session_start();
require_once 'db.php';
require_once "function.php";
if(!empty($_COOKIE['remember_token']) && empty($_SESSION['user_id'])) {
    $result = authenticate_by_token($_COOKIE['remember_token']);
    if($result) {
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['name'] = $result['username'];
    }
}
if(!empty($_GET['action']) && $_GET['action'] == 'auth' && empty($_SESSION['user_id'])) {
    $result = authenticate($_POST['username'], $_POST['password']);
    if(!$result) {
        echo '<h2>Невреное имя пользователя или пароль!</h2><br>';
    } else {
        $_SESSION['user_id'] = $result;
        $_SESSION['name'] = $_POST['username'];
        if(!empty($_POST['remember_me']) && $_POST['remember_me'] == 'on')
        {
            $token = uniqid();
            set_remember_token($_SESSION['user_id'], $token);
            setcookie('remember_token', $token, time()+60*60*24*30);
        }
    }
}
?>
<?php if(empty($_SESSION['user_id'])): ?>
    <h2>Для загрузки фотографий вы должны войти в систему!</h2><br>
    <form action="index.php?action=auth" method="post" enctype="multipart/form-data">
        <label for="message">Имя пользователя:</label>
        <input type="text" name="username"><br>
        <label for="message">Пароль:</label>
        <input type="text" name="password"><br>
        <label for="remember_me">Запомнить меня:</label>
        <input type="checkbox" name="remember_me"><br>
        <input type="submit" value="Войти в систему">
    </form>
<?php downloadPhoto(); else: ?>
    <?php echo "<h2>Добро пожаловать {$_SESSION['name']}</h2>" ?>
    <form action="index.php?action=download_file" method="post" enctype="multipart/form-data">
        <input type="file" name="photo">
        <br>
        <input type="submit" value="Отправить">
    </form>
<?php downloadPhoto(); endif; ?>

