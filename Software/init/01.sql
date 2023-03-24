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
values (570, 'Dota 2','Valve', 'Valve', 'Action', 'Strategy', 1) , (730, 'Counter Strike: Global Offensive', 'Valve', 'Valve', 'Action', 'FPS', 1), (1172470, 'Apex Legends', 'Respawn Entertainment', 'Electronic Arts', 'Action', 'Adventure', 1), 
(578080, 'PUBG: BATTLEGROUNDS', 'KRAFTON Inc.', 'KRAFTON Inc.', 'Action', 'Adventure', 1), (1063730, 'New World', 'Amazon Games', 'Amazon Games', 'Action', 'Massively Multiplayer', 0), (440, 'Team Fortress 2', 'Valve', 'Valve', 'Action', 'FPS', 1),
(271590, 'Grand Theft Auto 5', 'Rockstar North', 'Rockstar Games', 'Action', 'Open World', 0),
(1599340, 'Lost Ark',' Smilegate RPG', 'Amazon Games', 'Action', 'Massively Multiplayer', 1),
(550, 'Left 4 Dead 2', 'Valve', 'Valve', 'Online Co-op', 'Zombie', 0),
(304930, 'Unturned', 'Smartly Dressed Games', 'Smartly Dressed Games', 'Multiplayer', 'Zombie', 1),
(252490, 'Rust', 'Facepunch Studios', 'Facepunch Studios', 'Action', 'RPG', 0),
(230410, 'Warframe', 'Digital Extremes', 'Digital Extremes', 'Co-op', 'Third Person Shooter', 1),
(105600, 'Terraria', 'Re-logic', 'Re-Logic', 'Action', 'Side Scroller', 0),
(4000, 'Garry''s Mod', 'Facepunch Studios', 'Valve', 'Indie', 'Simulation', 0),
(1245620, 'Elden Ring', 'FromSoftware Inc.', 'Bandai Namco', 'Souls Like', 'RPG', 0),
(291550, 'Brawlhalla', 'Blue Mammoth Games', 'Ubisoft', 'Action', 'Indie', 1),
(236390, 'War Thunder', 'Gaijin Entertainment', 'Gaijin Distribution KFT', 'Action', 'Simulation', 1);
