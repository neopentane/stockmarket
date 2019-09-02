<?php
	require_once 'header.php';
	$error=$username=$password=$email=$name="";
	if(isset($_SESSION['username'])) destroySession();
	if(isset($_POST['username'])){
		$username=sanitizeString($_POST['username']);
		$password=sanitizeString($_POST['password']);
		$email=sanitizeString($_POST['email']);
		$name=sanitizeString($_POST['name']);
		$credit=100000;
		echo "<h1> Welcome '$username','$password','$email','$name' </h1>";
		if($username==""){
			$error="Not All fields are entered<br>";
		}
		else{
			$result=queryMysql("SELECT * FROM user WHERE username='$username'");
			echo "<h1> Welcome '$username','$password','$email','$name' </h1>";
			if($result->num_rows)
				$error="That username already exists <br>";
			else{
				echo "<h1> CREATE USER </h1>";
			queryMysql("INSERT INTO user(`name`, `username`, `password`, `credit`, `email`) VALUES ('$name', '$username', '$password', '$credit', '$email')");
				die("<h4>Account Created Sucessfully</h4>");
			}
		}
	}
echo <<<_END
<div class="container">
	<form method="POST" action="signup.php">$error
	<div class="form-fill">
		<span class='fieldname'>Username</span>
		<input type='text' maxlength='16' name='username' value='$username'>
	</div>
	<div class="form-fill">
		<span class='fieldname'>Password</span>
		<input type='text' maxlength='16' name='password' value='$password'>
	</div>
	<div class="form-fill">
		<span class='fieldname'>email</span>
		<input type='text' maxlength='16' name='email' value='$email'>
	</div>
	<div class="form-fill">
		<span class='fieldname'>name</span>
		<input type='text' maxlength='16' name='name' value='$name'>
	</div>
	<div class="form-fill">
		<input type='submit' value='Submit'>
	</div>
	</form>
</div>
</main>
</body>
</html>
_END;

?>
