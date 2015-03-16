<?php 
	if(!isset($config)){
		require_once dirname(__FILE__) . "/../lib/config.php";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Used to make sure responsive design works -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- This sets the little icon that shows up in tabs -->
<link rel="shortcut icon" href="<?php echo $config->base_url;?>/assets/ico/favicon.ico">
<!-- Fonts -->
<!-- Remember that when it starts with // it will use https or http depending
	on the page -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>

 <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="<?php echo $config->base_url;?>/assets/css/styles.css" rel="stylesheet">
<title><?php echo $config->site_name . ' : ' . $title ?></title>
</head>
<body>
<div id="<?php echo (isset($page_name))?$page_name: "page"; ?>"></div>
<header>

	<div class="container header-title">
    	<div class="group-title pull-left"><a href="<?php echo $config->base_url;?>"><?php echo $config->site_name;?></a></div>
    	<div class="pull-right csu-logo hidden-xs hidden-sm ">
        	<a href="http://www.colostate.edu" title="Link to Colorado State University Homepage"><img id="csuheader" src="assets/img/csu-logo.png" alt="CSU Logo" /></a>
        </div>
    </div>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-level1-navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-level1-navbar">
          <ul class="nav navbar-nav">
            <li class="<?php if(!isset($section) || empty($section))echo "active";?>"><a href="<?php echo $config->base_url?>">HOME</a></li>
            <li class="<?php if(isset($section) && $section == "page2")echo "active";?>"><a href="<?php echo $config->base_url?>/page2.php">Page 2</a></li>
            
          </ul>
          <?php if(isset($_SESSION["first_name"])){ ?>
          	<p  class="navbar-text navbar-right">Signed in as <?php echo $_SESSION["first_name"]?> <a href="<?php echo $config->base_url . "/logout.php" ;?>" class="navbar-link" >Logout</a></p>
        	  <?php }else{ ?>
        	  	<!-- This button is supper ugly, you can do better -->
        	  	<a class="btn btn-default navbar-btn navbar-right" href="<?php echo $config->base_url . "/login.php";?>">Sign in</a>
        	  <?php }?>
        </div><!-- /.navbar-collapse -->
      <!-- /.container-fluid --></div>
    </nav>
    </header>
