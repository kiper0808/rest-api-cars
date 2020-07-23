USE rest-api;
CREATE TABLE cars(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, year INT UNSIGNED NOT NULL, color VARCHAR(30) NOT NULL);

INSERT INTO cars (name, year, color) VALUES 
('Toyota Rav4', 2002, 'Gray'), 
('Toyota Crown', 1994, 'White'),
('Honda Accord', 2008, 'Black'),
('Volkswagen Polo', 2015, 'White'),
('UAZ Patriot', 2006, 'White'),
('Hyundai Creta', 2018, 'White'),
('Nissan Juke', 2015, 'White'),
('Nissan Serena', 1996, 'White'),
('BMW X5', 2006, 'White'),
('Opel Astra', 2005, 'White'),
('Mini Cooper', 2015, 'Yellow'),
('Toyota Premio', 2019, 'Gray'),
('Aston Martin Rapide', 1996, 'White'),
('Mercedes-Benz GLK', 2008, 'Black'),
('Subaru Impreza', 1996, 'Blue'),
('Tesla Cybertruck', 2020, 'White');
