create table customer_orders (
  id int(11) not null PRIMARY KEY AUTO_INCREMENT,
  table_no int(11) not null,
  burger varchar(255) not null,
  ribs varchar(255) not null,
  fries varchar(255) not null,
  drink varchar(255) not null,
  price int(11) not null,
  time time not null,
  date date not null
);