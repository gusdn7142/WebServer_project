<!DOCTYPE>


<html lang="en">
<head>
  <meta charset="utf-8">
</head>

<body>

<!---------------- 회원가입 토글바 부분------------- -->

<?php

if(!isset($_SESSION['login'])){ 
  ?>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
      
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span style="font-size:30px;"> &times; </span> </button>
          
          
          <h4 style="font-size:20px;" class="modal-title">Please Sign Up</h4>
          
          
        </div>
        
        
        
          <form method="POST" action="user_account.php">
        
         <center>
         
        <div class="modal-body">
          
          
    <table style="opacity: 0.7; width:400px;" >
    
          <tr style="text-align: center;">

        <td>  <input id="input_5" type="text" style="width:390px;
height: 45px; padding-left:25px;" name="user_name2" placeholder="닉네임 입력"  > </td>
       </tr >  

        <tr style="text-align: center;">   
      <td>  <input id="input_5" type="text" style="width:390px;
height: 45px; padding-left:25px;" name="user_id2" placeholder="아이디 입력" > </td>
       </tr>  

        <tr style="text-align: center;" >
      <td>  <input id="input_5" type="password" style="width:390px;
height: 45px; padding-left:25px;" name="user_pass2" placeholder="비밀번호 입력" > </td>
        </tr> 

        <tr style="text-align: center;">
      <td>  <input id="input_5" type="email" style="width:390px;
height: 45px; padding-left:25px;" name="user_email2" placeholder="이메일 주소 입력" > </td>
        </tr> 
 
       </table>
          
          
        </div>
        
        </center>
        

        
        <div class="modal-footer">
                <center>
          <input type="submit" name="submit5" value="가입하기"   style="width:390px; height: 45px;  background-color: green; color:white; font-size: 20px;  ">
          <!--data-dismiss="modal" -->
     </center>
   </div>


</form>
    
      </div>
      
      
    </div>
  </div>

  <?php
}
  ?>


<!------------------------회원가입 토글바 부분 끝!!!!!!!!!!!!------------------>













<!--회원가입 php 코드부분----------------------------------------------->

<?php

//사용자 계정 등록 
// session_start();


 $con = mysqli_connect('localhost','root','123123','exam');

 if (isset($_POST['submit5'])) {      //제출이 되었으면 실행한다.

  
    $user_name2 = $_POST['user_name2'];           //폼에 입력한 값을 불러옴
    $user_pass2 = $_POST['user_pass2'];
    $user_id2 = $_POST['user_id2'];
    $user_email2 = $_POST['user_email2'];


 if (empty($_POST['user_name2']) || empty($_POST['user_pass2']) || empty($_POST['user_id2']) ||empty($_POST['user_email2'])) { //입력한 값들이 하나라도 비어 있으면...
    echo "<script> alert('빈칸이 있습니다.')</script>"; 
}  else {            //3칸이 모두 입력이 되었으면, users테이블에 name과 email이 내가 입력한 값인 행을 불러온다. (똑같은 계정이 DB에 있는지 확인..)

    $query = "SELECT * FROM information_login WHERE user_id='$user_id2' ";
    $result = mysqli_query($con,$query);
 


 if ( mysqli_num_rows($result) > 0 ) {   //똑같은 사용자가 DB에 존재하면...
        // header("Location: user_registration.php? MSG='아이디:$user_id 닉네임:$user_name 나 이메일:$user_email 이 이미 존재합니다.' ");     
       echo "<script> alert('아이디:$user_id2 가 이미 존재합니다.')</script>";  
 
         //registration.php로 이동하게 하는데, 메시지도 전달하여 출력 시켜주면 좋다.

    } else {                             //사용자로 DB에 등록이 가능하면
        $query = "INSERT INTO information_login (user_name, user_id, user_pass, user_email)
        VALUES ('$user_name2', '$user_id2', '$user_pass2','$user_email2')";
        
        if (mysqli_query($con,$query)) {        
           //쿼리 실행이 재대로 되면
            //$_SESSION['login'] = $username;         
          //로그인 세션에 내가 입력한 사용자가이름이 들어간다. (로그인이 됬다는 증거로..)
            // header("Location: user_login.php");        
             // echo "db저장 성공!";
              echo "<script> alert('회원가입 되었습니다.')</script>"; 
              // echo '<meta http-equiv="refresh" content="0"

              //로그인 되었을때의 페이지인 user_login.php로 이동
            }       
          }
    }



}

mysqli_close($con);

?>


<!--회원가입 코드부분 끝----------------------------------------------->


</body>
</html>