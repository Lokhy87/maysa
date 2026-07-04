
CREATE TABLE massageCollection (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    icon VARCHAR(10),
    position INT DEFAULT 0
);

CREATE TABLE massage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    massage_collection_id INT NOT NULL,
    name VARCHAR(150) NOT NULL,
    subtitle VARCHAR(255),
    description TEXT NOT NULL,
    notes TEXT,
    image VARCHAR(255),
    active BOOLEAN DEFAULT TRUE,
    position INT DEFAULT 0,
    FOREIGN KEY (massage_collection_id) REFERENCES massageCollection(id) ON DELETE CASCADE
);

CREATE TABLE massage_price (
    id INT AUTO_INCREMENT PRIMARY KEY,
    massage_id INT NOT NULL,
    duration INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (massage_id) REFERENCES massage(id) ON DELETE CASCADE
);

CREATE TABLE complement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(100) NOT NULL,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) DEFAULT 0
);

-- Collections
INSERT INTO massageCollection (id,name,description,icon,position) VALUES
(1,'Wellness Collection','Masajes enfocados en relajación y bienestar','🌿',1),
(2,'Sensual Collection','Experiencias sensoriales','🖤',2),
(3,'Luxury Collection','Experiencias premium','✨',3),
(4,'Couples Collection','Experiencias para pareja','🖤',4);
