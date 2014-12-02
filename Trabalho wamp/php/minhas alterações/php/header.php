<!DOCTYPE html>
<html>
  <head>
    <title>Your Poll</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div id="header">
      <h1>Your Poll</h1>
      
    </div>
    <div id="menu">
      <ul>
        <li><a href="createdPolls.php">Polls created</a></li>
        <li><a href="">Answered Polls</a></li>
        <li><a href="createPoll.php">Create Poll</a></li>
        <li><a href="">Answer a Poll</a></li>

      </ul>
      <?php if (isset($_SESSION['username'])) { ?>
      <form action="logoutProcess.php" method="post">
        <label><?=$_SESSION['username']?></label>
        <input class= "buttons" type="submit" value="Logout">
      </form>
      <?php } else { ?>
	  <a href="login.php">Login</a> <!-- chama a pagina de login -->

      <a href="register.php">Register</a> <!-- chama a pagina de registo -->
      <?php } ?>
    </div>

