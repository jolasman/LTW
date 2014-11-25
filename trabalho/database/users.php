<?php
	function createUser($username, $password)
	{
		$stmt = $db->prepare('INSERTO INTO Users VALUES (NULL, :username, :password)');
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->bindParam(':username', $password, PDO::PARAM_STR);
		$stmt->execute();
	}
?>