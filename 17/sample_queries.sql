CREATE TABLE store_inventory (
   id int not null primary key auto_increment,
   item_name varchar(50),
   item_price float(6,2),
   item_qty int
);

CREATE TABLE store_orders (
   id int not null primary key auto_increment,
   purchaser_name varchar(50),
   purchase_date datetime
);

CREATE TABLE store_orders_items (
   id int not null primary key auto_increment,
   order_id int,
   inventory_id int,
   item_qty int
);

INSERT INTO store_inventory VALUES (1, 'Great Book', 19.99, 10);
INSERT INTO store_inventory VALUES (2, 'Awesome CD', 9.99, 20);

BEGIN;
UPDATE store_inventory SET item_qty = item_qty - 2 WHERE id = 1;
UPDATE store_inventory SET item_qty = item_qty - 1 WHERE id = 2;
INSERT INTO store_orders (purchaser_name, purchase_date) VALUES ('John Smith', now());
INSERT INTO store_orders_items (order_id, inventory_id, item_qty) VALUES ('1', '1', '2');
INSERT INTO store_orders_items (order_id, inventory_id, item_qty) VALUES ('1', '2', '1');
COMMIT;

CREATE TABLE testSP (
   id int not null primary key auto_increment,
   field_name varchar(25),
   date_added datetime
);

INSERT INTO testSP VALUES (1, 'Value 1', date_sub(now(), interval 7 day));
INSERT INTO testSP VALUES (2, 'Value 2', date_sub(now(), interval 6 day));
INSERT INTO testSP VALUES (3, 'Value 3', date_sub(now(), interval 5 day));
INSERT INTO testSP VALUES (4, 'Value 4', date_sub(now(), interval 4 day));
INSERT INTO testSP VALUES (5, 'Value 5', date_sub(now(), interval 3 day));
INSERT INTO testSP VALUES (6, 'Value 6', now());
INSERT INTO testSP VALUES (7, 'Value 7', date_add(now(), interval 1 day));
INSERT INTO testSP VALUES (8, 'Value 8', date_add(now(), interval 2 day));
INSERT INTO testSP VALUES (9, 'Value 9', date_add(now(), interval 3 day));
INSERT INTO testSP VALUES (10, 'Value 10', date_add(now(), interval 15 day));

CREATE PROCEDURE sp1 () SELECT * FROM testSP WHERE  date_added BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW() //

