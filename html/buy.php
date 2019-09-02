<?php
require_once 'header.php';
if(! $loggedin){
  die("Not Logged in !!!");
  echo "here";
}
if (isset($_GET['sort']) and isset($_GET['order']) ){
  $sort=sanitizeString($_GET['sort']);
  $order=sanitizeString($_GET['order']);
}
echo <<<_END
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Sort By
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="buy.php?sort=NET_TURNOV&order=DESC">Turn Over</a>
    <a class="dropdown-item" href="buy.php?sort=LAST&order=ASC">Price(assending)</a>
    <a class="dropdown-item" href="buy.php?sort=LAST&order=DESC">Price(desending)</a>
  </div>
</div>
_END;
/*
else{
  $result = queryMysql("SELECT * FROM NSE_DATA ORDER BY NET_TURNOV DESC");
  $num = $result->num_rows;
  echo "<table><tr><th>Name</th><th>Value</th></tr>";
  while($row = $result->fetch_assoc()){
    echo "<tr><td>".$row["SC_NAME"]."</td><td>".$row["LAST"]."</td></tr>";
  }
  </table>


}*/
$result = queryMysql("SELECT * FROM NSE_DATA ORDER BY $sort $order");
$num = $result->num_rows;
echo "<br>";
echo "<table><tr><th> Compani</th> <th> Value  </th><th> Buy </th><th></th></tr>";
while($row = $result->fetch_assoc()){
  echo "<tr><td>".$row["SC_NAME"]."</td><td>".$row["LAST"]."</td>"."<td><a href=#>Buy</a></td></tr>";
  }
echo "</table>";

 ?>

</body>
</html>
