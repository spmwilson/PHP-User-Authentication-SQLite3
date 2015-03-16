<?php
	
class Database extends SQLite3 {
	
	public function __construct(){
		parent::__construct("a4.db");
	}
	
	function getNumberOfUsers(){
		$user_num = $this->query("SELECT count(*)  FROM User");
		return $user_num->fetchColumn();
	}
	function getUsers(){
		$users = $this->query('SELECT * FROM User');
		return $users;
		
	}
	function getQuestionFromID($id){
		$qs = $this->query("SELECT * FROM Question WHERE Question.id = '".$id."'");
		return $qs;
	}
	function changeUserQuestion($username, $question, $answer){
		
		$answer = User::salt($answer);
		
		$newid = Database::getQuestionID($question);
		
		if ($newid == null){
			//New Security Question because it does not exist
			$this->exec("INSERT INTO Question (text) VALUES ('$question')");
			$newid = Database::getQuestionID($question);
			$this->exec("UPDATE User SET question_id='$newid' WHERE User.username = ('$username')");
			$this->exec("UPDATE User SET question_answer='$answer' WHERE User.username = ('$username')");
			echo '<pre class="bg-success">';
							echo 'Security Question Successfully Changed.';
							echo '</pre>';
		}
		else {
			$this->exec("UPDATE User SET question_id='$newid' WHERE User.username = ('$username')");
			$this->exec("UPDATE User SET question_answer='$answer' WHERE User.username = ('$username')");
			echo '<pre class="bg-success">';
							echo 'Security Question Successfully Changed.';
							echo '</pre>';
		}
		
	}
	function getQuestionID($question){
		$qs = $this->query("SELECT * FROM Question");
		
		while ($row = $qs->fetchArray()) {
				if ($row['text'] == $question){
					return $row['id'];
				}
			}
			return null;
	}
	
	
}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>