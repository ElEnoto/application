<?php
declare(strict_types=1);
function db_connect() {
    return new PDO('pgsql:host=localhost;dbname=authenticate','postgres','otus',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
}


function authenticate($username, $password) {
    $pdo = db_connect();
    $result = $pdo->prepare('select id from users where username = ? and password = ?');
    $result->execute([$username, md5($password)]);
    if($result->rowCount() == 0)
        return false;
    return $result->fetchAll()[0]['id'];
}

function set_remember_token($user_id, $token) {
    $pdo = db_connect();
    $result = $pdo->prepare('update users set remember_token = ? where id = ?');
    $result->execute([$token,$user_id]);
}

function authenticate_by_token($token) {
    $pdo = db_connect();
    $result = $pdo->prepare('select id, username from users where remember_token = ?');
    $result->execute([$token]);
    if($result->rowCount() == 0)
        return false;
    return $result->fetchAll()[0];
}
