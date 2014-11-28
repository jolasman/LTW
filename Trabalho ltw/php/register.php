<!DOCTYPE html>
<html>
  <head>
	<meta name="generator"
	content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
	<title>yourPoll - Register</title>
	<meta charset="UTF-8" />
	
	<!-- Load jQuery from Google's CDN -->
    <!-- Load jQuery UI CSS  -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    
    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	
	<link rel="stylesheet" href="../css/style.css" />
	
	<?php include 'registerProcess.php';?> <!--include do ficheiro q faz todo o processo de registo do user apos clicar no botao confirm -->
	
  </head>
  <body>
  
	<div id="header">
	  <h1>YourPOLL</h1>
	  <h2>Register</h2>
	</div>
	<div id="content">
	  <div class="item">
		<h3>Please fill the form to register:</h3>
		
		<form class="registerForm" action="?action=submitfunc" method="post" onsubmit="return checkForm(this);"> <!-- quando se clica em confirm faz iniciar a acao submitfunc q por sua vez faz iniciar todo o codigo do ficheiro registerProcess-->
		Username: <span>* </span><input type="text" name="username" required="required"><br>
		
		Password: <span>* </span><input id="pass1" type="password" name="pass1" required="required" ><br>
		Confirm Password: <span>* </span><input id="pass2" type="password" name="pass2" required="required" onkeyup="checkPass();">
		<span id="confirmMessage" class="confirmMessage"></span><br>
		Gender:<br>
		Male <input type="radio" name="gender"><br>
		Female <input type="radio" name="gender"><br>
<!-- 		Birthday: <span>* </span><input type="date" id="birthday" name="birthday" max="1997-12-31" ><br>
 -->		Birthday: <span>* </span><input type="text" id="datepicker"><br>
		
		
		
		Country: 
		<select id="countries" name="countrie" onmouseup="myFunction()">
		<option value="France">France</option>
		<option value="Portugal">Portugal</option>
		<option value="Spain">Spain</option>
		</select required="required"><br>

		<p id="countrieDemo"></p>
		
	
		<script>
function myFunction() {
    var x = document.getElementById("countries");
    document.getElementById("countrieDemo").innerHTML = x.value;
}
</script>
		
		
	
		<input type="submit" value="Confirm" name="submit" >
		</form>
	
		<p>
		  <span>*</span> required fields
		</p>
	  </div>
	</div>
	<div id="footer">
	  <p>poll - 2014</p>
	</div>
  </body>
</html>
