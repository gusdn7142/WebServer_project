<html lang="en">
<head>
  <meta charset="utf-8">
</head>


<body>


<?php          //삭제는id로만 해야 인식된다.

// session_start();


$con = mysqli_connect('localhost','root','123123','exam');

$delete_id = $_GET['id'];  //del값인 id를 불러온다.

$query = "DELETE FROM information WHERE id='$delete_id'";



if( $result = mysqli_query($con,$query)) {  //삭제 성공시 다시 원래 있던곳으로 되돌려줌
 // $_SESSION['outer_review']=$_SESSION['outer_review']-1; 	
 header("Location: user_account.php");       
  //echo "삭제성공";

}




mysqli_close($con);


?>

</body>
</html>