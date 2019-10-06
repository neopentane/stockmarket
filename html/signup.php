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
		if($username==""){
			$error="Not All fields are entered<br>";
		}
		else{
			$result=queryMysql("SELECT * FROM user WHERE username='$username'");
			if($result->num_rows)
				$error="That username already exists <br>";
			else{
				echo "<main role='main' class='container'><div class='alert alert-success' role='alert'> Created user successfully click <a href='login.php'>here </a> to login </h1> </div></main>";
			queryMysql("INSERT INTO user(`name`, `username`, `password`, `credit`, `email`) VALUES ('$name', '$username', '$password', '$credit', '$email')");
			}
		}
	}
echo <<<_END
<main role="main" class="container">
<div class="container">
	<form method="POST" action="signup.php">$error
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<h2>Signup</h2>
				</div>
			
			<div class="form-group">
				<label for="username"> Username </label>
				<input type='text' maxlength='16' id="username" class="form-control" name='username' value='$username' required>
			</div>
			<div class="form-group">
				<label for="password"> Password </label>
				<input type='password' maxlength='16' id="password" class="form-control" name='password' value='$password' required>
			</div>
			<div class="form-group">
				<label for="confirm-password"> Confirm password </label>
				<input type='password' maxlength='16' id="confirm-password" class="form-control" name='password' value='$password' required>
			</div>
			<div class="form-group">
				<label for="email"> Email </label>
				<input type='email' id="email" class="form-control" maxlength='60' name='email' value='$email' required>
			</div>
			<div class="form-group">
				<label for="name"> Name </label>
				<input type='text' maxlength='16' id="name" class="form-control" name='name' value='$name' required>
			</div>
			<div class="form-group">
				<button class="btn btn-dark" type='submit' value='Submit'>Submit </button>
			</div>
			</div>
		</div>
	</form>
</div>
</main>
</body>
</html>
_END;

?>
