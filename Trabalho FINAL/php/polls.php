

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

function showPollAnswersStats($pollid){
include 'connection.php';
$pollsinfo = "SELECT * FROM PollAnswers WHERE pollId= '$pollid' ORDER BY answerId";
	$result= $db->query($pollsinfo);
	
	while($row= $result->fetchArray(SQLITE3_ASSOC)){
	echo $row['answer'];
	echo " :";
	$answerId=$row['answerId'];
$count=$db->querySingle("SELECT count(answerId) FROM UserAnswer WHERE pollId= '$pollid' AND answerId='$answerId'");
	echo "Answered times: " .  $count;
	echo "<br>";
	}
}
	
function showUserPolls($usrid){
include 'connection.php';
$pollsinfo = "SELECT * FROM Polls WHERE ownerId= '$usrid' ORDER BY id";
	$result= $db->query($pollsinfo);
	
	$count=$db->querySingle("SELECT count (id) FROM Polls WHERE ownerId= '$usrid'");

	if($count===0){
	
	echo "You have no polls created!";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "Please create a poll!";
	}
	while($row= $result->fetchArray(SQLITE3_ASSOC)){
	echo $row['question'];
	echo "<br>";
	$pollid= $row['id'];
	showPollAnswersStats($pollid);
	echo "<br>";
	}
}

function showUserAnswer($answerId){
include 'connection.php';
  $info = "SELECT * FROM PollAnswers WHERE answerId= '$answerId'";
	$result= $db->query($info);
	$row= $result->fetchArray(SQLITE3_ASSOC);

echo "Your answer: " . $row['answer'];
echo "<br>";
echo "<br>";
}

function showAnswaredPolls($usrid){
include 'connection.php';

  $stmt = $db->prepare('SELECT * FROM UserAnswer WHERE userId= :userId');
  $stmt->bindParam(':userId', $usrid);
  $result = $stmt->execute();
  
 
  while($row= $result->fetchArray())
  {
  
  
  $pollid=$row['pollId'];
  $pollsinfo = "SELECT * FROM Polls WHERE id= '$pollid' ORDER BY id";
	$result2= $db->query($pollsinfo);
	$row2= $result2->fetchArray(SQLITE3_ASSOC);
	echo $row2['question'];
	echo "<br>";
	$pollid=$row['pollId'];
	showPollAnswersStats($pollid);
	echo "<br>";
	showUserAnswer($row['answerId']);
	echo "<br>";
	}
   
}


function pollAnswered($pollId,$userid)
{
  global $db;
  $stmt = $db->prepare('SELECT * FROM UserAnswer WHERE pollId= :pollId AND userId= :userId');
  $stmt->bindParam(':pollId', $pollId);
  $stmt->bindParam(':userId', $userid);
  $result = $stmt->execute();
$answered=false;  
  while($row= $result->fetchArray())
  {$answered=true;}
   
     return $answered;

}

function saveAnswer($pollId, $userId, $answerId)
{
include 'connection.php';
$db->exec("INSERT INTO UserAnswer (pollId,userId, answerId) VALUES ('$pollId', '$userId', '$answerId')");

header('Location: answaredPolls.php');// vai para a pagina do user
exit;
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