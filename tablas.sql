CREATE TABLE tipoequipo(
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(30) NOT NULL,
	create_date TIMESTAMP NOT NULL,
	modify_date TIMESTAMP NOT NULL,
	active ENUM('Si','No') NOT null
);

CREATE TABLE equipo(
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	SERIAL VARCHAR(30) NOT NULL,
	tipoequipo INT(11) NOT NULL,
	fechavencimiento TIMESTAMP NOT NULL,
	create_date TIMESTAMP NOT NULL,
	modify_date TIMESTAMP NOT NULL,
	active ENUM('Si','No')
);