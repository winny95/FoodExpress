<?php
	session_start();
	
	if(!isset($_SESSION['email'])) 
    { 
		header("location:index.php");
    } 	
	
	if(!isset($_REQUEST['function'])){
		$_REQUEST['function'] = 'information';
	}
	include 'local_server/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Information</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
		      <a class="navbar-brand" href="index.php">FoodExpress</a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><? echo $_SESSION['name']; ?> <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="information.php">Informazioni</a></li>
		            <li><a href="#">I miei ordini</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="logout.php">Logout</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		
		<div class="container">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			  <div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" class="form-control" name="name" id="name" value="<? echo $info['name']; ?>">
			  </div>
			  <div class="form-group">
			    <label for="surname">Surname</label>
			    <input type="text" class="form-control" name="surname" id="surname" value="<? echo $info['surname']; ?>">
			  </div>
			  <div class="form-group">
			    <label for="email">Email address</label>
			    <input type="email" class="form-control" name="email" id="email" value="<? echo $info['email']; ?>">
			  </div>
			  <div class="form-group">
			    <label for="telephone">Telephone</label>
			    <input type="text" class="form-control" name="telephone" id="telephone" value="<? echo $info['telephone']; ?>">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Current Password</label>
			    <input type="text" class="form-control" name="password" id="password" placeholder="Current password">
			  </div>
			  <div class="form-group">
			    <label for="pwd">New Password</label>
			    <input type="text" class="form-control" name="npassword" id="npassword" placeholder="new password">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Repeat new password</label>
			    <input type="text" class="form-control" name="rnpassword" id="rnpassword" placeholder="repeat new password">
			  </div>
			  
			  <input type="hidden" name="function" value="newinfo">
			  <input type="submit" class="btn btn-default" value="Modify information">
			</form>
			
			<form method="post" action="deleteaccount.php">
				<input type="hidden" name="function" value="deleteaccount">
				<input type="submit" class="btn btn-danger" value="Delete Account">
			</form>
		</div>
		
		

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>