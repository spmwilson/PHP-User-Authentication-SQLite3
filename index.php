<?php
	/***************
	 * index.php
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
	//Include example header
	include 'inc/header.php';
	
?>
<main>
	<div class="container">
		<h1>Home</h1>
		<p><?php
		if (is_int($_SESSION['start'])){
			$difference = time() - $_SESSION['start'];
			echo "User " . " has been" . " logged in for " . $difference . " seconds";
		} else { 
			echo "You have been here some time in the future";
			}
		
	 ?></p>
		<p>To see this page two things had to happen. First,
		your username, password, and color had to be verified. Second,
		your user status had to be "Active."</p>
	</div>
</main>

<?php include 'inc/footer.php'; ?>
