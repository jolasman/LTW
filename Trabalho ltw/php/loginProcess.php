<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
	
	<link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>

  <?php
	include 'users.php';  /* ficheiro q contem varias funcoes relacionadas com a gestao dos users */
    if(isset($_GET['action'])=='submitfunc') /* quando se clica no botao confirm do ficheiro login.php faz com q esta condicao seja satisfeita */
{
$username = $_POST['username'];
$password = $_POST['pass'];
if (!item_exists($username, 'username')){ /* funcao do ficheiro users.php q verifica se na tabela de Users ha um user com username==$username */
$message = "That username does not exist! Insert your username.";
echo "<script type='text/javascript'>alert('$message');</script>";
}
else
{
if(!verifyPass($username,$password)) /* funcao do ficheiro users.php q verifica se na tabela de Users o user com username==$username tem a password== $password */
{
$message = "The password is not correct! Insert the password again.";
echo "<script type='text/javascript'>alert('$message');</script>";
} else
{
startSession($username); /* funcao do ficheiro users.php q inicia no browser uma sessao para o user com username==$username */
header('Location: userPage.php'); /* vai para a pagina do user*/
exit;
}
}
}

?>
 </body>
</html>