<!DOCTYPE>


<html lang="en">
<head>
  <meta charset="utf-8">
</head>


<body>








<div id= 'small_box_2'  >  <!--- 이게 꼭 필요하다!! -->




<?php


$con=mysqli_connect("localhost","root","123123","exam");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


if (isset($_POST['submit8'])) {      //제출이 되었으면 실행한다.

  
 

    $research_text = $_POST['research_text'];           //폼에 입력한 값을 불러옴
 

  
  // header("Refresh:0");
 // echo "<script> alert('", $research_text, " 실행 되는거지?')</script>";  
            //3칸이 모두 입력이 되었으면, users테이블에 name과 email이 내가 입력한 값인 행을 불러온다. (똑같은 계정이 DB에 있는지 확인..)

    $query = "SELECT * FROM information WHERE brand like '%$research_text%' or name like '%$research_text%' or size like '$%research_text%' or color like '%$research_text%' ";   //키워드를 포함하는 문자 찾기 (리뷰ㄴ는 뻇음)
    
    // $query = "SELECT * FROM information WHERE brand='$research_text' "; 

    $result = mysqli_query($con,$query);

  

if ( mysqli_num_rows($result) == 0 ) {
  // echo $query;
echo "<script> alert('", $research_text, " 라고 검색한 정보가 없습니다.!')</script>";  
}



 while($row = mysqli_fetch_array($result))  {           //브랜드가 내가 검색한 키워드와 맞는 행을 뽑아옴  

// echo $row['brand'];  

?>



<table  style="float:left;  ">
  <tr>
  <td>



<div class='element_div' style=" width: 183px; height: 220px; " >


<b>Brand</b><input type="text" name="brand" value="<?=$row['brand']?>"  readonly="readonly" style="border-radius: 6px 6px 6px 6px; font-weight: bold; text-align:center; width: 120px; margin-bottom: 3px;">
<br>
<b>Name</b>   <input type="text" name="name" value="<?=$row['name']?>"  readonly="readonly" style="border-radius: 6px 6px 6px 6px; font-weight: bold; text-align:center; width: 120px; margin-bottom: 3px;" >
<br>
<b>Size</b> &nbsp&nbsp<input type="text" name="size" value="<?=$row['size']?>"  readonly="readonly" style="border-radius: 6px 6px 6px 6px; font-weight: bold; text-align:center; width:120px; margin-bottom: 3px; margin-left:1px; " >
<br>
<b>Color</b>&nbsp<input type="text" name="color" value="<?=$row['color']?>"  readonly="readonly" style="border-radius: 6px 6px 6px 6px; font-weight: bold; text-align:center; width:120px; margin-bottom: 3px; margin-left:2px;">
<br> 
<b>Price</b>&nbsp<input type="text" name="price" value="<?=$row['price']?>"  readonly="readonly" style="border-radius: 6px 6px 6px 6px; font-weight: bold; text-align:center; width:120px; margin-bottom:5px; margin-left:3px;"> 




<?php

echo "<span style='font-weight: bold; text-align: center; '> 좋아요 : ";
for($i=0; $i<$row['score']; $i++){
// echo '<img height="20" width="20" src="good.png" alt="좋아요 수" >' ;
echo '<span class="glyphicon glyphicon-thumbs-up" style="margin-right:2px; "></span>';
}
echo "</span>";


?>
<br>



<!-- <div  style="border:2px solid black; width:170px; "> -->




<button id = "btn3" type="button" class="btn btn-warning" 

onclick="

<?php
if(isset($_SESSION['login'])){  
  echo "location.href='change.php? id=",$row['id'],"'";
}
else
  echo "alert('로그인시 자료 수정이 가능합니다.')"; 

?>
" 

style=" width:77px; height:30px; margin-top: 5px; "><p style="padding-left: -10px;"><a  id="a_2" style="position: relative;
  left: -5px; text-decoration: none; "> <b>자료 수정</b></a></p></button>




<!-- href="del.php? id= <?= $row['id'] ?> "  -->
<button id = "btn4" type="button" class="btn btn-danger" 

onclick="

<?php
if(isset($_SESSION['login'])){  
  echo "location.href='del.php? id=",$row['id'],"'";
}
else
  echo "alert('로그인시 삭제가 가능합니다.')"; 
?>
" 

style=" width:77px; height:30px; margin-top: 5px; "><p style="padding-left: -10px;"><a id="a_2" style="position: relative;
  left: -5px; text-decoration: none"><b>전체 삭제</b> </a></p> </button>



</div> 
  


</td>


<td>

<div class="image_div_2" >

<img alt="embedded image" class="img-thumbnail" style=" width: 180px; height: 220px;"   src="data:image/png;base64, <?=  chunk_split(base64_encode($row['image']))  ?>  ">


</div>

</td>

</tr>




<tr><td colspan="2">  <!--  열 두개로 합침 -->

<div style="border: 3px solid white; margin: 5px 5px 5px 4px; border-radius: 6px 6px 6px 6px; height:153px; width:375px;">
<textarea id="textarea_2" rows="7" cols="43" readonly="readonly"><?=$row['review']?></textarea>    
</div>

</td>
</tr>

</table>

<?php
}

mysqli_close($con);

}


?>





</div>


</body>
</html>