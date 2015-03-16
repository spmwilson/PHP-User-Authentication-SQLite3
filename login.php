<?php
	/**********
	 * Login Page for Super Example. Takes person back to
	 * page if redirect is set.
	 * Jaime Ruiz	initial		
	 */
	
	require_once "inc/page_setup.php";
		
	//Set some variables required by header
	$title = "Login";
	$page_name ="extended";
	
	require_once "lib/user.php";
					
	//Define some variables used throughout the page
	$errors = array();
	if(isset($_POST["username"])){
		
		$user = User::getUser(strip_tags($_POST["username"]),
				 strip_tags($_POST["password"]));
		if(is_null($user)){
			$errors[] = "Username/Password is invalid.";
		}else{

				$_SESSION['first_name'] = $user->first_name;
				$_SESSION['username'] = $user->username;
				//Let's redirect or go to home page
				$_SESSION['redirect'] = "color.php";
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
			
		}	
	}
	//Include example header
	include 'inc/header.php';
?>
<main>
	<div class="container">
		<div class="page-header">
			<h1>Please login.</h1>
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
		<form method="post" action="login.php">
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" class="form-control" required  />
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" class="form-control" required />
			
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-default" />
			</div>	
			
		</form>
	</div>
</main>