CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    type VARCHAR(100),
    description TEXT,
    date DATE
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(50)
);


CREATE TABLE wedding_event (
    id INT AUTO_INCREMENT PRIMARY KEY,
    groom_name VARCHAR(255),
    bride_name VARCHAR(255),
    date DATE,
    venue VARCHAR(255),
    theme VARCHAR(255)
);


CREATE TABLE cop_event (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    date DATE,
    venue VARCHAR(255),
    description TEXT
);


CREATE TABLE party_type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    party_name VARCHAR(255),
    host_name VARCHAR(255),
    location VARCHAR(255),
    date DATE,
    guests INT
);


