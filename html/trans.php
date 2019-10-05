<?php
require_once 'header.php';
if(! $loggedin){
  die("Not Logged in !!!");
  echo "<h1> Not loggedin </h1>";

}
else{//<<<_END _END;
   
    
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
        <table class="table">
        <thead class="thead-light">
        <tr>
          <th scope="col"> SC Number </th>
          <th scope="col"> Name </th>
          <th scope="col"> Price </th>
          <th scope="col"> Cash in account </th>
          <th scope="col"> quantity </th>
          <th scope="col"> Total </th>
          <th scope="col"> Click here </th>
        </thead>
        </tr>
          <tr>
            <th scope="row">
              <input type='text' name="stock_id" value=$stock_id readonly>
            </th>
            <th>
              $sc_name
            </th>
            <th>
              <input type='text' id='price' name="price" value=$price readonly >
            </th>
            <th id='inhand'>
              $cash_in_hand
            </th>
            <th>
              <input type="number" id='quant' name="quantity" value=$value min="1" max="5">
            </th>
            <th>
              <input type='text' id='total' value=$price readonly> </th>
            <th>
	            <button class="btn btn-dark" type='submit' value='Submit'>Submit </button>
            </th>
          </tr>
        </table>
    	</form>
    </div>
_END;
      echo "
    <script type='text/javascript'>
        document.getElementById('quant').onchange=changer;
        var inhand=parseFloat(document.getElementById('inhand').innerHTML);
        var price=parseFloat(document.getElementById('price').value);
        var total=parseFloat(document.getElementById('total').value);
        var quant=parseFloat(document.getElementById('quant').value);
        //document.getElementById('inhand').innerHTML=(inhand/100)*2;
        //inhand=parseFloat(document.getElementById('inhand').innerHTML);
        function changer()
        {   
            quant=parseInt(document.getElementById('quant').value);
            //alert('inhand : '+inhand+' price : '+price+' total : '+total+' quant : '+quant+' '+quant*price);
            if(inhand>=quant*price)
            {
                document.getElementById('total').value=quant*price;
                //total.value=quant*price;
            }
            else
            {
                alert('Not enough balance !');
                quant-=1;
                document.getElementById('quant').value=quant;
                document.getElementById('total').value=quant*price;
            }
        }
    </script>";
  }
  elseif($_POST['quantity']&&isset($_POST['price'])&&isset($_POST['stock_id'])){
    $stock_id=(int)sanitizeString($_POST['stock_id']);
    $quantiy=(int)sanitizeString($_POST['quantity']);
    $price=(int)sanitizeString($_POST['price']);
    queryMysql("INSERT INTO TRANSACTION_LOG VALUES('$stock_id','$user','$quantiy',$price)");
    queryMysql("UPDATE user SET credit = credit - $price WHERE username='$user'");
    echo "<div class='alert alert-success' role='alert'> Transaction Sucessful !! <a href='profile.php'> Click Here To See Transaction </a> </div>";

  }
  else{
    echo "Invalid request";
  }
}


?>

</body>
</html>