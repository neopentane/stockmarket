<?php

require_once 'header.php';
$error = $username = $password = "";
if (isset($_POST['username']))
	{
	$username = sanitizeString($_POST['username']);
	$password = sanitizeString($_POST['password']);
if ($username == "" || $password == ""){
		$error = "Not all fields were entered<br>";
		$alert='alert alert-danger';
	}
else
	{
	$result = queryMySQL("SELECT username,password FROM user
	WHERE username='$username' AND password='$password'");
	if ($result->num_rows == 0)
		{
		$error = "<span class='error'>Username/Password
		invalid</span><br><br>";
		$alert='alert alert-warning';
		}
	else
		{
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$alert='alert alert-sucess';
		$error="logged in Sucessfully!!Welcome";
		header('Location: profile.php');
		}
	}
}

if($alert!="None"){
	echo "<div class='$alert' role='alert'>
	  $error
	</div>";
$alert="None";
}
echo <<<_END
<div class="container">
	<form method="POST" action="login.php">
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<h2>Login</h2>
				</div>
				<div class="form-group">
					<label for="username"> Username </label>
					<input type='text' id="username" class="form-control" maxlength='16' name='username' value='$username'>
				</div>
				<div class="form-group">
					<label for="password"> Password </label>
					<input type='password' id="password" class="form-control" maxlength='16' name='password' value='$password'>
				</div>
				<div class="form-group">
					<button class="btn btn-dark" type='submit' value='Submit'>Submit </button>
				</div>	
			</div>
		</div>
	</form>
</div>
</body>
</html>
_END;
?>
