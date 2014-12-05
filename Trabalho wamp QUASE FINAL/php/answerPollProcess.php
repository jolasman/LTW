<!DOCTYPE html>
<html>
  <head>
	<meta name="generator"
	content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
	<title>yourPoll - Create Poll</title>
	<meta charset="UTF-8" />
	<script type="text/javascript" src="../js/script.js"></script>
	<link rel="stylesheet" href="../css/createpollstyle.css" />
	<?php /* include 'answerPollProcess.php'; */?> <!--include do ficheiro q faz todo o processo de criacao do user apos clicar no botao confirm -->
  <?php
  
   include 'users.php';
  include 'polls.php'; 
  
  ?>
  </head>
  
  <body>
	<div id="header">
	  <h2>Choose a Poll</h2>
	  <?php
	  session_start();
	  /* if($_POST['poll']=="")
			{header('Location: answerPoll.php');// vai para a pagina do user
exit;} */
		include 'header.php';  
		?>
	</div>
	
	<div id="content">
		<?php 
		
		
			if (isset($_SESSION['username'])) {
			 include 'connection.php';
			$opt = $_SESSION["poll"];
/* echo '<p>' . $opt . '</p>'; */


	
$stmt = $db->prepare('SELECT * FROM Polls WHERE id= :opt');

$stmt->bindParam(':opt', $opt);
$result = $stmt->execute();	
	 $row= $result->fetchArray();
	 /* echo $row['id'];
	echo "<br>"; */
	/* echo $row['ownerId'];
	echo "<br>"; */
	echo $row['question'];
	echo "<br>";

$stmt = $db->prepare('SELECT * FROM PollAnswers WHERE pollId= :opt ORDER BY answerId');
$stmt->bindParam(':opt', $opt);
	$result= $stmt->execute();
	$i=1;
echo '<form class="chooseAnswer" method="post" >';
echo "<p>" . "Choose answer:" . "</p>";
	while($row= $result->fetchArray()){
	echo '<p>' . '<input type="radio" name="answer" value='.$row['answerId'].'>' . " " . $row['answer'] . '</p>';
	$i++;
	}
	echo '<p>' . '<input type="submit" value="Confirm" name="submit" >' . '</p>';
	echo '<p>' . '</form>' . '</p>';

	if( isset ($_POST['answer'])){
		$userId=getUserId($_SESSION['username']);
		$answerId = $_POST['answer'];
		saveAnswer($opt, $userId, $answerId);
}
			} else
			echo "<p>" . "Please Login or Register" . "</p>";
		?>	
	</div>
	
	<div id="footer">
	  <p>poll - 2014</p>
	</div>
  </body>
</html>
 
 
 
 <?php
  /*  include 'connection.php';// connects to the database

 if(isset($_GET['action'])=='submitfunc') // quando se clica no botao confirm do ficheiro login.php faz com q esta condicao seja satisfeita 
{

	} */


?>