<?php
declare(strict_types=1);

function db_connect() {
    return new PDO('pgsql:host=localhost;dbname=otus','postgres','otus',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
//        PDO::FETCH_ASSOC => true
    ]);
}


function getAllInformation() {
    $pdo = db_connect();
    $result = $pdo->query('select books.id_book, name_book, first_name, last_name, page_number, 
       year_of_publishing from books
	   JOIN authors_books ON books.id_book=authors_books.id_book 
        JOIN authors ON authors_books.id_author=authors.id_author
	   order by books.id_book
');;
    $result->execute();
    $data = $result->fetchAll();
    return $data;
}

function getSomeInformation($request) {
    $pdo = db_connect();
    $result = $pdo->query("select * from (select books.id_book, name_book, first_name, last_name, page_number, 
                      year_of_publishing from books
	   JOIN authors_books ON books.id_book=authors_books.id_book JOIN authors ON authors_books.id_author=authors.id_author
	   order by books.id_book) as foo 
where (lower (name_book) like lower (('%$request%')) or lower (first_name)  like lower (('%$request%')) or lower (last_name)  like lower (('%$request%')) )");
    $result->execute();
    $data = $result->fetchAll();
    return $data;
}
