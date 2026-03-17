CREATE DATABASE sistema_reserva;
USE sistema_reserva;

CREATE TABLE users (
    id_user INT AUTO_INCREMENT NOT NULL,
    user_name VARCHAR(50) NOT NULL,
    user_email VARCHAR(100) NOT NULL UNIQUE,
    user_pass VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL,
    user_type BOOL NOT NULL,
    CONSTRAINT pk_user PRIMARY KEY (id_user)
);

CREATE TABLE resources (
    id_res INT AUTO_INCREMENT NOT NULL,
    res_name VARCHAR(50) NOT NULL,
    res_description VARCHAR(300) NOT NULL,
    capacity SMALLINT UNSIGNED NOT NULL,
    start_date_res DATE,
    end_date_res DATE,
    start_time_res TIME,
    end_time_res TIME,
    CONSTRAINT pk_resources PRIMARY KEY (id_res)
);

CREATE TABLE reservations(
	id_resv INT AUTO_INCREMENT NOT NULL,
    id_user INT NOT NULL,
    id_res INT NOT NULL,
    start_date_resv DATE,
    end_date_resv DATE,
    start_time_resv TIME,
    end_time_resv TIME,
    CONSTRAINT pk_reservation PRIMARY KEY(id_resv),
    CONSTRAINT fk_users FOREIGN KEY(id_user) REFERENCES users(id_user),
    CONSTRAINT fk_resource FOREIGN KEY(id_res) REFERENCES resources(id_res) 
);

