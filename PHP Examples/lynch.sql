CREATE TABLE IF NOT EXISTS User (
    Id INTEGER PRIMARY KEY,
    Name VARCHAR(12) DEFAULT '' NOT NULL UNIQUE,
    lynch BOOLEAN,
    IconId INTEGER NOT NULL REFERENCES Icon(Id)
    -- PostId INTEGER NOT NULL REFERENCES Post(Id)
);


CREATE TABLE IF NOT EXISTS Icon (
    Id INTEGER PRIMARY KEY,
    -- UserId INTEGER REFERENCES User(Id),
    Location TEXT
);

CREATE TABLE IF NOT EXISTS Post (
    Id INTEGER PRIMARY KEY,
    UserId INTEGER REFERENCES User(Id),
    Title TEXT,
    Message TEXT,
    Date DATE
    -- CommentId INTEGER NOT NULL REFERENCES Comment(Id)
    /* Users name will be taken from other table */
);

CREATE TABLE IF NOT EXISTS Comment (
    Id INTEGER PRIMARY KEY,
    PostId INTEGER REFERENCES Post(Id),
    Message TEXT,
    UserId INTEGER REFERENCES User(Id)
    /* Users name will be taken from other table */
);


insert into User(Name, Lynch, IconId) values ('bcamell011', false, 1);



-- INSERT INTO User (Name, IconId) 
-- VALUES 
-- ("JimmySon46", 1),
-- ("BRAINBOI", 2);

INSERT INTO Icon(Location) VALUES (NULL);

INSERT INTO Post(Id, UserId, Title, Message, Date) values (1, 1, "I like Banana", "They are very tasty, yes indeedidi", NULL);


INSERT INTO Comment(Id, PostId, Message, UserId) VALUES (1, 1, "I like it too", 1);

-- VALUES 
-- 
-- (2, 1, "CHICKEN", "They are very tasty", NULL),
-- (3, 2, "I Banana", "They are very", NULL);

-- INSERT INTO Comment (PostId, Message, UserId) 
-- VALUES 
-- (1, "I like it too", 1),
-- (1, "WITNESS", 2);