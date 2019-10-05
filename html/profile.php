<?php
require_once 'header.php';

if(!$loggedin){
	echo "HELLO" ;
}
else{
	$result=queryMysql("SELECT * FROM user WHERE username='$user' ");
	$cash=0;
	while($row = $result->fetch_assoc()){

		$cash=$row['credit'];
	}
	$result=queryMysql("SELECT * FROM TRANSACTION_LOG,BSE_DATA WHERE holder='$user' and stock_id=SC_CODE");
	echo "<div class='alart alart-info' Your Balance is".$cash."<br>";
	echo "<table class='table table-hover'> <thead> <tr> <th scope='col'>sc_code </th> <th scope='col'> Name </th> <th scope='col'>Prev_value </th> <th scope='col'>Curret Value </th> <th scope='col'> Change </th><th scope='col'> Sell </th></tr></thead>";
	while($row = $result->fetch_assoc()){
		$change=((int)$row['LAST']-(int)$row['VAL'])/(int)$row['VAL']*100 ;
		//echo "$change";
		echo "<tr><td>".$row['stock_id']."</td><td scope='col'>".$row['SC_NAME']."</td><td>".$row['VAL']."</td><td>".$row['LAST']."</td><td>".$change." % </td><td>  <a class='btn btn-dark' href='trans.php?sc_code=$row[stock_id]' role='button'>Sell</a>  </td> </tr>";
	}
	echo "</table>";


}
?>
</body>
</html>
