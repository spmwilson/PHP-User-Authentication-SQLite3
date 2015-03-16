<?php
/**
 * Checks to see if site is in matience mode.
 * Jaime Ruiz		initial		Feb 22, 2015
 */
require_once 'config.php';

if(isset($config->matience) && $config->matience){
	//Normally I would probably wouldn't have the page
	//as part of this text, but instead redirect. 
	include __DIR__ .'/../inc/header.php';
	?>
	<main>
	<div class="container">
		<p>We're sorry. The site is currently down for maitience.
			Pleae try again later.</p> 
	</div>
	</main>
	<?php 
	include __DIR__ .'/../inc/footer.php';
	exit(); //Stops processing page
	
}