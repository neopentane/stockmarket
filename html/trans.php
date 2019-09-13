<?php
require_once 'header.php';
if(! $loggedin){
  die("Not Logged in !!!");
  echo "<h1> Not loggedin </h1>";

}
else{
  if (isset($_GET['sc_code'])){
    $sc_code=sanitizeString($_GET['sc_code']);
    $value="1";
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
    if(isset($_POST['value'])){
      echo "Hello";
    }

    echo <<<_END
    <div class="container">
    	<form method="POST" action="trans.php">
        <table class="mytable">
        <tr>
          <th> SC Number </th>
          <th> Name </th>
          <th> Price </th>
          <th> Cash in account </th>
          <th> quantity </th>
          <th> Total </th>
          <th> Click here </th>
        </tr>
          <tr>
            <th>
              <input type='text' name="stock_id" value=$stock_id readonly>
            </th>
            <th>
              $sc_name
            </th>
            <th>
              <input type='text' name="price" value=$price readonly >
            </th>
            <th>
              $cash_in_hand
            </th>
            <th>
              <input type="number" name="quantity" value=$value min="1" max="5">
            </th>
            <th>
              <input type='text' value=$price readonly> </th>
            <th>
              <input type='submit' value='Submit'>
            </th>
          </tr>
        </table>
    	</form>
    </div>
_END;
  }
  elseif($_POST['quantity']&&isset($_POST['price'])&&isset($_POST['stock_id'])){
    $stock_id=(int)sanitizeString($_POST['stock_id']);
    $quantiy=(int)sanitizeString($_POST['quantity']);
    $price=(int)sanitizeString($_POST['price']);
    queryMysql("INSERT INTO TRANSACTION_LOG VALUES('$stock_id','$user','$quantiy',$price)");
    queryMysql("UPDATE user SET credit = credit - $price WHERE username='$user'");

  }
  else{
    echo "Invalid request";
  }
}


?>

</body>
</html>
