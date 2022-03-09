CREATE DB

docker-compose up -d --build

docker exec -it lesson_26-db-1 bash

su postgres

createdb otus

psql -d otus

CREATE TABLE users (id serial PRIMARY KEY, username varchar (50) NOT NULL, password varchar (250) NOT NULL);

INSERT INTO users (id, username, password) VALUES ('1', 'admin','admin');

INSERT INTO users (id, username, password) VALUES ('2', 'otus','otus');



CREATE TABLE tasks (id serial PRIMARY KEY, task varchar (100) NOT NULL, first_name varchar (50) NOT NULL, last_name varchar (50) NOT NULL, date date NOT NULL);

INSERT INTO tasks (id, task, first_name, last_name, date) VALUES ('1', 'Выспаться','Иванов', 'Иван', '12.08.2022');









