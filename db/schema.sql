-- Schema for the database.
DROP TABLE IF EXISTS votes;
DROP TABLE IF EXISTS descriptions;
DROP TABLE IF EXISTS breed;

CREATE TABLE IF NOT EXISTS breed (
  id_breed INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS descriptions (
  id_description INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_breed INT NOT NULL,
  description VARCHAR(255) NOT NULL,
  date_added DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_breed) REFERENCES breed(id_breed)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS votes (
  id_vote INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_breed INT NOT NULL,
  votes INT NOT NULL,
  FOREIGN KEY (id_breed) REFERENCES breed(id_breed)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert some data.
DELETE FROM breed;
INSERT INTO breed (name) VALUES ('Abyssinian');
INSERT INTO breed (name) VALUES ('Aegean');
INSERT INTO breed (name) VALUES ('American Bobtail');
