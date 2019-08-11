<?php 
	//echo "function here";
	$hn='localhost';
	$db='phpmyadmin';
    $un='root';
    $pw='';
	$conn=new mysqli($hn,$un,$pw,$db);
	if($conn->connect_error) die($conn->connect_error);
	function createTable($name,$query){
		queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
		echo "Table $name Created Sucessfully <br>";
	}
	
	 function queryMysql($query)
	{
		global $conn;
		$result=$conn->query($query);
		if(!$result) die($conn->error);
		return $result;
	}
	
	function destroySession(){
		$_SESSION=array();
		if(session_id()!=""||isset($_COOKIE[session_name()]))
			setcookie(session_name(),'',time()-2592000, '/');
		session_destroy();
	}
	function sanitizeString($var){
		global $conn;
		$var=strip_tags($var);
		$var=htmlentities($var);
		$var=stripslashes($var);
		return $conn->real_escape_string($var);
	}


?>
