<?php
	session_start();
	require_once 'functions.php';
		$message="";
		$userstr='(Guest)';

		if(isset($_SESSION['username']))
		{
			$user=$_SESSION['username'];
			$loggedin=TRUE;
			$userstr="($user)";
		}
		else $loggedin=FALSE;
	echo <<<_END
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <link href="css/sitestyle.css" rel="stylesheet" type="text/css">

    <title>Wall Street </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
  </head>

  <body>
_END;
if($loggedin){
echo <<<_END

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a href="index.html"><img src="image/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Today top 10</a></li>
                <li><a href="profile.php">My Account</a></li>
                <li><a href="http://localhost/buy.php?sort=NET_TURNOV&order=DESC">Buy</a></li>
								<li><a href="logout.php">Logout</a></li>


            </ul>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
_END;
}
else{
echo <<<_END
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a href="index.html"><img src="image/logo.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="login.php">Login</a></li>
							<li><a href="signup.php">Signup</a></li>
							<li><a href="#">News</a></li>

					</ul>
			</ul>
			<form class="form-inline mt-2 mt-md-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
_END;
}
echo <<<_END
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>

_END;


?>
