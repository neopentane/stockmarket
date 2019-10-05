<?php
require_once 'header.php';

if (isset($_SESSION['username']))
{
destroySession();
echo "<a href='index.html'>click here</a> to refresh the screen.";
}
else echo "You cannot log out because you are not logged in";
?>
<br><br></div>
</body>
</html>
