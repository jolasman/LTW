<!DOCTYPE html>
<html>
  <head>
	<meta name="generator"
	content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
	<title>yourPoll - Register</title>
	<meta charset="UTF-8" />
	
	<link rel="stylesheet" href="../css/style.css" />
	
	<?php include 'loginProcess.php';?> <!--include do ficheiro q faz todo o processo de login do user apos clicar no botao confirm -->
	
  </head>
  <body>
  
	<div id="header">
	  <h1>YourPOLL</h1>
	  <h2>Login</h2>
	</div>
	<div id="content">
	  <div class="item">
		<h3>Please login:</h3>
		
		<form class="registerForm" action="?action=submitfunc" method="post"> <!-- quando se clica em confirm faz iniciar a acao submitfunc q por sua vez faz iniciar todo o codigo do ficheiro loginProcess-->
		Username: <input type="text" name="username" required="required"><br>
		Password: <input id="pass" type="password" name="pass" required="required" ><br>

		<input type="submit" value="Confirm" name="submit">
		</form>

	  </div>
	</div>
	<div id="footer">
	  <p>poll - 2014</p>
	</div>
  </body>
</html>
