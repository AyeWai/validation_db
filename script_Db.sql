create table products (id int,  name varchar(20), description varchar(200), create_date timestamp, price float, img varchar(200));
create table users (id int, pseudo varchar(30), fname varchar(30), lname varchar(30), capacity int);
create table basket (user_id int, product_id int, quantity int);


insert into products(id, name, description, create_date, price, img) values(1, "Once d’Or", "La monnaie des dieux. Apprécié depuis l'aube de l'humanité, il aura toujours de la valeur après le déclin de celle-ci" , CURRENT_TIMESTAMP(), 1321.79, "https://cdn.pixabay.com/photo/2016/10/16/10/11/bullion-1744773_960_720.jpg");
insert into users (id, pseudo, fname, lname, capacity) values(1, "admin", "Chris","SIMON", 7);
insert into users (id, pseudo, fname, lname, capacity) values(2, "jjrousseau_91","Jean-Jacques","ROUSSEAU", 1);
insert into basket (user_id, product_id, quantity) values (2, 1, 4);


select * from products;
select * from users;
select * from basket;


