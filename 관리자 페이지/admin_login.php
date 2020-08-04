
<!DOCTYPE html>




<?php                                        
session_start();


if(isset($_GET['admin_msg'])){    
  echo "<script> alert('",  $_GET['admin_msg'],  "')</script>";    //잘못된 접은 알림 메시지
}



?>


<html lang="en">
<head> <title> 관리자 로그인 </title>
<meta charset="utf-8">




<?php
//session_start();
                          //로그인 허용,차단을 위해 세션이 반드시 필요하다.

if (isset($_POST['submit'])) {           //제출이 되었으면
 $con = mysqli_connect('localhost','root','123123','exam') or die(mysqli_connect_error());  //db와 서버에 연결하고

    $admin_id = $_POST['admin_id'];
    $admin_pass = $_POST['admin_pass'];

    if (empty($_POST['admin_id'])) {
        echo "<script> alert('아이디를 입력해 주세요.!')</script>";   //script문법으로 경고메시지 보내기
    }

    if (empty($_POST['admin_pass'])) {
        echo "<script> alert('패스워드를 입력해 주세요.!')</script>";
        }



 $query = "SELECT admin_id, admin_pass FROM information_admin WHERE admin_id='$admin_id' AND admin_pass='$admin_pass' ";  //informaion_login 테이블에서 내가 입력한 이름과 패스워드와 같은 열의 name과 pass를 가져옴
                                
    $result = mysqli_query($con,$query);  //쿼리실행



   if ( mysqli_num_rows($result) > 0 ) {          //결과로 받은 행의 개수가 0이상이면
            //$_SESSION['login'] = $username;        //user_account.php로의 직접접근을 막기위해?
      
      $row = mysqli_fetch_array($result);  

   	        $_SESSION['admin'] = $row['admin_id'];
            header("Location: admin_user(rear).php");      //user_account.php페이지로 이동
            //echo "로그인 성공";
    } else {                                       //기록이 없으면
        echo "<script> alert('아이디나 패스워드가 잘못 되었습니다.')</script>";      //사용자가 없으면 다시 이페이지를 써야한다.
    }
    



}


?>



<style>


body{

background-image:url("박보검.jpg");
background-repeat: no-repeat;
background-size: cover;

}

table{

width:400px;
height: 230px;
border-collapse:collapse
}

th{
height: 40px

}

tr{

/*margin-top:10px; */
text-align: center;


}

input{
width:390px;
height: 45px;
padding-left: 13px;
}


input::placeholder {
  
  font-size:14px;
  /*padding-left: 13px;*/
}


</style>


  </head>


<body>


<div style="margin-top: 180px;">

<center>
<form method="POST" action="admin_login.php">

<table >
        <tr>
      <th style="font-size: 33px; color:white; font-family:monospace; "> 관리자 로그인 </th>  <!-- 열 늘리기 -->
        </tr>	
     
       <tr>
      <td>  <input type="text" name="admin_id" placeholder="아이디를 입력해 주세요." > </td>
       </tr>	

        <tr>
      <td>  <input type="password" name="admin_pass" placeholder="비밀번호를 입력해 주세요." > </td>
        </tr>	

       <tr style="height: 30px;">
      <td>  <input type="submit" name="submit" value="로그인" style="width:410px; background-color: black; color:white;
      font-size: 20px; height: 53px; margin-top: 5px;" > </td>
        </tr>	 

  </table>

</form>
</center>


</div>








</body>


</html>