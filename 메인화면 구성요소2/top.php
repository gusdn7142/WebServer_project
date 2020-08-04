<!DOCTYPE>


<html lang="en">
<head>
  <meta charset="utf-8">
</head>


<body>



<!-- 5번쨰 화면(상의 부분) -->





<div id= 'small_box_2'  >  <!--- 이게 꼭 필요하다!! -->


<?php


$con=mysqli_connect("localhost","root","123123","exam");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$result = mysqli_query($con,"SELECT * FROM information WHERE kind='top'");



// $_SESSION['outer_count']=0;

while($row = mysqli_fetch_array($result))  {

// if(isset($_SESSION['outer_review'])){




?>



<table  style="float:left;   ">
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








<button id = "btn3" type="button" class="btn btn-warning" 

onclick="

<?php
if(isset($_SESSION['login']) || isset($_SESSION['admin'])){  
  echo "location.href='change.php? id=",$row['id'],"'";
}
else
  echo "alert('로그인시 자료 수정이 가능합니다.')"; 

?>
" 

style=" width:77px; height:30px; margin-top: 5px; "><p style="padding-left: -10px;"><a  id="a_2" style="position: relative;
  left: -5px; text-decoration: none; "> <b>자료 수정</b></a></p></button>



<button id = "btn4" type="button" class="btn btn-danger" 

onclick="

<?php
if(isset($_SESSION['login']) || isset($_SESSION['admin'])){  
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

?>



</div>


</body>
</html>