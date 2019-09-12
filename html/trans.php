<?php
require_once 'header.php';
if(! $loggedin){
  die("Not Logged in !!!");
  echo "<h1> Not loggedin </h1>";

}
else{
  if (isset($_GET['sc_code'])){
    $sc_code=sanitizeString($_GET['sc_code']);
    echo "Here";

    $result = queryMysql("SELECT * FROM BSE_DATA WHERE SC_CODE=$sc_code");
    while($row = $result->fetch_assoc()){
      $stock_id= $row['SC_CODE'];
      $sc_name= $row['SC_NAME'];
      $price=$row['LAST'];
      }
    $result = queryMysql("SELECT * FROM user WHERE username='$user'");

    while($row = $result->fetch_assoc()){
      //$stock_id= $row['SC_CODE'];
      $cash_in_hand=$row['credit'];
    }

    /*echo <<<_END
    <div class="container">
    	<form method="POST" action="login.php">
        <table>
          <tr>
            <th> $stock_id </th>
            <th> $sc_name </th>
            <th> $cash_in_hand</th>
            <th>
              <input type="number" name="quantity" min="1" max="5">
            </th>
          </tr>
        </table>
    	</form>
    </div>
_END;*/
  }
  else{
    echo "invalid request";
  }
}


?>

</body>
</html>
