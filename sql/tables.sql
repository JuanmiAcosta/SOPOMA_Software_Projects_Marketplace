CREATE TABLE Users (
    email VARCHAR(50) PRIMARY KEY,
    user VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    phone VARCHAR(9) NOT NULL
);