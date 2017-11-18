DROP TABLE IF EXISTS highScore;

CREATE TABLE highScore (
	rank int(50),
	name varchar(50),
	score int(50)
)  DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO highScore (rank,name,score) VALUES (1,'Apple',450);
INSERT INTO highScore (rank,name,score) VALUES (2,'Linux',230);
INSERT INTO highScore (rank,name,score) VALUES (3,'Windows',50);
