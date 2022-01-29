<?php
declare(strict_types=1);
session_start();
require_once 'db.php';
require_once "function.php";
?>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap-grid.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap-reboot.css">
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
?>
<?php if (empty($_SESSION['user_id'])): ?>
    <div style="padding: 15px">
        <h2>Для загрузки фотографий вы должны войти в систему!</h2><br>
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
    <?php show(); else: ?>
    <div style="padding: 15px">
        <?php echo "<h2>Добро пожаловать {$_SESSION['name']}</h2>" ?>
        <form action="index.php?action=download_file" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" class="form-control-file" name="photo">
                <input type="submit" value="Отправить">
            </div>
        </form>
    </div>
    <?php downloadPhoto(); endif; ?>

