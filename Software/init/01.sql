CREATE TABLE games(
    appId int NOT NULL AUTO_INCREMENT,
    game varchar(255) NOT NULL,
    Developer varchar(255) NOT NULL,
    Publisher varchar(255) NOT NULL,
    genre1 varchar(255) NOT NULL,
    genre2 varchar(255) NOT NULL,
    is_free NUMBER(1)
);

INSERT INTO games (appId, game, Developer, Publisher, genre1,genre2,is_free)
values ('Brodi', 'Farinas', 'superpass', 'random@me.com'), ('Soup', 'Campbell', 'secretpass', 'campbellsoup@me.com');
