

<?php
//Ficheiro para criar a base de dados e ler informacao das tabelas
//Correndo este ficheiro exatamente como esta so serve para ler a informacao da tabela Users: da jeito para verificar a criacao de users apos o registo

$db = new SQLite3('yourpoll.db');//faz a ligacao a base de dados ou cria se ela nao existir


//criacao da tabela de Users. Depois da tabela estar criada nao e preciso voltar a criar
/*  $db->exec('CREATE TABLE Users (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	username VARCHAR UNIQUE,
	password VARCHAR)');
	
$db->exec("INSERT INTO Users (username, password) VALUES ('ric', 'mypass')"); */


//mostra toda a informacao da tabela Users:
$usersinfo = "SELECT * FROM Users ORDER BY id";
	$result= $db->query($usersinfo);
	
	while($row= $result->fetchArray(SQLITE3_ASSOC)){
	/* echo $row['id'];
	echo "<br>";
	echo $row['username'];
	echo "<br>";
	echo $row['password']; */
	print_r($row); 
	echo "<br>";
	}

//criacao da tabela de Polls. Depois da tabela estar criada nao e preciso voltar a criar

/* $db->exec('CREATE TABLE Polls (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	ownerId INTEGER REFERENCES Users(id),
	question VARCHAR
	)'
	); */

 // Drop table Polls from file db
   /*  $db->exec("DROP TABLE Polls"); */


/* $db->exec('PRAGMA foreign_keys = ON;');
$db->exec("INSERT INTO Polls (ownerId, question) VALUES (18, 'What is your favourite car?')");
 */
/* var_dump($db->query('PRAGMA foreign_keys;')->fetchArray()); */

 
//mostra toda a informacao da tabela Polls:
$pollsinfo = "SELECT * FROM Polls ORDER BY id";
	$result= $db->query($pollsinfo);
	
	while($row= $result->fetchArray(SQLITE3_ASSOC)){
	/* echo $row['id'];
	echo "<br>";
	echo $row['username'];
	echo "<br>";
	echo $row['password']; */
	print_r($row); 
	echo "<br>";
	}

	/* $db->exec('CREATE TABLE PollAnswers (
	answerId INTEGER PRIMARY KEY AUTOINCREMENT,
	pollId INTEGER REFERENCES Polls(id),
	answer VARCHAR,
	UNIQUE(pollId, answer)
	)'
	); */
	
	/* $db->exec('PRAGMA foreign_keys = ON;');
$db->exec("INSERT INTO PollAnswers (pollId, answer) VALUES (1, 'rice')"); */


/* echo $db->lastInsertRowID(); */
//mostra toda a informacao da tabela PollAnswers:
$pollAnswersinfo = "SELECT * FROM PollAnswers ORDER BY answerId";
	$result= $db->query($pollAnswersinfo);
	
	while($row= $result->fetchArray(SQLITE3_ASSOC)){
	/* echo $row['id'];
	echo "<br>";
	echo $row['username'];
	echo "<br>";
	echo $row['password']; */
	print_r($row); 
	echo "<br>";
	}
	
	//criacao da tabela de UserAnswer. Depois da tabela estar criada nao e preciso voltar a criar
 /* $db->exec('CREATE TABLE UserAnswer (
	pollId INTEGER REFERENCES Polls(id),
	userId	INTEGER REFERENCES Users(id),
	answerId INTEGER REFERENCES PollAnswers(answerId),
	PRIMARY KEY(pollId, userId)
	)'); */
	
	//mostra toda a informacao da tabela UserAnswer:
$info = "SELECT * FROM UserAnswer ORDER BY userId";
	$result= $db->query($info);
	
	while($row= $result->fetchArray(SQLITE3_ASSOC)){
	/* echo $row['id'];
	echo "<br>";
	echo $row['username'];
	echo "<br>";
	echo $row['password']; */
	print_r($row); 
	echo "<br>";
	}
?>