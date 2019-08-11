<?php
require_once 'header.php';
if($loggedin){
	echo "<h3>Your Profile</h3>";
}
else{
	echo "ERROR '$loggedin'	";
	echo " '$_SESSION[username]' ";
}
?>
</body>
</html>
