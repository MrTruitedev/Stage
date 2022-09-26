USE Addp;
CREATE TABLE clients(
   id_client INT not null auto_increment,
   society VARCHAR(50),
   address TEXT,
   mail VARCHAR(50),
   contact_name VARCHAR(50),
   tel INT,
   PRIMARY KEY(id_client)
);

CREATE TABLE products(
   id_product INT not null auto_increment,
   name_product VARCHAR(50),
   PRIMARY KEY(id_product)
);
CREATE TABLE items(
   id_item INT not null auto_increment,
   name_item VARCHAR(50),
   date_bought DATE,
   id_product INT,
   PRIMARY KEY(id_item),
   FOREIGN KEY(id_product) REFERENCES products(id_product)
);
CREATE TABLE loan(
   id_loan INT not null auto_increment,
   date_loan DATE,
   state VARCHAR(50),
   date_return DATE,
   note TEXT,
   id_client INT,
   id_item INT,
   PRIMARY KEY(id_loan),
   FOREIGN KEY(id_client) REFERENCES clients(id_client),
   FOREIGN KEY(id_item) REFERENCES items(id_item)
);

CREATE TABLE item_properties(
   id_property INT not null auto_increment,
   item_property VARCHAR(50),
   propertie_value VARCHAR(50),
   id_item INT,
   PRIMARY KEY(id_property),
   FOREIGN KEY(id_item) REFERENCES items(id_item)
);

CREATE TABLE failure(
   id_fail INT not null auto_increment,
   date_fail DATE,
   description_fail TEXT,
   id_item INT,
   PRIMARY KEY(id_fail),
   FOREIGN KEY(id_item) REFERENCES items(id_item)
);
