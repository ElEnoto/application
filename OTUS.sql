create table authors_books ( id_author_book serial primary key, 
							id_author int constraint id_author_fk references authors (id_author), 
							id_book int constraint id_book_fk references books (id_book));

create table bookshelves_bookcases ( id_bookshelves_bookcases serial primary key, 
							bookshelves_number int constraint bookshelves_bookcases_unique unique, 
							bookcase_number int );
							

create table books_bookshelves ( id_books_bookshelves serial primary key, 
							id_book int constraint id_book_unique unique, 
bookshelves_number int constraint bookshelves_number_fk references bookshelves_bookcases (bookshelves_number));

create table books ( id_book serial primary key constraint id_book_fk references books_bookshelves (id_book), 
							name_book varchar, page_number int, year_of_publishing varchar );

