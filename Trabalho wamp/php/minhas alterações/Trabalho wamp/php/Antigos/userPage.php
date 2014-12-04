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
		session_start();
		include_once("header.php");  
		include 'users.php'; /* ficheiro q contem varias funcoes relacionadas com a gestao dos users */
		
	
?> 

</h3><br>
 <?php
 <?php if (isset($_SESSION['username'])) {
 include 'polls.php';
 $usrid=getUserId($usr);

 showUserPolls($usrid); /* funcao do ficheiro polls.php q mostra todos os polls criados pelo user */
 $file="createPoll.php";
 $name="Create a new poll";
 echo "<a href=$file>$name</a>"}
 ?>
  <!-- chama a pagina de criacao de um novo poll -->
	  </div>
	</div>
	<div id="footer">
	  <p>poll - 2014</p>
	</div>
  </body>
</html>
