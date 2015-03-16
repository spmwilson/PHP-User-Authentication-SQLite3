<?php
	/**********
	 * Login Page for Super Example. Takes person back to
	 * page if redirect is set.
	 * Jaime Ruiz	initial		
	 */
	 
	require_once "inc/page_setup.php";

	//Set some variables required by header
	$title = "Authentication Super Example";
	$page_name ="extended";
	
	require_once "lib/user.php";
	
	//Define some variables used throughout the page
	$errors = array();
	$user = User::getUserWithUsername($_SESSION['username']);
	//print_r($user->question_answer);
	//print_r(User::salt("blue"));
	
	if(isset($_POST['answer'])){

		$user = User::getUserWithUsername($_SESSION['username']);

		if(is_null($user)){
			$errors[] = "Invalid User.";
		}else{

			if($user->question_answer == User::salt($_POST["answer"])){

				$_SESSION['start'] = time();

				if(isset($_SESSION['redirect'])){
					$loc = $_SESSION['redirect'];
					unset($_SESSION['redirect']);
					header("Location: " . $loc);
					return;
				}
				else{
					header("Location: " . $config->base_url);
					return;
				}
				
			}else{

				header("Location: " . "logout.php");
					return;

			}
		}	
	}
	//Include example header
	include 'inc/header.php';
?>
<main>
	<div class="container">
		<div class="page-header">
			<?php
			$user = User::getUserWithUsername($_SESSION['username']);
			$dbh = new Database('a4.db');
			$qid = $dbh->getQuestionFromID($user->question_id);
			
			while ($row = $qid->fetchArray()) {
				echo "<h1>";
				print_r($row['text']);
				}

			echo "</h1>";
			
			?>
		</div>
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
		<form method="post" action="color.php">
			<div class="form-group">
				<label for="answer">Secret Question </label>
				<input type="text" id="answer" name="answer" class="form-control" required  />
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-default" />
			</div>	
			
		</form>
	</div>
</main>