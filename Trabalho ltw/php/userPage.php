<!DOCTYPE html>
<html>
  <head>
	<meta name="generator"
	content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
	<title>yourPoll - Register</title>
	<meta charset="UTF-8" />
	
	
	<link rel="stylesheet" href="../css/style.css" />
	
	
	
  </head>
  <body>

	<div id="header">
	  <h1>YourPOLL</h1>
	  <h2>User Info</h2>
	</div>
	<div id="content">
	  <div class="item">
		<h3>Welkome <?php


	include 'users.php'; /* ficheiro q contem varias funcoes relacionadas com a gestao dos users */
showUserName(); /* funcao do ficheiro users.php q mostra o user com sessao iniciada no browser */

?> this is your info:</h3><br>
 <?php
 showUserInfo(); /* funcao do ficheiro users.php q mostra toda a informacao do user */
 ?>
	  </div>
	</div>
	<div id="footer">
	  <p>poll - 2014</p>
	</div>
  </body>
</html>
