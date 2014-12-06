
		<?php
	session_start();
	include 'users.php'; /* ficheiro q contem varias funcoes relacionadas com a gestao dos users */
	include 'polls.php';
	include 'connection.php';		
	if(isset($_GET['action'])=='submitfunc') /* quando se clica no botao confirm do ficheiro login.php faz com q esta condicao seja satisfeita */
	{
		$usr=$_SESSION['username'];
		$usrid=getUserId($usr);
		$db->exec('PRAGMA foreign_keys = ON;');
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
		header('Location: createdPolls.php');/* vai para a pagina do user */
exit;
		}
	?>		
