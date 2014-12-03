<!DOCTYPE html>
<html>
  <head>
	<meta name="generator"
	content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
	<title>yourPoll - Create Poll</title>
	<meta charset="UTF-8" />
	<script type="text/javascript" src="../js/script.js"></script>
	<link rel="stylesheet" href="../css/createpollstyle.css" />

  </head>
  
  <body>
  
	<div id="header">
	  <h2>Create Poll</h2>
	  <?php
		session_start();
		include 'header.php';  
		include 'users.php'; /* ficheiro q contem varias funcoes relacionadas com a gestao dos users */
		?>
	</div>

	<div id="img">	<img src="../img/poll2.jpg" alt="Smiley face" height="200" width="200"> </div>
	<div id="content">
		<?php if (isset($_SESSION['username'])) {?>
		<h3>Please fill the fields to create yourPoll:</h3>
		
		<form class="pollForm" action="?action=submitfunc"  method="post">
			Poll Question: <span>* </span><input type="text" name="pollquestion" placeholder="Poll Name" required="required"><br>
			Answer 1: <span>* </span><input type="textarea" name="answer1" required="required"><br>
			Answer 2: <span>* </span><input type="textarea" name="answer2" required="required"><br>
			<div id='newAnswer'> </div>
			<button onclick="addAnswer(); return false;">add answer</button><br>
			<input class = "buttons2"type="submit" value="Confirm" name="submit" >
		</form>
	
		<script>		
			var i = 3;
		</script>
		
		
		
		
		<?php
	
	include 'polls.php';
	include 'connection.php';		
	if(isset($_GET['action'])=='submitfunc') /* quando se clica no botao confirm do ficheiro login.php faz com q esta condicao seja satisfeita */
	{
		$usr=$_SESSION['username'];
		$usrid=getUserId($usr);
		/* $db->exec('PRAGMA foreign_keys = ON;'); */
		$quest= $_POST['pollquestion'];

		$db->exec("INSERT INTO Polls (ownerId, question) VALUES ('$usrid', '$quest')");
		$pollId= $db->lastInsertRowID();
		$count = count($_POST);
		$i=1;

		while($i <=  $count-2 ){
		if(!empty($_POST['answer'.$i])){
		$ansr= $_POST['answer'.$i];
		$db->exec("INSERT INTO PollAnswers (pollId, answer) VALUES ('$pollId', '$ansr')");
		}
		$i++;
		}
		}
	?>		
	
		<p>
		  <span>*</span> required fields
		</p>
	<?php } else
	echo "<p>" . "Please Login or Register" . "</p>";
	?>	
	</div>
	
	
	
	<div id="footer">
	  <p>poll - 2014</p>
	</div>
  </body>
</html>
