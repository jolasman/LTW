DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Polls;
DROP TABLE IF EXISTS PollAnswers;
DROP TABLE IF EXISTS UserAnswer;

CREATE TABLE Users
(
	id				INTEGER PRIMARY KEY AUTOINCREMENT,
	username	VARCHAR UNIQUE,
	password	VARCHAR
);

CREATE TABLE Polls
(
	id				INTEGER PRIMARY KEY AUTOINCREMENT,
	ownerId		INTEGER REFERENCES Users,
	question	VARCHAR,
	isPublic	INTEGER
);

CREATE TABLE PollAnswers
(
	answerId	INTEGER PRIMARY KEY AUTOINCREMENT,
	pollId		INTEGER REFERENCES Polls,
	answer		VARCHAR,
	UNIQUE(pollId, answer)
);

CREATE TABLE UserAnswer
(
	pollId	INTEGER REFERENCES Polls,
	userId	INTEGER REFERENCES Users,
	answerId INTEGER REFERENCES PollAnswers(answerId),
	PRIMARY KEY(pollId, userId)
);