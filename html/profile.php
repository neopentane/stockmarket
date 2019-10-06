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
	echo "<div class='container'><div class='alert alert-dark' role='alert'> Your account have balance of  <span style='color:blue;'>".$cash." ₹ </span></div></div><br>";
	echo "<table class='table table-hover'><thead> <tr> <th scope='col'>sc_code </th> <th scope='col'> Name </th><th scope='col'>Volume </th><th scope='col'>Prev_value </th> <th scope='col'>Curret Value </th> <th scope='col'> Change </th><th scope='col'> Sell </th></tr></thead>";
	while($row = $result->fetch_assoc()){
		$change=round(((int)$row['LAST']*$row['VOL']-(int)$row['VAL'])/(int)$row['VAL']*100,2);
		//echo "$change";
		echo "<tr><td>".$row['stock_id']."</td><td scope='col'>".$row['SC_NAME']."</td><td>".$row['VOL']."</td><td>".$row['VAL']."</td><td>".$row['LAST'];
		if($change>0){
		echo  "</td><td style='color: green;'>".$change." % <span class='triangle-up'></span></td><td>  <a class='btn btn-dark' href='sell.php?sc_code=$row[stock_id]&vol=$row[VOL]' role='button'>Sell</a>  </td> </tr>";
		}
		else{
			echo  "</td><td style='color: red;'>".$change." %<span class='triangle-down'></span> </td><td>  <a class='btn btn-info' href='sell.php?sc_code=$row[stock_id]&vol=$row[VOL]' role='button'>Sell</a>  </td> </tr>";

		}
	}
	echo "</table>";


}
?>
</body>
</html>
