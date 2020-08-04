<!DOCTYPE>

<?php                                        
session_start();

if(!isset($_SESSION['admin'])){
 header("Location: admin_login.php ?admin_msg= 잘못된 접근입니다.");
}

?>



<html lang="en">
<head> <title> 관리자 페이지 </title>
<meta charset="utf-8">



<style>


body{


background-image:url("관리자배경.jpg");
background-repeat: no-repeat;
background-size: cover;

}




#table_1{
/*background: linear-gradient(to right, gray, white);*/
 border: 1px solid green;
   /*border-radius: 30px; */

opacity: 0.85;
/*margin:0 auto; 	*/
margin: 0px 50px 0px 50px;
text-align: center;
border-spacing: 4px 4px;   
/*width:700px;*/
/*height: 200px;*/
border-collapse: collapse;

/*border-left: 5px solid #369;*/
width: 750px;

font-size: 15px;
}



#tr_1{

color:white;
border-bottom: 3px solid silver;

}


#tr2{

     /*background-color: white; */
	
}


</style>



</head>



<!----------사용자 삭제창----------->

<body>


<div style="margin-top: 20px;">




<div style="float:left;  font-family: arial; ">

<!-- db에서 계정정보 가져와서 관리 -->
<h1 style="margin-left: 300px; font-size:40px;  "> 사용자 관리 </h1>


<table id="table_1" border="1"  >

 <tr   id="tr_1" bgcolor="#000080" height="40">
   <th> 사용자 닉네임 </th>
   <th> 사용자 ID </th>
   <th> 사용자 Password </th>
   <th> 사용자 E-mail </th>
   <th> 사용자 삭제 </th>
 </tr>


<?php
$con = mysqli_connect('localhost','root','123123','exam');
$query = "SELECT * FROM information_login";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)){   //한개의 행을 array타입으로 받음

$id = $row['id'];
$user_name = $row['user_name'];  //id
$user_id = $row['user_id'];  //name
$user_pass = $row['user_pass'];  //password
$user_email = $row['user_email'];  //email


?>


 <tr id="tr_2" height="35" bgcolor="white">
<td >   <?= $user_name; ?>  </td>
<td>  <?= $user_id; ?>  </td>
<td>  <?= $user_pass; ?>  </td>
<td>  <?= $user_email; ?>    </td>
<td style="background-color: #ff4040;">  <a style="text-decoration: none; color:white; " href="delete_user.php?del= <?= $id ?>"> <b> 삭제 </b></a>       </td>    <!-- delete는 id로 테이블의 행을 삭제시켜주는 역할이다 -->
<!-- get메서드로 del이라는 변수에 id 값을 전달한다. -->
 </tr>
 


<?php
}
 mysqli_close($con);
 ?>


</table>


</div>











<!---------관리자 회원정보 변경(수정)---------->


  <div>
          <center>
          <h4 style="font-size:25px; padding-top: 40px;" ><b>관리자 회원정보 변경</b></h4>
          </center>
  </div>
        
        


<?php
$con = mysqli_connect('localhost','root','123123','exam');

// $admin_user=$_SESSION['login'];

// echo "<script> alert('$login_user')</script>";    



$query = "SELECT * FROM information_admin";   //임시 : $admin_user 바꾸지
$result = mysqli_query($con,$query);


while($row = mysqli_fetch_array($result)){   //한개의 행을 array타입으로 받음

// $row = mysqli_fetch_array($result)

$admin_id = $row['admin_id'];  
$admin_pass = $row['admin_pass'];  


 // mysqli_close($con);
?> 





<form method="POST" action="admin_user(rear).php">
        
         <center>
         
        <div>
          
          
    <table style="opacity: 0.7; width:410px; border: 2px dashed white;" >
    

        <tr style="text-align: center;">   
      <td>  <span style="font-size:20px; color:navy;"><b>관리자 ID</b> </span> <input  value="<?= $admin_id; ?>" type="text" style="width:300px;
height: 45px; padding-left:25px;" placeholder="ID를 입력해주세요." name="admin_id2" > </td>
       </tr>  

        <tr style="text-align: center; color:navy;" >
      <td>  <span style="font-size:20px;"><b>패스워드&nbsp&nbsp</b></span><input placeholder="비밀번호를 입력해주세요."value="<?= $admin_pass; ?>" type="password" style="width:300px;
height: 45px; padding-left:25px;" name="admin_pass2"  > </td>
        </tr> 
 
       <tr  >
        <td><input type="submit" name="submit11" value="수정하기"   style="margin-left: 96px; width:300px; height: 45px;  background-color: green; color:white; font-size: 20px;  "> </td>
       </tr>
       <tr>
       <td> <button style="margin-left: 96px; background-color:red; color:white; font-size: 20px; width:300px; height: 45px;"  type="button" onclick="location.href='sessiondel(admin).php'">로그아웃</button> </td> 
       </tr>
 
       </table>
          
          
        </div>
        
        </center>
        

</form>
    


<?php
}
 mysqli_close($con);
?>



</div>


</body>

</html>






<?php


if(isset($_POST['submit11'])){
$con = mysqli_connect('localhost','root','123123','exam');



$admin_id2=$_POST['admin_id2'];
$admin_pass2=$_POST['admin_pass2'];


  // $_SESSION['login'] = $user_name3; //로그인된 사용자를 홈에 표시하기 위해서이다.



  $query = "UPDATE information_admin SET admin_id='$admin_id2' , admin_pass='$admin_pass2' WHERE admin_id='$admin_id'  ";

// echo $user_name;
// echo $user_name;
// echo $user_name;
// echo $user_name;



if( $result = mysqli_query($con,$query)) {  //삭제 성공시 다시 원래 있던곳으로 되돌려줌
 

 /*echo"
<script>
timer = setTimeout(function(){      // 특정 코드, 함수를 의도적으로 지연하는 함수
//location.reload();                   
alert('",$user_name3,"님 업데이트에 성공하였습니다.');
clearTimeout(timer);      
},0000); // 3000밀리초 = 3초
</script>
";
*/


 echo "<script> alert('관리자 회원 수정을 완료 하였습니다.')</script>"; 
  
 // unset($_SESSION['login']);

}

mysqli_close($con);
}












?>










<?php
 // echo "<script> alert('", $_SESSION['admin'], "')</script>";    
?>