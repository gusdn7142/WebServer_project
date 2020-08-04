

<!DOCTYPE html>

<html lang="en">




<html>
<head>
    <title> <meta charset="utf-8">  </title>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>




 <!---파일 불러와서 출력하는 스크립트 코드 -->    
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    
    <script type="text/javascript">
        
        $(function() {
            $("#imgInp").on('change', function(){
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

              reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
<!---------------------------------------------------------->



  <meta charset="utf-8">


 <style>

input:focus{
  outline:3px solid #6495ed;
}


#textarea_1:focus{
  outline:3px solid #6495ed;
}



body{


  background-image:url("하늘.JPG");
background-repeat: no-repeat;
background-size: cover;
}






#small_box{

 /*display: flex;*/
 border: 3px dashed white;
height: 270px;
/*margin-left: 100px;*/
width:750px;

}

/*
#small-box div{
 flex:1;
}
*/

#image_div{
 /*position: relative;
 left: 100px;*/
margin-left: 10px;
margin-top: 5px;
width: 200px;
height: 234px;
border-radius: 8px 8px 8px 8px;
background-image:url("noimage.jpg") ;
background-repeat: no-repeat;
background-size: 196px 233px;


}








#textarea_1{
 
 width: 250px;
height: 185px;
 /*margin-left: 20px;*/
/*margin-top: 1px;*/
 
 /*position: absolute;*/
  /*left: 530px;*/
  /*bottom: 305px;*/
}
  </style>



</head>


<body>

<div style="height:500px;" >

<center>
<p style="margin-top:8%; font-size: 25px; font-family: Montserrat; "> <b>리뷰를 수정하세요.</b> </p>
</center>







<!-- <div id= 'Big_box_one' style="background-color: red;" > -->



<center>



<div id ="small_box">



<?php

$change_id = 0;



$con=mysqli_connect("localhost","root","123123","exam");



if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


////////////////////////////////////////////////////////////


if (isset($_POST['submit1'])) {             //제출이 완료되면


$kind = $_POST['kind'];
$score = $_POST['score'];
$brand = $_POST['brand'];
$name = $_POST['name'];
$size = $_POST['size'];
$color = $_POST['color'];
$price = $_POST['price'];
$review = $_POST['review'];
$id = $_POST['id'];



  $file = $_FILES['image']['tmp_name'];   //파일형식 폼의 image로 임시이름으로 불러옴
                           


    if(!isset($file)) {                      //이미지가 제대로 전달이 안됬으면..
        echo "Please select an image.";

    }

    else {                               //이미지가 제대로 전달이 됬으면...
    $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);


     if($image_size == FALSE) {                                              //이미지가 아니면???????????
            // echo "이미지가 아닙니다.";

          
            $sql = "UPDATE information SET kind='$kind', score='$score'
            , brand='$brand' , name='$name' , size='$size' , color='$color' , price='$price' , review='$review' WHERE id='$id'  ";

                                                 
               
            if ( !mysqli_query($con,$sql) ) {                                 //db 저장 실패시
                echo "db저장시 문제발생 => ." . mysqli_error($con);
            }
            else {                                                           //db에 이미지 넣는게 성공시
                
                echo "<script> alert('리뷰가 수정되었습니다.')</script>";  
                header("Location: user_account.php");
            }
         


        }



        else {             //이미지 파일이면..                                           //이미지이면 db에 넣기
           
            $sql = "UPDATE information SET image='$image_data' , kind='$kind', score='$score'
            , brand='$brand' , name='$name' , size='$size' , color='$color' , price='$price' , review='$review' WHERE id= '$id'  ";


                                                 
               
            if ( !mysqli_query($con,$sql) ) {                                 //db에 이미지 넣는게 실패시
                echo "이미지 업로드시 문제발생 => ." . mysqli_error($con);
            }
            else {                                                           //db에 이미지 넣는게 성공시
                //echo "<p> Your Image : $image_name </p>";   
                        //잘 저장됬다는걸 알림
                //echo "db수정에 성공하였습니다.";  
                 //echo $id;
                //echo $change_id;
                //echo $sql;
                echo "<script> alert('리뷰가 수정되었습니다.')</script>";  
                header("Location: user_account.php");
            }
        }   
    }
}





///////////////////////////////////////////////////////




if (isset($_GET['id'])){            //수정할 데이터 불러오기 
$change_id = $_GET['id'];
}



$result = mysqli_query($con,"SELECT * FROM information WHERE id='$change_id' ");



while($row = mysqli_fetch_array($result)){  

// echo "$change_id";

?>






<table >


<tr>

<!--  ----------------------------------------------------------------------------------------------------- -->

<td rowspan="2">

<div id="image_div" title="사진을 업로드 해주세요." style="border:2px dotted black; margin-right:10px; color:white;
  font-size: 15px; ">


<img id="blah" class="img-rounded" alt="embedded image" style="width: 196px;height: 230px;"   src="data:image/png;base64, <?=  chunk_split(base64_encode($row['image']))  ?>  ">

    

</div>

</td>

<!--  ----------------------------------------------------------------------------------------------------- -->




<!--  ----------------------------------------------------------------------------------------------------- -->

<th colspan="2" style="padding-top:10px; ">



<form action="change.php" method="POST" enctype="multipart/form-data" >


 <input type="radio" name="kind" value="outer" checked> <span style= "color:black; font-size:15px; margin-right: 5px;">아우터 </span>
 <input type="radio" name="kind" value="top"> <span style= "color:black; font-size:15px; margin-right: 5px;">상의 </span>
 <input type="radio" name="kind" value="pants"> <span style= "color:black; font-size:15px; margin-right: 5px;">바지</span>
 <input type="radio" name="kind" value="shoes"><span style= "color:black; font-size:15px; margin-right: 5px;"> 신발 </span>
 <input type="radio" name="kind" value="headwear"> <span style= "color:black; font-size:15px; margin-right: 5px;">모자</span>
  &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

 <span title="평가에 중요한 요소입니다." style= "color:black; font-size:15px; "><span style="font-size: 20px; " class="glyphicon glyphicon-thumbs-up"></span> 등급 </span> <input type="number" min="1" max="5" name="score" title="평가에 중요한 요소입니다." 
  value="<?=$row['score']?>" placeholder="입력." style="width: 33px;  border-radius: 6px 6px 6px 6px; text-align:center;">


</th>
<!--  ----------------------------------------------------------------------------------------------------- -->

</tr>




<tr>

  <!--  ----------------------------------------------------------------------------------------------------- -->
<td>


<input type='file' name="image"   id="imgInp" style="text-align:center; border-radius: 6px 6px 6px 6px; opacity: 0.95; width:200px; margin-bottom: 10px; background-color: white;"   /> 




 <span style= "color:black; font-size:15px; "><b>Brand</b></span>   <input type="text" name="brand" value="<?=$row['brand']?>" placeholder="브랜드 입력." style="text-align:center; border-radius: 6px 6px 6px 6px; width: 151px; margin-bottom: 3px; opacity: 0.95; font-size: 14px;">
<br>
 <span style= "color:black; font-size:15px;"><b>Name&nbsp </b></span>   <input type="text" name="name" value="<?=$row['name']?>"  placeholder="의류 이름 입력." style="text-align:center; border-radius: 6px 6px 6px 6px; width: 151px; margin-bottom: 3px; opacity: 0.95; font-size: 14px;" >
<br>
 <span style= "color:black; font-size:15px;"><b>Size </b></span> &nbsp&nbsp  <input type="text" name="size" value="<?=$row['size']?>" placeholder="사이즈 입력." style="text-align:center; border-radius: 6px 6px 6px 6px; width:151px; margin-bottom: 3px; margin-left: 2px; opacity: 0.95; font-size: 14px;" >
<br>
 <span style= "color:black; font-size:15px;"><b>Color</b></span>&nbsp  <input type="text" name="color" value="<?=$row['color']?>" placeholder="색상 입력." style="text-align:center; border-radius: 6px 6px 6px 6px; width:151px; margin-bottom: 3px; margin-left: 1px; opacity: 0.95; font-size: 14px;">
<br>
 <span style= "color:black; font-size:15px;"><b>Price</b></span>&nbsp&nbsp  <input type="text" name="price"  value="<?=$row['price']?>" placeholder="가격 입력." style="text-align:center; border-radius: 6px 6px 6px 6px; width:151px; opacity: 0.95; font-size: 14px;">

<br>

<input class="btn btn-primary " type="submit" name="submit1" value="리뷰 수정" style="font-weight: bold; width: 151px; height: 28px; border-radius: 6px 6px 6px 6px; margin-top: 5px;  position:relative;
  left:50px;" >

</td>

<!--  ----------------------------------------------------------------------------------------------------- -->


<!--  ----------------------------------------------------------------------------------------------------- -->

<td>

  
<label for="comment" style="position:relative;  color:black; margin-left: 20px;">리뷰 입력:</label>

<textarea class="form-control" id="textarea_1" rows="8" cols="60" placeholder="리뷰를 입력하세요." name="review" style=" padding: 7px 5px 5px 5px;   opacity: 0.9;  font-size: 15px; margin-left: 20px;"><?=$row['review']?></textarea>



<input type="text" name="id" style="display:none;" value=" <?= $change_id; ?> ">

</td>


<!--  ----------------------------------------------------------------------------------------------------- -->








</tr>



</form>

  
<!-- </div> -->




</table>


















<?php
}
mysqli_close($con);
//}                   
     //if (isset($_GET['id'])) 이 여기서 끝난다....
?>




</div>



  


</div>




</center>





</div>
</body>
</html>



