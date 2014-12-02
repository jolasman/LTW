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
        <li><a href="">tab1</a></li>
        <li><a href="">tab2</a></li>
        <li><a href="">tab3</a></li>
        <li><a href="">tab4</a></li>
        <li><a href="">tab5</a></li>
      </ul>
      <?php if (isset($_SESSION['username'])) { ?>
      <form action="logoutProcess.php" method="post">
        <label><?=$_SESSION['username']?></label>
        <input type="submit" value="Logout">
      </form>
      <?php } else { ?>
      <form action="loginProcess.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="&gt;&gt;">
      </form>
      <?php } ?>
    </div>
    <div id="content">
