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
			<div class="form-fill">
				<span class='fieldname'>Username</span>
					<input type='text' maxlength='16' name='username' value='$username'>
			</div>
			<div class="form-fill">
				<span class='fieldname'>Password</span>
					<input type='password' maxlength='16' name='password' value='$password'>
			</div>
			<div class="form-fill">
				<input type='submit' value='Submit'>
			</div>
	</form>
</div>
</body>
</html>
_END;
?>
