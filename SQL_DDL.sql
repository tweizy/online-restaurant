DROP DATABASE IF EXISTS online_restaurant;

CREATE DATABASE online_restaurant;
USE online_restaurant;

CREATE TABLE users (
	uid INTEGER PRIMARY KEY auto_increment,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    utype ENUM('client', 'admin') NOT NULL,
    hashed_password CHAR(60));
    
CREATE TABLE plats (
	pid INTEGER PRIMARY KEY auto_increment,
    pname VARCHAR(100) NOT NULL UNIQUE,
    ptype VARCHAR(50) NOT NULL,
    pdescription VARCHAR(100),
    price FLOAT NOT NULL
);
    
CREATE TABLE commandes (
	cid INTEGER PRIMARY KEY auto_increment,
    uid INTEGER NOT NULL,
    statut VARCHAR(50) NOT NULL,
    cdate DATE NOT NULL,
    bill FLOAT NOT NULL,
    FOREIGN KEY (uid) REFERENCES users(uid)
);
    
CREATE TABLE commande_plat (
	cid INTEGER,
    pid INTEGER,
    qty INTEGER NOT NULL,
    FOREIGN KEY (cid) REFERENCES commandes(cid),
    FOREIGN KEY (pid) REFERENCES plats(pid)
);

    