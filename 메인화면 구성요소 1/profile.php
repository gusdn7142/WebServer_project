<!DOCTYPE>


<html lang="en">
<head>
  <meta charset="utf-8">
</head>


<body>

<!--------로그인완료후 마이페이지에서 프로필 수정,삭제 HTML 부분 시작 ------------->
<?php

if(isset($_SESSION['login'])){ 
  ?>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
      
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span style="font-size:30px;"> &times; </span> </button>
          
          <center>
          <h4 style="font-size:20px;" class="modal-title"><b>회원정보 변경</b></h4>
          </center>
          
        </div>
        
        

<?php
$con = mysqli_connect('localhost','root','123123','exam');

$login_user=$_SESSION['login'];

// echo "<script> alert('$login_user')</script>";    



$query = "SELECT * FROM information_login WHERE user_name='$login_user'";
$result = mysqli_query($con,$query);


while($row = mysqli_fetch_array($result)){   //한개의 행을 array타입으로 받음

// $row = mysqli_fetch_array($result)


// $id = $row['id'];
$user_name = $row['user_name'];  
$user_id = $row['user_id'];  
$user_pass = $row['user_pass'];  
$user_email = $row['user_email'];  

 mysqli_close($con);
?>

        
          <form method="POST" action="user_account.php">
        
         <center>
         
        <div class="modal-body">
          
          
    <table style="opacity: 0.7; width:400px;" >
    
          <tr style="text-align: center;">



        <td>  <span style="font-size:20px;">닉네임 </span><input id="input_5" value="<?= $user_name; ?>" type="text" style="width:300px;
height: 45px; padding-left:25px;" name="user_name3"   > </td>
       </tr >  

        <tr style="text-align: center;">   
      <td>  <span style="font-size:20px;">&nbsp&nbsp&nbspID &nbsp&nbsp&nbsp&nbsp</span> <input id="input_5" value="<?= $user_id; ?>" type="text" style="width:300px;
height: 45px; padding-left:25px;" name="user_id3" > </td>
       </tr>  

        <tr style="text-align: center;" >
      <td>  <span style="font-size:17px;"><b>패스워드</b></span><input id="input_5" value="<?= $user_pass; ?>" type="password" style="width:300px;
height: 45px; padding-left:25px;" name="user_pass3"  > </td>
        </tr> 

        <tr style="text-align: center;">
      <td> <span style="font-size:20px;">이메일&nbsp </span><input id="input_5" value="<?= $user_email; ?>" type="text" style="width:300px;
height: 45px; padding-left:25px;" name="user_email3" p > </td>
        </tr> 
 
       </table>
          
          
        </div>
        
        </center>
        


        
        <div class="modal-footer">
                <center>
      <table>
          <input type="submit" name="submit6" value="수정하기"   style="width:191px; height: 45px;  background-color: green; color:white; font-size: 20px;  ">
          <!--data-dismiss="modal" -->
&nbsp

          <input type="submit" name="submit7" value="회원정보 삭제"   style="width:191px; height: 45px;  background-color: #e20007; color:white; font-size: 20px;  ">
     </table>

     </center>
   </div>


</form>
    
      </div>
      
      
    </div>
  </div>

  <?php

}






// 마이페이지에서 수정하기 php 부분

if(isset($_POST['submit6'])){
$con = mysqli_connect('localhost','root','123123','exam');


$user_name3=$_POST['user_name3'];
$user_id3=$_POST['user_id3'];
$user_pass3=$_POST['user_pass3'];
$user_email3=$_POST['user_email3'];

  $_SESSION['login'] = $user_name3; //로그인된 사용자를 홈에 표시하기 위해서이다.

  $query = "UPDATE information_login SET user_name='$user_name3' , user_id='$user_id3', user_pass='$user_pass3'
            , user_email='$user_email3' WHERE user_name='$user_name'  ";

// echo $user_name;
// echo $user_name;
// echo $user_name;
// echo $user_name;


if( $result = mysqli_query($con,$query)) {  //삭제 성공시 다시 원래 있던곳으로 되돌려줌
 
  
  // header("Location: user_account.php");

/*
echo '<script> 
window.onload = function(){}
</script>
';
*/


// window.location.reload(true);
 
 echo"
<script>
timer = setTimeout(function(){      // 특정 코드, 함수를 의도적으로 지연하는 함수
//location.reload();                   
alert('",$user_name3,"님 업데이트에 성공하였습니다.');
clearTimeout(timer);      
},0000); // 3000밀리초 = 3초
</script>
";

 // echo "<script> alert('",$user_name3,"님 업데이트에 성공하였습니다.')</script>"; 
  
 // unset($_SESSION['login']);

}

mysqli_close($con);
}





// 마이페이지에서 삭제하기 php 코드 부분

if(isset($_POST['submit7'])){
$con = mysqli_connect('localhost','root','123123','exam');


$query = "DELETE FROM information_login WHERE user_name='$user_name'";


if( $result = mysqli_query($con,$query)) {  //삭제 성공시 다시 원래 있던곳으로 되돌려줌
  
 unset($_SESSION['login']);
 echo "<script> alert('",$user_name,"님 회원정보 삭제가 완료되었습니다.')</script>"; 

 // unset($_SESSION['login']);

}

mysqli_close($con);


}

}
  ?>
<!--------로그인완료후 프로필 수정,삭제부분 끝 ------------->




</body>
</html>









<!-- (양식 다시제출 방지)새로 고침 및 뒤로 버튼을 다시 제출하는 것을 방지---->

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<!---------------------------------------------->



