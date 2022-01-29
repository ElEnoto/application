<?php
declare(strict_types=1);


function db_connect() {
    return new PDO('pgsql:host=localhost;dbname=otus','postgres','otus',[
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


function add_photo($user_id, $files, $copies)
{
    $pdo = db_connect();
    $result = $pdo->prepare('insert into photo(user_id, files, copies, date) values (?,?,?,?)');
    $result->execute([$user_id, $files, $copies, date('Y-m-d')]);
}


function getAllInformation() {
    $pdo = db_connect();
    $result = $pdo->query('select books.id_book, picture_copy, picture_file, name_book, first_name, last_name, page_number, 
       year_of_publishing from books
	   JOIN authors_books ON books.id_book=authors_books.id_book 
        JOIN authors ON authors_books.id_author=authors.id_author
        Join picture ON picture.id_book = books.id_book
	   order by books.id_book
');;
    $result->execute();
    $data = $result->fetchAll();
    return $data;
}

function getSomeInformation($request) {
    $pdo = db_connect();
    $result = $pdo->query("select * from (select books.id_book, picture_copy, picture_file, name_book, first_name, last_name, page_number, 
                      year_of_publishing from books
	   JOIN authors_books ON books.id_book=authors_books.id_book JOIN authors ON authors_books.id_author=authors.id_author
        Join picture ON picture.id_book = books.id_book
	   order by books.id_book) as foo 
where (lower (name_book) like lower (('%$request%')) or lower (first_name)  like lower (('%$request%')) or lower (last_name)  like lower (('%$request%')) )");
    $result->execute();
    $data = $result->fetchAll();
    return $data;
}

function insertContentAuthors(array $content) {
    $pdo = db_connect();
    $lastname = $content['LASTNAME'];
    $firstname = $content['FIRSTNAME'];


    $result = $pdo->prepare('insert into authors (last_name, first_name) values (?, ?);');
    $result->execute([$lastname, $firstname]);

}

function insertContentBooks(array $content) {
    $pdo = db_connect();

    $name_book = $content['NAME_BOOK'];
    $page_number = (int)$content['PAGE_NUMBER'];
    $year_of_publishing = $content['YEAR_OF_PUBLISHING'];


    $result = $pdo->prepare(' 
insert into books (name_book, page_number, year_of_publishing) values (?, ?, ?); 
');
    $result->execute([$name_book, $page_number, $year_of_publishing]);

}

function insertContentAuthorsBooks(array $content) {
    $pdo = db_connect();
    $lastname = $content['LASTNAME'];
    $firstname = $content['FIRSTNAME'];
    $name_book = $content['NAME_BOOK'];


    $result = $pdo->prepare(" 
insert into authors_books (id_author, id_book) values ((select id_author from authors where last_name like '$lastname' and first_name like '$firstname'), 
													   (select id_book from books where name_book like  '$name_book'));
");
    $result->execute();

}

function insertContentPicture(array $content) {
    $pdo = db_connect();

    $name_book = $content['NAME_BOOK'];

    $picture_file = $content['PICTURE_FILE'];
    $picture_copy = $content['PICTURE_COPY'];

    $result = $pdo->prepare('
insert into picture (id_book, picture_file, picture_copy) values ((select id_book from books where name_book = ?), 
																?, ?)');
    $result->execute([$name_book, $picture_file, $picture_copy]);

}

//function deleteAll (){
//    $pdo = db_connect();
//    $result = $pdo->query('delete from bookshelves_bookcases');
//    $result->execute();
//}

function deletePicture ($contentId)
{
    $pdo = db_connect();
    $result = $pdo->prepare('delete from picture where id_book = ?');
    $result->execute([$contentId]);
}

function deleteAuthors ($contentId)
{
    $pdo = db_connect();
    $result = $pdo->prepare('delete from authors where id_author = (select id_author from authors_books where id_book = ?)');
    $result->execute([$contentId]);
}


function deleteBooks ($contentId)
{
    $pdo = db_connect();
    $result = $pdo->prepare('delete from books where id_book = ?');
    $result->execute([$contentId]);
}



