

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
	
	
	//***************************************
	echo "TEST AND";
	$stmt = $db->prepare('SELECT * FROM Polls WHERE ownerId= :ownerId AND question= :question');
	$id=11;
$stmt->bindParam(':ownerId', $id);
$quest="Football club?";
$stmt->bindParam(':question', $quest);
$result = $stmt->execute();	
	 while($row= $result->fetchArray()){
	 echo $row['id'];
	echo "<br>";
	echo $row['ownerId'];
	echo "<br>";
	echo $row['question'];
	echo "<br>";
	}
	echo "TEST AND";
	
	//************************************* mostra todos os polls e permite selecionar 1 e mostra a toda a info desse poll: *************************************************
$usersinfo = "SELECT * FROM Polls ORDER BY id";
	$result= $db->query($usersinfo);
	
echo '<form class="choosePoll" action="?action=submitfunc" method="post" >';
echo "choosePoll: ". '<br>';
	while($row= $result->fetchArray(SQLITE3_ASSOC)){
	
	//criar condicao para q o formulario so tenha polls ainda n respondidos. So mostra os polls em q o seu pollId nao seja membro da tab UserAnswer para o user atual
	echo '<p>' . $row['id'] . '<input type="radio" name="poll" value='.$row['id'].'>' . $row['ownerId'] . " " . $row['question'] . '</p>';
	}
	echo '<p>' . '<input type="submit" value="Confirm" name="submit" >' . '</p>';
	echo '<p>' . '</form>' . '</p>';
	/* print_r($row); 
	echo "<br>"; */
	

if(isset($_GET['action'])=='submitfunc') /* quando se clica no botao confirm do ficheiro login.php faz com q esta condicao seja satisfeita */
{
$opt = $_POST['poll'];
echo '<p>' . $opt . '</p>';
}

	
$stmt = $db->prepare('SELECT * FROM Polls WHERE id= :opt');

$stmt->bindParam(':opt', $opt);
$result = $stmt->execute();	
	 $row= $result->fetchArray();
	 echo $row['id'];
	echo "<br>";
	echo $row['ownerId'];
	echo "<br>";
	echo $row['question'];
	echo "<br>";

$stmt = $db->prepare('SELECT * FROM PollAnswers WHERE pollId= :opt ORDER BY answerId');
$stmt->bindParam(':opt', $opt);
	$result= $stmt->execute();
	$i=1;
echo '<form class="chooseAnswer" action="?action=submitfunc" method="post" >';
echo "chooseAnswer: ". '<br>';
	while($row= $result->fetchArray()){
	echo '<p>' . $i . '<input type="radio" name="answer" value='.$row['answerId'].'>' . $row['pollId'] . " " . $row['answer'] . '</p>';
	$i++;
	}
	echo '<p>' . '<input type="submit" value="Confirm" name="submit" >' . '</p>';
	echo '<p>' . '</form>' . '</p>';
	
	if(isset($_GET['action'])=='submitfunc') /* quando se clica no botao confirm do ficheiro login.php faz com q esta condicao seja satisfeita */
{
$answerId = $_POST['answer'];
echo '<p>'. "answer number: " . $answerId . '</p>';
}
?>