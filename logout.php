<?php
	/**********
	 * Logout Page for Super Example. 
	 * Jaime Ruiz	initial		Feb 22	
	 */

	require_once "inc/page_setup.php";
	
	//Many ways to do this check php docs.
	// Unset all of the session variables.
	$_SESSION = array();
	session_destroy(); //Will clear the data stored
					   //however, session ID is still same
	//Set some variables required by header
	$title = "Authentication Super Example";
	$page_name ="extended";
	$section = "logout";
	//Include example header
	include 'inc/header.php';
?>
<main>
	<div class="container">
		<div class="page-header">
			<h1>Log out.</h1>
		</div>
		<p>Your session has ended.</p>
		
	</div>
</main>
<?php 
include 'inc/footer.php';
?>