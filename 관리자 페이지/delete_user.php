<html lang="en">
<head>
  <meta charset="utf-8">
</head>


<body>


<?php


$con = mysqli_connect('localhost','root','123123','exam');


$delete_id = $_GET['del'];  //del값인 id를 불러온다.

$query = "DELETE FROM information_login WHERE id='$delete_id'";

if( $result = mysqli_query($con,$query)) {  //삭제 성공시 다시 원래 있던곳으로 되돌려줌
  

 header("Location: admin_user(rear).php? Msg1= '사용자 정보가 삭제 되었습니다.'");

}

// close()

?>


</body>
</html>