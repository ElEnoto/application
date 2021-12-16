delete from books_bookshelves where bookshelves_number >=1
select * from books_bookshelves

explain select * from books where length(name_book)=15
explain select * from authors where length(last_name)=15

create index last_name_ind on authors (last_name)

create index name_book_ind on books (name_book)