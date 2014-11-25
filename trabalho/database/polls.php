<?php
	function createPoll($owner, $question, $answers, $public)
	{
		$stmt = $db->prepare('INSERTO INTO Polls VALUES(NULL, :owner, :question, :public)');
		$stmt->bindParam(':owner', $owner, PDO::PARAM_INT);
		$stmt->bindParam(':question', $question, PDO::PARAM_STR);
		$stmt->bindParam(':public', $public, PDO::PARAM_INT);
		$stmt->execute();
		
		$id = $db->lastInsertId();
		
		foreach($answers as $answer)
		{
			$stmt = $db->prepare('INSERT INTO PollAnswers VALUES(:id, :answer)');
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
		}
	}
	
	function getAnswerCount($answerId)
	{
		$stmt = $db->prepare('SELECT COUNT(*) FROM UserAnswer WHERE answerId = :id');
		$stmt->bindParam(':id', answerId, PDO::PARAM_INT);
		$stmt->execute();
		
		$result = $stmt->fetchAll();
		return $result;
	}
	
	function getAnswersCount($poll)
	{
		$stmt = $db->prepare('SELECT DISTINCT answerId FROM PollAnswers WHERE pollId = :id');
		$stmt->bindParam(':id', $poll, PDO::PARAM_INT);
		$stmt->execute();
		
		$result = $stmt->fecthAll();
		$answersCount;
		foreach($result as $answerId)
		{
			$answersCount[$answerId] = getAnswerCount($answerId);
		}
		
		return $answersCount;
	}
?>