<!DOCTYPE html>

<?php                                        
session_start();
// $_SESSION['outer_review']=0;   //아우터 리뷰 총 회수 세션용

?>


<html lang="en">
<head> <title> login page </title>
<meta charset="utf-8">



<?php
//session_start();
                          //로그인 허용,차단을 위해 세션이 반드시 필요하다.

if (isset($_POST['submit'])) {           //제출이 되었으면
 $con = mysqli_connect('localhost','root','123123','exam') or die(mysqli_connect_error());  //db와 서버에 연결하고

    $user_id = $_POST['user_id'];
    $user_pass = $_POST['user_pass'];

    if (empty($_POST['user_id'])) {
        echo "<script> alert('아이디를 입력해 주세요.!')</script>";   //script문법으로 경고메시지 보내기
    }

    if (empty($_POST['user_pass'])) {
        echo "<script> alert('패스워드를 입력해 주세요.!')</script>";
        }



 $query = "SELECT user_id, user_pass, user_name FROM information_login WHERE user_id='$user_id' AND user_pass='$user_pass' ";  //informaion_login 테이블에서 내가 입력한 이름과 패스워드와 같은 열의 name과 pass를 가져옴
                                
    $result = mysqli_query($con,$query);  //쿼리실행



   if ( mysqli_num_rows($result) > 0 ) {          //결과로 받은 행의 개수가 0이상이면
            //$_SESSION['login'] = $username;        //user_account.php로의 직접접근을 막기위해?


    //로그인시 세션활용 부분//
        $row = mysqli_fetch_array($result);   
                              
            $_SESSION['login'] = $row['user_name']; 
             
             // $login_message = $_SESSION['login'];
            // header("Location: user_account.php ? login_msg=$login_message ");

            header("Location: user_account.php");  

                //user_account.php페이지로 이동
            //echo "로그인 성공";

            // if(isset($_SESSION['login_complete'])){
           
           
            // }


    } 
    else {                                       //기록이 없으면
        echo "<script> alert('아이디나 패스워드가 잘못 되었습니다.')</script>"; //사용자가 없으면 다시 이페이지를 써야한다.
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
opacity: 0.9;
width:400px;
height: 230px;
border-collapse:collapse;
/*border: 1px solid black;*/
}

th{
height: 40px;



}

tr{

/*margin-top:10px; */
text-align: center;


}

input{
width:390px;
height: 45px;

}


input::placeholder {
  
  font-size:14px;
  /*padding-left: 13px;*/
}

#input_1:focus {
  outline:3px solid #6495ed;

}





</style>


  </head>


<body>


<div style="margin-top: 180px;">

<center>
<form method="POST" action="user_login.php">

<table >
        <tr>
      <th style="font-size: 33px; color:white; font-family:monospace; "> 데일리 패션 리뷰 </th>  <!-- 열 늘리기 -->
        </tr> 
     
       <tr>
      <td>  <input id="input_1" type="text" style="padding-left:25px;   width:365px; font-size: 20px; "   name="user_id" placeholder="아이디를 입력해 주세요." > </td>z
       </tr>  

        <tr>
      <td>  <input id="input_1" type="password" style="padding-left:25px;   width:365px; font-size: 20px;" name="user_pass" placeholder="비밀번호를 입력해 주세요." > </td>
        </tr> 

       <tr style="height: 30px;">
      <td>  <input type="submit" name="submit" value="로그인" style="width:400px; background-color: black; color:white;
      font-size: 20px; height: 53px; margin-top: 5px;" > </td>
        </tr>  

  </table>

</form>
</center>


</div>





<!--
<div>
  <center>
<form method="POST" action="user_registration.php">

<input type="submit" value="회원가입" style="width:400px; background-color: green; color:white;
      font-size: 20px; height: 53px; margin-top: 3px;" > 

</form>
</center>
</div>
-->

</body>


</html>









<!-- (양식 다시제출 방지)새로 고침 및 뒤로 버튼을 다시 제출하는 것을 방지---->

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<!---------------------------------------------->