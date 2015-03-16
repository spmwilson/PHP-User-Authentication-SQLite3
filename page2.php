<?php
	/***************
	 * page2.php
	 * This file was generated to illustrate authentication
	 * We will use classes, password_hash, matience mode, permission check and
	 * logging out. Uses lecture 13 user class for simplicity
	 * 
	 * Jaime Ruiz 		initial		Feb 22, 2015
	 */
	require_once "inc/page_setup.php";
	
	User::loginRequired();
	
	//Set some variables required by header
	$title = "Sean Wilson CT 310 A3";
	$page_name ="extended";
	$section = "page2";
	//Include example header
	include 'inc/header.php';
	
	
	$errors = array();
	
	if(isset($_POST['question']) && isset($_POST['answer'])){
		$question = strip_tags($_POST['question']);
		$answer = strip_tags($_POST['answer']);
		
		$dbh = new Database('a4.db');
		$dbh->changeUserQuestion($_SESSION['username'], $question, $answer);
		
	}
	else {
		$errors[] = "The Question and Answer field are required";
	}
	
?>
<main>
	<div class="container">
		<h1>Page 2</h1>
		<p><?php $user = User::getUserWithUsername($_SESSION['username']);
		if (is_int($_SESSION['start'])){
			$difference = time() - $_SESSION['start'];
			echo "User " . " has been" . " logged in for " . $difference . " seconds";
		} else { 
			echo "You have been here some time in the future";
			}
		
	 ?></p>
	 
		
		<?php 
			if(count($errors) > 0){ ?>
			<div class="alert alert-danger" role="alert">
			<h4 >Please fix the following errors.</h3>
				<ul>
					<?php 	
						//This for each will load the key of the
						//array into the $field variable and the value
						//into the $error variable
						foreach($errors as $field => $error){
							echo "<li>$error</li>";
						}
					?> 
				</ul>
			</div>
		<?php		
			} //End if count($errors);
		?>
		
		<p>Change your Security Question</p>
		
		<form method="post" action="page2.php">
			<div class="form-group">
				<label for="question">Question:</label>
				<input type="text" id="question" name="question" class="form-control" required  />
			</div>
			<div class="form-group">
				<label for="answer">Answer:</label>
				<input type="text" id="answer" name="answer" class="form-control" required />
			
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-default" />
			</div>	
			
		</form>
	</div>
</main>

<?php include 'inc/footer.php'; ?>
