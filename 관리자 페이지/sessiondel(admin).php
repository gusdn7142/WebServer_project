<!DOCTYPE>


<html lang="en">
<head>
  <meta charset="utf-8">
</head>


<body>


<?php

session_start();


unset($_SESSION['admin']);


header("Location: admin_login.php");

?>

</body>
</html>