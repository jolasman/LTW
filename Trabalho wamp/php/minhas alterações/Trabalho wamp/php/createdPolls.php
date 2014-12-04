<!DOCTYPE html>
<html>
  <head>
	<meta name="generator"
	content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
	<title>yourPoll - Polls created</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="../css/pollsstyle.css" />
	
	
  </head>
  
		<body>
		
		
			<div id="header">
				 <h2>Polls created</h2>
				<?php
					session_start();
					include 'header.php';  
					include 'users.php'; /* ficheiro q contem varias funcoes relacionadas com a gestao dos users */
				?> 
			</div>
			
			
			<div id="img">	<img src="../img/created.jpg" alt="Smiley face" height="100" width="100"> </div>
			
			<div id="img2">	<img src="../img/created2.jpg" alt="Smiley face" height="100" width="100"> </div>
			
			
			
			<div id="content">
				<?php if (isset($_SESSION['username'])) {
					include 'polls.php';
					$usr=$_SESSION['username'];
					$usrid=getUserId($usr);
					showUserPolls($usrid); /* funcao do ficheiro polls.php q mostra todos os polls criados pelo user */
					
					}
					else
						echo "<p>" . "Please Login or Register" . "</p>";
				?>
			</div>
	<div id="footer">
	  <p>poll - 2014</p>
	</div>
		</body>
</html>
