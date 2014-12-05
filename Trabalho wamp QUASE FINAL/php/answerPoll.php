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
  <?php include 'users.php';
  include 'polls.php';
  
  ?>
  </head>
  
  <body>
	<div id="header">
	  <h2>Choose a Poll</h2>
	  <?php
	  session_start();
		include 'header.php';  
		?>
	</div>
	
	<div id="content">
		<?php 
/* if(isset($_GET['action'])=='submitfunc'){
if(isset ($_POST['poll'])){
header('Location: answerPollProcess.php');//fica na mesma pagina

}
} */




			if (isset($_SESSION['username'])) {
			
			echo "<h3>" . "Please choose a Poll to answer:" . "</h3>";
			
			include 'connection.php';// connects to the database
			$userid= getUserId($_SESSION['username']);
			$usersinfo = "SELECT * FROM Polls ORDER BY id";
			$result= $db->query($usersinfo);




			
if(isset($_POST['poll'])) {
  $_SESSION["poll"] = $_POST['poll'];
  header('Location: answerPollProcess.php');/* vai para a pagina do user */
exit;
}
			

			echo '<form class="choosePoll" method="post" >';
			
			while($row= $result->fetchArray(SQLITE3_ASSOC)){
			$pollId=$row['id'];
			
			if (!pollAnswered($pollId,$userid)){
			echo '<p>' . '<input type="radio" name="poll" value='.$row['id'].'>' . " " . $row['question'] . '</p>';
			}
			}
			echo '<p>' . '<input type="submit" value="Confirm" name="submit" >' . '</p>';
			echo '<p>' . '</form>' . '</p>';
			
			
			} else
			echo "<p>" . "Please Login or Register" . "</p>";
		?>	
		
	</div>
	
	<div id="footer">
	  <p>poll - 2014</p>
	</div>
  </body>
</html>
