<?php
/**
 * An adaptation of the User used in last lecture.
 * @author jgruiz
 *
 */
require_once "config.php";

class User {
	public $first_name            = '';          /* Users first name */
	public $last_name             = '';           /* Users last name */
	public $username             = '';              /* User Name */
	public $hash                  = '';   
	public $question_id				  = '';           
	public $question_answer				  = ''; 

	public function __construct($first = "", $last = "",
			 $username = "", $passwd = "", $question_id = "", $question_answer =""){
		$this->first_name = $first;
		$this->last_name  = $last;
		$this->username  = $username;
		$this->hash = $passwd;
		$this->question_id = $question_id;
		$this->question_answer = $question_answer;
	}
	/* This function provides a complete tab delimeted dump of the contents/values of an object */
	public function contents() {
		$vals = array_values(get_object_vars($this));
		return( array_reduce($vals, create_function('$a,$b',
				'return is_null($a) ? "$b" : "$a"."\t"."$b";')));
	}
	/* Companion to contents, dumps heading/member names in tab delimeted format */
	public function headings() {
		$vals = array_keys(get_object_vars($this));
		return( array_reduce($vals,
				create_function('$a,$b','return is_null($a) ? "$b" : "$a"."\t"."$b";')));
	}
	
	public static function setupDefaultUsers() {
		
	}
	
	public static function writeUsers($users) {
		
	}
	
	public static function readUsers() {
		try {
			$dbh = new Database('a4.db');
			$allusers = $dbh->getUsers();
			
		} catch (PDOException $e) {
			/* If you get here it is mostly a permissions issue
			 * or that your path to the database is wrong
			 */
			echo '<pre class="bg-danger">';
			echo 'Connection failed: ' . $e->getMessage();
				echo '</pre>';
				die;
		}
		return $allusers;
	}
	
	public static function loginRequired(){
		global $_SESSION;
		global $config;
		
		if(isset($_SESSION["username"])){
			$users = User::readUsers();
			while ($row = $users->fetchArray()) {
				if ($row['username'] == $_SESSION['username']){
					return;
				}
			}	
		}
		$_SESSION['redirect'] = $_SERVER["REQUEST_URI"];
		//If we got here then we need to log in
		header("Location: " . $config->base_url . "/login.php");
		exit();
	}
	
	public static function getUser($username, $password){
		$users = User::readUsers();

		$allusers = array();
		
			while ($row = $users->fetchArray()) {
				if ($row['username'] == $username){
					if (User::salt($password) == $row['password']){
						$allusers[0] = new User($row['first_name'], $row['last_name'], $row['username'], $row['password'],$row['question_id'],$row['question_answer']);
						return $allusers[0];
					}
				}
			}
			return null;
			
	}
	public static function getUserWithUsername($username){
		$users = User::readUsers();

		$allusers = array();
		
			while ($row = $users->fetchArray()) {
				if ($row['username'] == $username){
					$allusers[0] = new User($row['first_name'], $row['last_name'], $row['username'], $row['password'],$row['question_id'],$row['question_answer']);
					return $allusers[0];
				}
			}
			return null;
	}
	
	public static function salt($password){
		$salt = "aB1cD2eF3G";
		$password = md5($salt.$password);
		return $password;
	}
	public static function getUserQuestion(){
		
		
		
		
	}
}
?>