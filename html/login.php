<?php

require_once 'header.php';
$error = $username = $password = "";
if (isset($_POST['username']))
	{
	echo "<h1> HERE'$username' '$password' </h1>";
	$username = sanitizeString($_POST['username']);
	$password = sanitizeString($_POST['password']);
if ($username == "" || $password == "")
		$error = "Not all fields were entered<br>";
else
	{
	$result = queryMySQL("SELECT username,password FROM user
	WHERE username='$username' AND password='$password'");
	if ($result->num_rows == 0)
		{
		$error = "<span class='error'>Username/Password
		invalid</span><br><br>";
		}
	else
		{
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		die("You are now logged in. Please" .
		"<a href='profile.php'> click here </a> to continue.<br><br>");
		}
	}
}
//test
echo <<<_END
<div class="container">
	<form method="POST" action="login.php">$error
		<span class='fieldname'>Username</span>
		<input type='text' maxlength='16' name='username' value='$username'>
		<span class='fieldname'>Password</span>
		<input type='password' maxlength='16' name='password' value='$password'>
		<input type='submit' value='Submit'>
	</form>
</div>
</body>
</html>
_END;
?>
