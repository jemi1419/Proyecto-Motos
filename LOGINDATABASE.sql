CREATE DATABASE LOGIN;
USE LOGIN;
CREATE TABLE Usuarios (
    IdUsuario INT NOT NULL AUTO_INCREMENT, 
    Nombre VARCHAR(100) NOT NULL,
    Apellidos VARCHAR(150),
    Login VARCHAR(50) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL, 
    PRIMARY KEY (IdUsuario)
);

INSERT INTO Usuarios (Nombre, Apellidos, Login, Password) VALUES 
('Avril', 'Tapia', 'avriltap', '12345');

create table actu
(
	idU int primary key not null,
    us varchar(50),
    pas varchar(255)
);

INSERT INTO Usuarios (Nombre, Apellidos, Login, Password) VALUES 
('Emi', 'CM', 'admin', '123');

create table admi
(
	ida int primary key auto_increment not null,
    us varchar(50),
    pas varchar(255)
);

CREATE TABLE cascos_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(100),
    modelo VARCHAR(150),
    tipo VARCHAR(100),
    certificacion VARCHAR(100),
    descripcion TEXT,
    precio_aprox VARCHAR(50),
    imagen TEXT,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO cascos_info 
(marca, modelo, tipo, certificacion, descripcion, precio_aprox, imagen)
VALUES
('Shoei', 'X-Spirit 3', 'Casco Integral', 'DOT / ECE', 
 'Cubre completamente la cabeza y barbilla; es el más seguro por su estructura cerrada.',
 '$1,200 - $4,000 MXN',
 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ424UYAAENmYKvkB6XoLJtgKVk9NvLwbgmBA&s'),

('Shark', 'Evo-One 2', 'Casco Modular', 'DOT / ECE', 
 'Casco abatible que permite levantar la mentonera. Seguro y cómodo.',
 '$1,500 - $3,500 MXN',
 'https://todomotoshop.com/wp-content/uploads/2023/06/Acasco-rebatible-ls2-ff325-strobe-doble-visor-325-devotobikes-01__08134.1542036151.jpg'),

('Bell', 'Custom 500', 'Casco Jet', 'DOT', 
 'No cubre la barbilla; muy ligero y ventilado.',
 '$800 - $2,000 MXN',
 'https://nzi.es/wp-content/uploads/2023/10/VILLE-DUO-2.jpg'),

('Fox', 'V1', 'Casco Off-Road', 'DOT / ECE', 
 'Diseñado para dirt, con visera grande y mentonera extendida.',
 '$1,200 - $3,000 MXN',
 'https://m.media-amazon.com/images/I/61Ur5rwM3VL._AC_UF894,1000_QL80_.jpg'),

('Arai', 'Tour-X4', 'Casco Dual-Sport', 'DOT / ECE', 
 'Combina casco integral y off-road, ideal para aventura.',
 '$1,600 - $4,500 MXN',
 'https://img.pacifiko.com/PROD/resize/1/1000x1000/ODJkMjVkN2_7.jpg'),

('AGV', 'Pista GP RR', 'Casco Alta Gama', 'FIM / DOT / ECE', 
 'Alta gama usado en pista, ligero y resistente.',
 '$4,000 - $8,000 MXN',
 'https://moto-rad.com/cdn/shop/files/casco-shark-race-r-pro-gp-zarco-chakra-replica-carbonpurpleblue-ece-22-06-he0411edvb-xs-690.webp?v=1692987562'),

('Bell', '500 Classic', 'Casco 3/4', 'DOT', 
 'Cubre cabeza y orejas dejando rostro abierto.',
 '$700 - $1,800 MXN',
 'https://i5.walmartimages.com/asr/16d60c4e-c523-4c90-a1cd-f85c52d6d89a.df869ed8794ed5cc46718d84a02368a6.jpeg'),

('HJC', 'IS-Cruiser', 'Half Helmet', 'DOT', 
 'Media cáscara, mínimo nivel de protección.',
 '$600 - $1,500 MXN',
 'https://stoneadventure.com/wp-content/uploads/2021/12/Stone-Adventure-product_04.jpg');
 CREATE TABLE preguntas_frecuentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pregunta TEXT NOT NULL,
    respuesta TEXT NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    orden INT NOT NULL
);
CREATE TABLE accidentes2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    lugar VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    causa VARCHAR(255) NOT NULL,
    lesionados INT NOT NULL,
    uso_casco ENUM('Sí', 'No') NOT NULL,
    nivel_gravedad ENUM('Leve', 'Moderado', 'Grave', 'Fatal') NOT NULL,
    imagen_evidencia VARCHAR(255) NOT NULL
);


 