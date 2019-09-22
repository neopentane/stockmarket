<?php
require_once 'header.php';

if(!$loggedin){
	echo "HELLO" ;
}
else{
	$result=queryMysql("SELECT * FROM TRANSACTION_LOG,BSE_DATA WHERE holder='$user' and stock_id=SC_CODE");
	echo "BSE Stocks<br>";
	echo "<table> <tr> <td>sc_code </td> <td> Name </td> <td>Prev_value </td> <td>Curret Value </td> <td> Change </td>";
	while($row = $result->fetch_assoc()){
		$change=((int)$row['LAST']-(int)$row['VAL'])/(int)$row['VAL']*100 ;
		//echo "$change";
		echo "<tr><td>".$row['stock_id']."</td><td>".$row['SC_NAME']."</td><td>".$row['VAL']."</td><td>".$row['LAST']."</td><td>".$change." % </td> </tr>";
	}
	echo "</table>";


}
?>
</body>
</html>
