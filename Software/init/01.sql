CREATE TABLE games(
    appId int NOT NULL,
    game varchar(255) NOT NULL,
    Developer varchar(255) NOT NULL,
    Publisher varchar(255) NOT NULL,
    genre1 varchar(255) NOT NULL,
    genre2 varchar(255) NOT NULL,
    is_free BIT,
    PRIMARY KEY (appId)
);

INSERT INTO games (appId, game, Developer, Publisher, genre1,genre2,is_free)
values (570, 'Dota 2','Valve', 'Valve', 'MOBA', 'Strategy', 1) , (730, 'Counter Strike: Global Offensive', 'Valve', 'Valve', 'Action', 'FPS', 1), (1172470, 'Apex Legends', 'Respawn Entertainment', 'Electronic Arts', 'Action', 'Adventure', 1), 
(578080, 'PUBG: BATTLEGROUNDS', 'KRAFTON Inc.', 'KRAFTON Inc.', 'Action', 'Adventure', 1), (1063730, 'New World', 'Amazon Games', 'Amazon Games', 'Action', 'MMO', 0), (440, 'Team Fortress 2', 'Valve', 'Valve', 'Action', 'FPS', 1),
(271590, 'Grand Theft Auto 5', 'Rockstar North', 'Rockstar Games', 'Action', 'Open World', 0),
(1599340, 'Lost Ark',' Smilegate RPG', 'Amazon Games', 'Action', 'MMO', 1),
(550, 'Left 4 Dead 2', 'Valve', 'Valve', 'Multiplayer', 'Zombie', 0),
(304930, 'Unturned', 'Smartly Dressed Games', 'Smartly Dressed Games', 'Multiplayer', 'Zombie', 1),
(252490, 'Rust', 'Facepunch Studios', 'Facepunch Studios', 'Action', 'RPG', 0),
(230410, 'Warframe', 'Digital Extremes', 'Digital Extremes', 'Multiplayer', 'Action', 1),
(105600, 'Terraria', 'Re-logic', 'Re-Logic', 'Action', 'Simulation', 0),
(4000, 'Garry''s Mod', 'Facepunch Studios', 'Valve', 'Indie', 'Simulation', 0),
(1245620, 'Elden Ring', 'FromSoftware Inc.', 'Bandai Namco', 'Open World', 'RPG', 0),
(291550, 'Brawlhalla', 'Blue Mammoth Games', 'Ubisoft', 'Action', 'Indie', 1),
(236390, 'War Thunder', 'Gaijin Entertainment', 'Gaijin Distribution KFT', 'Action', 'Simulation', 1);

INSERT INTO games (appId, game, Developer, Publisher, genre1,genre2,is_free)
VALUES (340, 'Half-Life 2: Lost Coast', 'Valve', 'Valve', 'Action', 'FPS', 0),
(945360, 'Among Us', 'Innersloth', 'Innersloth', 'Casual', 'Horror', 0),
(1085660, 'Destiny 2', 'Bungie', 'Bungie', 'Action', 'Adventure', 1),
(755790, 'Ring of Elysium', 'Aurora Studio', 'TCH Scarlet Limited', 'Multiplayer', 'FPS', 1),
(359550, 'Tom Clancy''s Rainbow Six Siege', 'Ubisoft Montreal', 'Ubisoft', 'Action', 'FPS', 0),
(238960, 'Path of Exile', 'Grinding Gear Games', 'Grinding Gear Games', 'Action', 'RPG', 1),
(218620, 'Payday 2', 'OVERKILL - a Starbreeze Studio.', 'Starbreeze Publishing AB', 'Action', 'RPG', 0),
(892970, 'Valheim', 'Iron Gate AB', 'Coffee Stain Publishing', 'Adventure', 'RPG', 0),
(901583, 'Grand Theft Auto IV: Complete Edition', 'Rockstar 0rth', 'Rockstar Games', 'Open World', 'Action', 0),
(1091500, 'Cyberpunk 2077', 'CD Projekt Red', 'CD Projekt Red', 'Open World', 'RPG', 0),
(1097150, 'Fall Guys', 'Mediatonic', 'Mediatonic', 'Casual', 'Sports', 1),
(242760, 'The Forest', 'Endnight Games Ltd', 'Endnight Games Ltd', 'Survival', 'Simulation', 0),
(346110, 'ARK: Survival Evolved', 'Studio Wildcard', 'Studio Wildcard', 'Survival', 'MMO', 0),
(2050650, 'Resident Evil 4', 'CAPCOM Co., Ltd.', 'CAPCOM Co., Ltd.', 'Action', 'Horror', 0),
(444090, 'Paladins', 'Evil Mojo Games', 'Hi-Rez Studios', 'Action', 'FPS', 1),
(291480, 'Warface', 'MY.GAMES', 'MY.GAMES', 'FPS', 'MMO', 1);

INSERT INTO games (appId, game, Developer, Publisher, genre1,genre2,is_free)
values (10, 'Counter-Strike', 'Valve', 'Valve', 'Action', 'FPS', 0),
(49520, 'Borderlands 2', 'Gearbox Software', '2K', 'Open World', 'FPS', 0),
(413150, 'Stardew Valley', 'ConcernedApe', 'ConcernedApe', 'Simulation', 'Adventure', 0),
(272060, 'Serena', 'Senscape', 'Senscape', 'Horror', 'Indie', 1),
(292030, 'The Witcher 3: Wild Hunt', 'CD PROJEKT RED', 'CD PROJEKT RED', 'Open World', 'RPG', 0),
(381210, 'Dead By Daylight', 'Behaviour Interactive Inc.', 'Behaviour Interactive Inc.', 'Horror', 'Multiplayer', 0),
(1240440, 'Halo Infinite', '343 Industries', 'Xbox Game Studios', 'Action', 'FPS', 1),
(227940, 'Heroes & Generals', 'TLM Partners', 'TLM Partners', 'Action', 'Strategy', 1),
(438100, 'VRChat', 'VRChat Inc.', 'VRChat Inc.', 'Multiplayer', 'Simulation', 1),
(252950, 'Rocket League', 'Psyonix LLC', 'Psyonix LLC', 'Racing', 'Sports', 1),
(227300, 'Euro Truck Simulator 2', 'SCS Software', 'SCS Software', 'Simulation', 'Indie', 0),
(620, 'Portal 2', 'Valve', 'Valve', 'Stategy', 'FPS', 0 ),
(320, 'Half-Life 2: Deathmatch', 'Valve', 'Valve', 'Action', 'FPS', 0),
(739630, 'Phasmophobia', 'Kinetic Games', 'Kinetic Games', 'Horror', 'Multiplayer', 0),
(386360, 'SMITE', 'Titan Forge Games', 'Hi-Rez Studios', 'Action', 'MOBA', 1),
(322330, 'Don''t Starve Together', 'Klei Entertainment', 'Klei Entertainment', 'Adventure', 'Simulation', 0),
(990080, 'Hogwarts Legacy', 'Avalanche Software', 'Warner Bros. Games', 'Adventure', 'RPG', 0);