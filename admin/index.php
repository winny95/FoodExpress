<?php
	session_start();
	$set= false;
	if(isset($_SESSION['login'])){
		$set = true;
	}	
	
	if(!$set){
		header("location:login.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home - Admin</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
		<nav class="navbar navbar-default">
		<div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">FoodExpress - Admin</a>
		    </div>
		
		     
		 
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			   <ul class="nav navbar-nav">
		         <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Piatti<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="newplate.php">Inserisci nuovo piatto</a></li>
		            <li><a href="orders.php">Gestisci piatti</a></li>
		          </ul>
		        </li>
		        <li><a href="signup.php">Registrati</a></li>
		      </ul>
		      
		      
			  <ul class="nav navbar-nav navbar-right">
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="information.php">Informazioni</a></li>
		            <li><a href="orders.php">I miei ordini</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="logout.php">Logout</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		
		<div class="jumbotron">
			<div class="container">
				<h1>Hello, world!</h1>
				<p>...</p>
				<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
			</div>
		</div>
		

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>