

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


?>