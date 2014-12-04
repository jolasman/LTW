
<?php
	function endSession($username)/* funcao q termina sessao do user no browser */
	{
	session_destroy();
	/* session_start();
	unset($_SESSION[$username]); */
/* header('Location: ../index.html');
exit; */
	}

	function startSession($username)/* funcao q inicia sessao do user no browser */
	{
	session_start();
$_SESSION['user']=$username;
	}

function item_exists($item_value,$item_type) /* funcao q verifica se ha algum valor do tipo $item_type na tabela users igual a $item_value */
{
   global $db;
   $IDq = $db->query("SELECT * FROM Users WHERE $item_type= '$item_value'");
   
   $IDf = $IDq->fetchArray(SQLITE3_ASSOC);
   if($IDf['id'])
   {
	 return true;
   } 
   else
   {
     return false;
   }
}

function verifyPass($user,$pass) /* funcao q verifica na base de dados se o user=$user tem a password=$pass */
{
   global $db;  
   $IDq = $db->query("SELECT * FROM Users WHERE username= '$user'");
   
   $IDf = $IDq->fetchArray(SQLITE3_ASSOC);
   if($IDf['password']== $pass)
   {
	 return true;
   } 
   else
   {

     return false;
   }
}

	function saveUser($username, $password){ /* funcao q guarda a informacao do user na tabela Users da base de dados */
		  include 'connection.php';
		$db->exec("INSERT INTO Users (username, password) VALUES ('$username', '$password')");

}

function showUserName(){ /* funcao q mostra o user com sessao iniciada no browser */
	/* session_start(); */
echo $_SESSION['user'];
}

function showUserInfo(){ /* funcao q mostra toda a informacao do user */
include 'connection.php';
$usr= $_SESSION['user'];

$stmt = $db->prepare('SELECT * FROM Users WHERE username= :username');

$stmt->bindParam(':username', $usr);
$result = $stmt->execute();	
	 $row= $result->fetchArray();
	 echo $row['id'];
	echo "<br>";
	echo $row['username'];
	echo "<br>";
	echo $row['password'];
	echo "<br>"; 
	} 

function getUserId($usr){ /* funcao q mostra o id do user */
include 'connection.php';
/* session_start(); */


$stmt = $db->prepare('SELECT * FROM Users WHERE username= :username');

$stmt->bindParam(':username', $usr);
$result = $stmt->execute();	
	 $row= $result->fetchArray();
	 return $row['id'];
	} 	
	
?>
