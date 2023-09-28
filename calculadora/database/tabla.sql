USE calc_data;
CREATE TABLE prestamos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    monto DECIMAL(10, 2) NOT NULL,
    tasa_anual DECIMAL(5, 2) NOT NULL,
    plazo_meses INT NOT NULL,
	cuota_mensual DECIMAL(10, 2) NOT NULL
);