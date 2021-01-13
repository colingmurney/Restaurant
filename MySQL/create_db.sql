# create database
DROP DATABASE IF EXISTS restaurant;
CREATE DATABASE restaurant;

USE restaurant;

# create province table and insert data
DROP TABLE IF EXISTS province;
CREATE TABLE province (
	province_id tinyint,
	province_name varchar(25) not null,
    PRIMARY KEY (province_id)
)ENGINE=InnoDB;
INSERT INTO province VALUES (1, "BC");
INSERT INTO province VALUES (2, "AB");
INSERT INTO province VALUES (3, "SK");
INSERT INTO province VALUES (4, "MB");
INSERT INTO province VALUES (5, "ON");
INSERT INTO province VALUES (6, "QC");
INSERT INTO province VALUES (7, "NB");
INSERT INTO province VALUES (8, "NS");
INSERT INTO province VALUES (9, "NFLD");
INSERT INTO province VALUES (10, "PEI");

# create customer table
DROP TABLE IF EXISTS customer;
CREATE TABLE customer (
	customer_id int auto_increment,
    customer_name varchar(50) not null,
    email varchar(50) not null,
    city varchar(50) not null,
    address varchar(50) not null,
    postal_code varchar(10) not null,
    province_id tinyint,
    PRIMARY KEY (customer_id),
    UNIQUE KEY unique_email (email),
    INDEX province_id_index (province_id),
    FOREIGN KEY (province_id)
		REFERENCES province(province_id)
        ON DELETE set null
) ENGINE=InnoDB;
INSERT INTO customer (customer_name, email, city, address, postal_code, province_id) VALUES ("Colin Murney", "colin@gmail.com", "Montreal", "1050 rue Peel", "H3C0T4", 6 ); 

# create contact_reason table
DROP TABLE IF EXISTS contact_reason;
CREATE TABLE contact_reason (
	reason_id tinyint,
    reason varchar(50),
    PRIMARY KEY (reason_id)
)ENGINE=InnoDB;
INSERT INTO contact_reason VALUES (1, "There was an issue with my order");
INSERT INTO contact_reason VALUES (2, "I never recieved my order");
INSERT INTO contact_reason VALUES (3, "I am unsatisfied with my order");
INSERT INTO contact_reason VALUES (4, "Other (please specify)");

# create ContactForm table
DROP TABLE IF EXISTS contact_form;
CREATE TABLE contact_form (
	contact_form_id int auto_increment,
    body varchar(500) not null,
    reason_id tinyint,
    customer_id int,
    PRIMARY KEY (contact_form_id),
    INDEX reason_id_index (reason_id),
    INDEX customer_id_index (customer_id),
    FOREIGN KEY (reason_id)
		REFERENCES contact_reason(reason_id)
        ON DELETE set null,
    FOREIGN KEY (customer_id)
		REFERENCES customer(customer_id)
        ON DELETE set null
)ENGINE=InnoDB;

# create FoodOrder table
DROP TABLE IF EXISTS food_order;
CREATE TABLE food_order (
	order_id int auto_increment,
    order_date datetime not null,
    customer_id int,
    PRIMARY KEY (order_id),
    INDEX customer_id_index (customer_id),
    FOREIGN KEY (customer_id)
		REFERENCES customer(customer_id)
        ON DELETE set null
)ENGINE=InnoDB;

# create item_type table
DROP TABLE IF EXISTS item_type;
CREATE TABLE item_type (
	item_type_id tinyint,
    type_name varchar(50),
    PRIMARY KEY (item_type_id)
)ENGINE=InnoDB;
INSERT INTO item_type VALUES (1, "Food");
INSERT INTO item_type VALUES (2, "Drink");
INSERT INTO item_type VALUES (3, "Add-On");

# create menu_item table
DROP TABLE IF EXISTS menu_item;
CREATE TABLE menu_item (
	menu_item_id int,
    item varchar(50),
    item_details varchar(250),
    item_type_id tinyint,
    PRIMARY KEY (menu_item_id),
    INDEX item_type_id_index (item_type_id),
    FOREIGN KEY (item_type_id)
		REFERENCES item_type(item_type_id)
        ON DELETE set null
)ENGINE=InnoDB;
INSERT INTO menu_item VALUES (1, "Burger",
	"A 1/2 lb patty of ground beef topped with cheese, bacon, lettuce, tomato, dill pickle, mayo & fried onions.",
    1
);
INSERT INTO menu_item VALUES (2, "Poutine",
	"Hand cut fries & mozzarella cheese with homemade beef or turkey gravy.",
    1
);
INSERT INTO menu_item VALUES (3, "French Fries",
	"Served with homemade sweet chili or curry mayo.",
    1
);
INSERT INTO menu_item VALUES (4, "Nachos",
	"Homemade seasoned tortilla chips generously topped with cheddar & mozzarella cheese, onions, tomatoes, jalapenos & olives. Served with salsa & sour cream.",
    1
);
INSERT INTO menu_item VALUES (5, "Steak",
	"All of our steaks are wet aged and hand cut here at the Mic Mac Bar and Grill and lightly dusted in our secret spice. We charbroil our steaks to your liking. Do yourself a favour and try them all!",
    1
);
INSERT INTO menu_item VALUES (6, "Greek Salad",
	"Hand tossed with lettuce, cucumber, red onion & tomato. Topped with feta & kalamata olives.",
    1
);
INSERT INTO menu_item VALUES (7, "Club Sandwich",
	"House roasted turkey, bacon, lettuce, tomato & mayo, sandwiched between three slices of toasted white or whole wheat bread. Served with your choice of side. A classic!",
    1
);
INSERT INTO menu_item VALUES (8, "Pasta",
	"Fresh homemade Italian pasta. Finished with freshly grated parmesan and parsley. Served with bacon-crusted garlic cheese bread.",
    1
);
INSERT INTO menu_item VALUES (9, "Pepsi", null, 2);
INSERT INTO menu_item VALUES (10, "Water", null, 2);
INSERT INTO menu_item VALUES (11, "Beer", null, 2);
INSERT INTO menu_item VALUES (12, "Wine", null, 2);
INSERT INTO menu_item VALUES (13, "Bacon", null, 3);
INSERT INTO menu_item VALUES (14, "Tomato", null, 3);
INSERT INTO menu_item VALUES (15, "Cheese", null, 3);
INSERT INTO menu_item VALUES (16, "Mushrooms", null, 3);

# create order_item table
DROP TABLE IF EXISTS order_item;
CREATE TABLE order_item (
	order_id int,
    menu_item_id int,
    INDEX order_id_index (order_id),
    INDEX menu_item_id_index (menu_item_id),
    FOREIGN KEY (order_id)
		REFERENCES food_order(order_id)
        ON DELETE cascade,
    FOREIGN KEY (menu_item_id)
		REFERENCES menu_item(menu_item_id)
        ON DELETE set null
)ENGINE=InnoDB;

# create staff login table
DROP TABLE IF EXISTS staff_login;
CREATE TABLE staff_login (
	username varchar(50),
    hashed_password varchar(250)
);
