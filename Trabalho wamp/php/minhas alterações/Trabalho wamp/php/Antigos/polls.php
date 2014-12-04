

<?php
/* funcao q mostra o id do poll */
/* function getPollId($){ 
include 'connection.php';
session_start();
$usr= $_SESSION['user'];

$stmt = $db->prepare('SELECT * FROM Users WHERE username= :username');

$stmt->bindParam(':username', $usr);
$result = $stmt->execute();	
	 $row= $result->fetchArray();
	 return $row['id'];
	}  */

function showPollAnswers($pollid){
include 'connection.php';
$pollsinfo = "SELECT * FROM PollAnswers WHERE pollId= '$pollid' ORDER BY answerId";
	$result= $db->query($pollsinfo);
	
	while($row= $result->fetchArray(SQLITE3_ASSOC)){
	echo $row['answer'];
	echo "<br>";

	}
}	
	
function showUserPolls($usrid){
include 'connection.php';
$pollsinfo = "SELECT * FROM Polls WHERE ownerId= '$usrid' ORDER BY id";
	$result= $db->query($pollsinfo);
	
	while($row= $result->fetchArray(SQLITE3_ASSOC)){
	echo $row['question'];
	echo "<br>";
	$pollid= $row['id'];
	showPollAnswers($pollid);
	echo "<br>";
	}
}
	
//Ficheiro para criar a base de dados e ler informacao das tabelas
//Correndo este ficheiro exatamente como esta so serve para ler a informacao da tabela Users: da jeito para verificar a criacao de users apos o registo




//criacao da tabela de Users. Depois da tabela estar criada nao e preciso voltar a criar
/*  $db->exec('CREATE TABLE Users (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	username VARCHAR UNIQUE,
	password VARCHAR)');
	
$db->exec("INSERT INTO Users (username, password) VALUES ('ric', 'mypass')"); */


//mostra toda a informacao da tabela Users:
// $usersinfo = "SELECT * FROM Users ORDER BY id";
	// $result= $db->query($usersinfo);
	
// echo '<form class="choosePoll" action="?action=submitfunc" method="post" >';
// echo "choosePoll: ". '<br>';
	// while($row= $result->fetchArray(SQLITE3_ASSOC)){
	// echo '<p>' . $row['id'] . '<input type="radio" name="poll" value='.$row['id'].'>' . $row['username'] . " " . $row['password'] . '</p>';
	// }
	// echo '<p>' . '<input type="submit" value="Confirm" name="submit" >' . '</p>';
	// echo '<p>' . '</form>' . '</p>';
	// /* print_r($row); 
	// echo "<br>"; */
	

// if(isset($_GET['action'])=='submitfunc') /* quando se clica no botao confirm do ficheiro login.php faz com q esta condicao seja satisfeita */
// {
// $opt = $_POST['poll'];
// echo '<p>' . $opt . '</p>';
// }

// $db2 = new SQLite3('yourpoll.db');		
// $stmt2 = $db2->prepare('SELECT * FROM Users WHERE id= :opt');

// $stmt2->bindParam(':opt', $opt);
// $result2 = $stmt2->execute();	
	 // $row2= $result2->fetchArray();
	 // echo $row2['id'];
	// echo "<br>";
	// echo $row2['username'];
	// echo "<br>";
	// echo $row2['password'];
	// echo "<br>"; 
 	


?>