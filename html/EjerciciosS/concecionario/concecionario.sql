USE concesionario;

CREATE TABLE coches (
    id INT AUTO_INCREMENT,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    anyo INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    kilometraje INT DEFAULT 0,
    combustible VARCHAR(20),
    PRIMARY KEY (id)
) engine=InnoDB default charset=utf8mb4;
