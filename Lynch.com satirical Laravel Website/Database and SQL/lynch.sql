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

-- INSERT

insert into User(Name, Lynch, IconId) values ('bcamell011', false, 1);
insert into User(Name, Lynch, IconId) values ('Chicken Salad', false, 1);
insert into User(Name, Lynch, IconId) values ('Tasty Banana', false, 1);

INSERT INTO Icon(Location) VALUES (NULL);

INSERT INTO Post(Id, UserId, Title, Message, Date) values (1, 1, "I like Banana", "They are very tasty, yes indeedidi", NULL);
INSERT INTO Post(Id, UserId, Title, Message, Date) values (2, 2, "very nicea", "I like em", NULL);
INSERT INTO Post(Id, UserId, Title, Message, Date) values (3, 3, "Test", "Very Tasty", NULL);
INSERT INTO Post(Id, UserId, Title, Message, Date) values (4, 1, "McChicken", "McBites", NULL);


INSERT INTO Comment(Id, PostId, Message, UserId) VALUES (1, 1, "WITNESS", 1);
INSERT INTO Comment(Id, PostId, Message, UserId) VALUES (2, 1, "I like it too", 1);
INSERT INTO Comment(Id, PostId, Message, UserId) VALUES (3, 2, "Tasty", 1);
INSERT INTO Comment(Id, PostId, Message, UserId) VALUES (4, 3, "Banana", 1);
