<?php
require_once 'header.php';

if($loggedin){
	echo "HELLO" ;
}
else{
	echo "ERROR '$loggedin'	";
	echo " '$_SESSION[username]' ";
}
?>
</body>
</html>
