<!DOCTYPE>


<html lang="en">
<head>
  <meta charset="utf-8">
</head>

<body>

<?php

if(isset($_REQUEST["q"])){
$q=$_REQUEST["q"];
 $hint="";


if ($q !== ""){
 $q=strtolower($q); 
 $len=strlen($q);

// echo "<script> alert('",$_GET['q'], "페이지 이동이 되나 확인')</script>";   

$con = mysqli_connect('localhost','root','123123','exam');


if (!$con){
  die('Could not connect: ' . mysqli_error($con));
  }

// mysqli_select_db($con,"ajax_tryphp");
$sql="SELECT * FROM information WHERE brand like '%$q%' or name like '%$q%' ";        //입력 한문자열과 비슷한 키워드를 가져온다!!! (브랜드, 옷이름만)

$result = mysqli_query($con,$sql);



while($row = mysqli_fetch_array($result))  {   


for($i=4; $i<=7; $i++){                         //브랜드, 옷이름, 컬러순으로!!,               사이즈는 뺌!! 

   if($i==6){
    continue;
   }

 if (stristr($q, substr($row[$i],0,$len)) )  {     //db의 비슷한 키워드에서 0번 부터 입력한 글자의 길이까지 반환하는데
                                                           //그 반환한 글자와 내가 입력한 글자가 일치히하면 

   if ($hint==="") {                                       //힌트가 현재 없으면 힌트는 그냥 db에서 뽑아낸 것이고
       $hint= $row[$i];
      }
   else{                                                      //힌트는 이어붙인다. 
          $hint .= ", ". $row[$i]; 
      }

 }


}

 

 } 







    }

    echo $hint==="" ? "유사한 값이 없습니다." : $hint;
  }




mysqli_close($con);
?>



</body>
</html>