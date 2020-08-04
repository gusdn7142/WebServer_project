<!DOCTYPE>


<html lang="en">
<head>
  <meta charset="utf-8">
</head>


<body>


<?php

session_start();


unset($_SESSION['login']);


header("Location: user_account.php");

?>

</body>
</html>