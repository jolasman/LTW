<!DOCTYPE html>
<html>
  <head>
   
    <meta charset="utf-8">
	
	<link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>

  <?php
	include 'users.php';  /* ficheiro q contem varias funcoes relacionadas com a gestao dos users */
    if(isset($_GET['action'])=='submitfunc') /* quando se clica no botao confirm do ficheiro register.php faz com q esta condicao seja satisfeita */
{
$username = $_POST['username'];
$password = $_POST['pass1'];
if (item_exists($username, 'username')){ /* funcao do ficheiro users.php q verifica se na tabela de Users ha um user com username==$username */
$message = "That user already exists!";
echo "<script type='text/javascript'>alert('$message');</script>";
}
else
{

saveUser($username, $password); /*funcao do ficheiro users.php q guarda os dados do user na tabela de users */

startSession($username); /* funcao do ficheiro users.php q inicia no browser uma sessao para o user com username==$username */
header('Location: userPage.php');/* vai para a pagina do user */
exit;
}
}

?>
 </body>
</html>