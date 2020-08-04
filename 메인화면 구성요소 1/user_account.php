<!DOCTYPE html>

<?php                                        
session_start();

// $_SESSION['outer_count']=0;
// $_SESSION['outer_review']=0;   //아우터 리뷰 총 회수 세션용

?>



<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com -->
  <title>Home - 데일리 패션 리뷰 </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>





<!---이미지 파일 불러와서 출력하는 스크립트 코드 -->    
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



<!-----ajax와 db연동해서 검색어 키워드 표시하는 스크립트 코드-------------------->
<script>
function showHint(str){
if (str.length==0){                                       //input값이 없으면
  document.getElementById("txtHint").innerHTML=" 현재 없음";         //빈칸이고
  return;
  }
var xmlhttp=new XMLHttpRequest();                          //오브젝트 생성   

xmlhttp.onreadystatechange=function(){                      //특정 입ㄴ트가 발생하면 함수를 실행
  if (xmlhttp.readyState==4 && xmlhttp.status==200){       //서버러 보낼 준비가 완료되면 
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;    //txtHint에 서버에서 보낸걸 넣는다.
    }
  }

xmlhttp.open("GET","ajax_search.php?q="+str,true);
xmlhttp.send();
}
</script>
<!---------------------------------------------------------------------->





  <style>

 /*///////////// 회원가입 토글바 적용 ///////////////////*/
 

#input_5:focus {
  outline:3px solid #6495ed;

}

.modal-backdrop {   /*회원가입 창 모델문제 해결*/
  z-index: -1;
}


/*///////////// //////////// ///////////////////*/



/*///////////// 전체 적용 ///////////////////*/
 

input::placeholder {
  
  font-size:15px;
  /*padding-left: 13px;*/
}

textarea::placeholder {
  
  font-size:15px;
  
  /*padding-left: 13px;*/
}

input:focus, textarea:focus{
  outline:3px solid #6495ed;
}



/*////////////////////////*/




/*상단바 -----------------------------*/

  .navbar {       /*제목, 검색 부분 div */       
    margin-bottom: 0;
    background-color:   #808080 !important  ;
     font-size: 13px !important;
    font-family: Montserrat, sans-serif;
    font-weight: bold;
  }
   


    a, .navbar-brand {
    color: #fff !important;   /* 겹쳐도 글자색을 #fff(회색)로 지정 */
  }


 #btn0{
  background-color:black  ;
  margin-left: 1px;
  margin-right: 1px;

  }

  #btn1{
  background-color:black  ;
  margin-left: 1px;
  margin-right: 1px;

  }

  
  #btn2{
  
  margin-left: -5px;

  }
  
  #search{
  height:34px !important;   /* 강제 우선순위 적용*/

  }

/*상단바 끝--------------------------*/





/* 여기부터가 품목 밑에 몸체 부분 !!*/

.bix_body_1  {    /*제목, 검색 부분 div... 원래 점프트론 이였음*/
    background-image:url("https://www.fashionseoul.com/wp-content/uploads/2017/07/20170720_hiphop-6.jpg") ;
    background-repeat: repeat-x;
    /*background-image:url("body1.jpg") ;*/
    
    /*line-height: 8.0;*/
    height: 690px;
    /*width:1300px;            조절이 필요할듯 !!!!!!!!!!!!!!!!!!!!!!*/
    /*margin-bottom: -18px;  /* 블럭과 블럭 사이 */
    border: 2px dashed white;
  }



  .big_box_1{
   
  margin-top: 5%;
/*border:5px solid blue;*/
  }


  #smalls_box1{
   
/*border:1px solid yellow;*/
margin-left: 50px; 
width:400px; 
height:300px; 
padding-top:15px;
 /*padding-left: 80px;*/
  }


  



/*  여기부터는 리뷰등록 박스 스타일 부분 */

#smalls_box2{
width: 700px;
height: 255px;
/*border: 1px solid white;*/
/*float:left;*/
/*margin-left: 50px;*/

}




#image_div{
 /*position: relative;
 left: 100px;*/
margin-left: 10px;
margin-top: 5px;
width: 200px;
height: 236px;
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


/*등록 부분 스타일 끝*/








/* 두번쨰 화면( 출력부분)----------------*/
  

#bix_body_2{
border: 2px dashed white;


height: 440px;
/*background-color: red;   새은 무조건 빅박스에 주어야 한다. */
background-image:url("하늘2.JPG");
background-repeat: no-repeat;
background-size : cover;
overflow:auto;


}

#small_box_2{

margin-left: 15px; 
/*margin-right: 50px;   */
/*border: 5px solid blue;*/
/*width: 500px;*/
/*height: 500px;*/
}

.element_div{
margin-top: 10px;
margin-left: 5px;

padding-top: 5px;

margin-right: 5px;
padding-left: 5px;
padding-right: 5px; 
border: 4px solid white;
border-radius: 5px 5px 5px 5px;
}

.image_div_2{

margin-top: 10px;
width: 180px;
height: 221px;

}


#textarea_2{
/*margin: 5px 5px 5px 4px;*/
border-radius: 6px 6px 6px 6px;
font-weight: bold;
/*width:97.5%;*/
width: 100%;
height:100%;
}


#a_2{
color: white !important;

}


.glyphicon.glyphicon-thumbs-up {
    font-size: 18px;

}

/*--------------------------------------------*/





















/*--------------------------------------------*/


  </style>
</head>




<body id="myPage" data-spy="scroll"  >  <!--spy는 안써도 될듯.. data-target=".navbar"... data-target=".navbar"... -->




<nav class="navbar navbar-default navbar-fixed-top"> <!--navbar-fixed-top-->

  <div >
    
    <div class="navbar-header"> <!--네비바 헤더 -->

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">  <!-- 토글은 숨김가능한 태그를 제어함... 즉 collapse함으로서 보이기 숨기기가 가능하다. + id="myNavbar"인 곳으로 이동한다. -->
        <span class="icon-bar" style="background-color: #ffffff !important;" ></span>
        <span class="icon-bar" style="background-color: #ffffff !important;"></span>
        <span class="icon-bar" style="background-color: #ffffff !important;"></span>     <!--반페이지시 아이콘 -->                    
      </button>


      

      <a class="navbar-brand" style="border-style: none none none dashed; border-color: white;" href="#myPage">품목</a>



    </div>




    <div class="collapse navbar-collapse" id="myNavbar">  <!--네비게이션바 자동접기 기능 -->
      <ul class="nav navbar-nav" >  <!--헤더 옆 네비바들 --->
        <li ><a style="border-style: none dashed none dashed; border-color: white; background-color: navy;"href="#best_1">Best(
 <span class="glyphicon glyphicon-thumbs-up" style="font-size:14px; "></span>
  x 5 )
        </a></li>
        <li><a href="#worst_1" style="background-color: #CC0000;">Worst(
 <span class="glyphicon glyphicon-thumbs-up" style="font-size:14px; "></span>
  x 1 )
        </a></li>
        <li><a style="border-style: none dashed none dashed; border-color: white; background-color: #666666" href="#outer_1">Outer(아우터)</a></li>
        <li><a href="#top_1" style ="background-color: #666666">Top(상의)</a></li>
        <li><a style="border-style: none dashed none dashed; border-color: white; background-color: #666666"href="#pants_1">Pants(바지)</a></li>
        <li><a href="#shoes_1" style ="background-color: #666666">Shoes(신발)</a></li>
        <li><a style="border-style: none dashed none dashed; border-color: white; background-color: #339933"href="#search_1">Search(검색 내역)</a></li>

      </ul>



<ul >

  <button style="margin-right: 2px;" type="button" id="btn0" class="navbar-brand navbar-right" data-toggle="modal" data-target="#myModal">회원가입</button>


<!------------------------밑에는 회원가입, 로그인시 수정 삭제 부분----------------->
<!-- Modal -->




<!------------------------회원가입 토글바 부분 시작!!!!!!!!!!!!------------------>
<?php
include 'user_registration.php';
?>


<!------------------------회원가입 토글바 부분 끝!!!!!!!!!!!!------------------>





<!--------로그인완료후 프로필 수정,삭제부분 시작 ------------->
<?php
include 'profile.php';
?>



<!--------로그인완료후 프로필 수정,삭제부분 끝 ------------->









<!---------------- 로그인 버튼 부분 ---------------------->

<?php 
                                //로그인 세션 존재시 재로딩!!!
if(isset($_SESSION['login'])){  //로그아웃을 누르면 세션이 없어지게함!!!
                                 //세션이 존재하면 onload가 실행됨

                                  // 로그인 세션이 존재하니 재로딩 하여 문장 수행
echo '<script>                     
    
$(document).ready(function(){      
document.getElementById("btn1").innerHTML = "로그아웃";
document.getElementById("btn0").innerHTML = "마이페이지";

document.getElementById("btn1").onclick=function() {        location.href="sessiondel.php";      };

});

</script>
';


}


?>

  <button   type="button" id="btn1" onclick="location.href='user_login.php'" class="navbar-brand navbar-right">로그인</button>
      


  <sapn  class="navbar-brand navbar-right"> <?php 
  



  if(isset($_SESSION['login'])){
  echo $_SESSION['login'], "님!"; 
  }
  ?>

</span>

 <!-------------------------------------------------->     
    </ul>




    </div>

  </div>



</nav>












<div class="bix_body_1"> <!--text-center-->


  <h1 style="color: #fff; text-align:center; padding-top: 130px; font-family:궁서; font-size:60px; text-shadow: 4px 5px 2px brown;    " ><b>Daily Fashoin Review </b></h1> 
  <p style="color: #fff; text-align:center; font-family:Montserrat; font-size:30px;
  padding-top: 30px; text-shadow: 3px 2px 2px brown;"> 의류 정보 공유 커뮤니티 </p> 



<!--  ----------------------------------------------------------------------------------------------------- -->



<div class="big_box_1 container" >

<table>
<tr>




<!--  ----------------------------------------------------------------------------------------------------- -->


<td >
  <div style="width:342px;   ">
<h4  style=" border: 1px solid #87CEFA; background-color: white; padding: 3px 3px 3px 3px;  border-radius: 7px 7px 7px 7px; font-family:돋움; opacity: 0.9;  "> <b>로그인된 사용자만 등록이 가능합니다.</b> </h4>
</div>
</td>



<!--  ----------------------------------------------------------------------------------------------------- -->





<td rowspan="2">
<div id="smalls_box1">



  <form method="POST" action="user_account.php">
     
      <input id="search"  type="text" name="research_text" placeholder=" 의류 정보를 검색해 주세요." required  title="brand, name, size, color, price, review에 대한 검색이 가능합니다." onkeyup="showHint(this.value)" style="border-radius: 6px 6px 6px 6px; width:270px; text-align: center; font-size: 17px; ">

        <button type="submit" id="btn2" name="submit8"  class="btn btn-success" style="font-weight: bold; width:128px; margin-bottom: 5px; "><span class="glyphicon glyphicon-search"></span> 통합 검색 </button>
      
  
  </form>
     <div title="brand, name, size, color 순으로 키워드가 나타납니다." style="overflow:auto; background-color:rgba( 255, 255, 255, 0.2); border:1px dotted brown; width:400px; height:40px; border-radius: 6px 6px 6px 6px; "> <p style="color:#00bcf8; text-align: center; font-size:14px; font-weight: bold;">제시된 키워드 : <span style="color:white ;" id="txtHint">현재 없음</span></p> </div>


       <b> <textarea readonly="readonly" style=" width: 400px; height:197px;  border-radius: 6px 6px 6px 6px; opacity: 0.9; font-size: 15px; color:black; margin-top: 7px;">
            리뷰작성전 Tip 3가지를 읽어주시기 바랍니다. 

  첫째, 품목, 사진(이미지)와 브랜드, 의류, 사이즈, 색상, 
           가격등의 정보를 사전에 파악
  둘째, 이미 작성된 리뷰가 있는지 검색을 통해 확인

  셋쨰, 좋아요는 최대 5점까지 입력이 가능합니다.

          좋아요 1점과 2점은 옷의 소재나 사이즈등이 
           실제와 사진이 맞지 않은 경우,
          좋아요 3점은 옷을 구입했을때 나쁘진 않지만 
            다시 구입하지는 않을 상품,
          좋아요 4점과 5점은 브랜드에 대해서 신뢰가 있고 
            다시 구매할 의향이 있는 상품을 말합니다.     
        </textarea></b>



</div>
</td>




</tr>




<tr>
<td>

<!--  ---------------------------------------------------------------------------------------------------- -->



<div id= 'smalls_box2'  > <!--style="border: 1px solid;" -->


<!-- <div id ="smallss_box" style="border:3px solid black;"> -->


<table >


<tr>

<!--  ----------------------------------------------------------------------------------------------------- -->

<td rowspan="2">

<div id="image_div" title="사진을 업로드 해주세요." style="border:2px dotted white; margin-right:10px; color:white;
  font-size: 15px; ">


<img id="blah" class="img-rounded" src="#" alt="" style="width: 196px; height: 230px;" />
    

</div>

</td>

<!--  ----------------------------------------------------------------------------------------------------- -->




<!--  ----------------------------------------------------------------------------------------------------- -->

<th colspan="2" style="padding-top:10px; ">



<form action="user_account.php" method="POST" enctype="multipart/form-data" >


 <input type="radio" name="kind2" value="outer" checked> <span style= "color:white; font-size:15px; margin-right: 5px;">아우터 </span>
 <input type="radio" name="kind2" value="top"> <span style= "color:white; font-size:15px; margin-right: 5px;">상의 </span>
 <input type="radio" name="kind2" value="pants"> <span style= "color:white; font-size:15px; margin-right: 5px;">바지</span>
 <input type="radio" name="kind2" value="shoes"><span style= "color:white; font-size:15px; margin-right: 5px;"> 신발 </span>
 <!--<input type="radio" name="kind2" readonly="readonly" value="headwear"> <span style= "color:white; font-size:15px; margin-right: 5px;">모자</span> -->
   &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 <span title="평가에 중요한 요소입니다." style= "color:white; font-size:15px; "><span style="font-size: 20px; " class="glyphicon glyphicon-thumbs-up"></span> 등급 </span> <input required type="number" min="1" max="5" name="score2" title="평가에 중요한 요소입니다." style="width: 33px;  border-radius: 6px 6px 6px 6px; text-align: center;">


</th>
<!--  ----------------------------------------------------------------------------------------------------- -->

</tr>




<tr>

  <!--  ----------------------------------------------------------------------------------------------------- -->
<td>


<input type='file' name="image2"  required id="imgInp" style="text-align:center; border-radius: 6px 6px 6px 6px; opacity: 0.95; width:200px; margin-bottom: 10px; background-color: white;"   /> 




 <span style= "color:white; font-size:15px; "><b>Brand</b></span>   <input type="text" required name="brand2" placeholder="브랜드 입력." style="text-align:center; border-radius: 6px 6px 6px 6px; width: 151px; margin-bottom: 3px; opacity: 0.95; font-size: 14px;">
<br>
 <span style= "color:white; font-size:15px;"><b>Name&nbsp</b></span><input type="text" required name="name2" placeholder="의류 이름 입력." style="text-align:center; border-radius: 6px 6px 6px 6px; width: 151px; margin-bottom: 3px; opacity: 0.95; font-size: 14px;" >
<br>
 <span style= "color:white; font-size:15px;"><b>Size </b></span> &nbsp&nbsp  <input required type="text" name="size2" placeholder="사이즈 입력." style="text-align:center; border-radius: 6px 6px 6px 6px; width:151px; margin-bottom: 3px; margin-left: 2px; opacity: 0.95; font-size: 14px;" >
<br>
 <span style= "color:white; font-size:15px;"><b>Color</b></span>&nbsp  <input type="text" required name="color2" placeholder="색상 입력." style="text-align:center; border-radius: 6px 6px 6px 6px; width:151px; margin-bottom: 3px; margin-left: 1px; opacity: 0.95; font-size: 14px;">
<br>
 <span style= "color:white; font-size:15px;"><b>Price</b></span>&nbsp&nbsp  <input type="text" required name="price2" placeholder="가격 입력." style="text-align:center; border-radius: 6px 6px 6px 6px; width:151px; opacity: 0.95; font-size: 14px;">

<br>

<input class="btn btn-primary " type="submit" name="submit2" value="리뷰 등록" style="font-weight: bold; width: 151px; height: 28px; border-radius: 6px 6px 6px 6px; margin-top: 5px;  position:relative;
  left:50px;" >

</td>

<!--  ----------------------------------------------------------------------------------------------------- -->


<!--  ----------------------------------------------------------------------------------------------------- -->

<td>

  
<label for="comment" style="position:relative;  color:white; margin-left: 20px;">리뷰 입력:</label>

<textarea class="form-control" required id="textarea_1" rows="8" cols="60" placeholder="리뷰를 입력하세요." name="review2" style=" padding: 7px 5px 5px 5px;   opacity: 0.9;  font-size: 15px; margin-left: 20px; "></textarea>


</td>


<!--  ----------------------------------------------------------------------------------------------------- -->








</tr>



</form>

  
<!-- </div> -->




</table>




</div>


</td>
</tr>



</table>



</div>







</div>






<!------ 2번쨰 화면(best 부분) ------------>

<div id="best_1" style="background-color:navy; height:45px;  text-align:center"> <p style="padding-top:8px; font-size:20px; font-weight:bold; color:white;"> Best (
 <span class="glyphicon glyphicon-thumbs-up" style="font-size:14px; "></span>
  x 5 )   <span style="font-size:22px; background-color:green"> <span style="padding-bottom:8px;" :8px; class="glyphicon glyphicon-list-alt"></span>


 리뷰 


  </span>  </p> </div>




<div id= 'bix_body_2'  > <!--class="container"-->





<?php
include 'best.php';
?>


</div> 

<!------ 2번쨰 화면(best 부분 끝) ------------>






<!------ 3번쨰 화면(worst 부분) ------------>

<div id="worst_1" style="background-color:#CC0000; height:45px;  text-align:center"> <p style="padding-top:8px; font-size:20px; font-weight:bold; color:white;"> Worst (
 <span class="glyphicon glyphicon-thumbs-up" style="font-size:14px; "></span>
  x 1 )   <span style="font-size:22px; background-color:green"> <span style="padding-bottom:8px;" :8px; class="glyphicon glyphicon-list-alt"></span>


 리뷰 


  </span>  </p> </div>




<div id= 'bix_body_2'  > 





<?php
include 'worst.php';
?>


</div> 

<!------ 3번쨰 화면(worst 부분 끝) ------------>







<!-------- 4번째 화면(아우터 부분) -------------------------------->

<div id="outer_1" style="background-color:#666666; height:45px;  text-align:center"> <p style="padding-top:8px; font-size:20px; font-weight:bold; color:white;">  아우터 (Outer)   <span style="font-size:22px; background-color:green"> <span style="padding-bottom:8px;" :8px; class="glyphicon glyphicon-list-alt"></span>


 리뷰 


  </span>  </p> </div>



<div id= 'bix_body_2'  > <!--class="container"-->



<?php
include 'outer.php';
?>


</div>

<!------4번쨰 화면(아우터) 끝 ----------->






<!-------- 5번째 화면(상의 부분) -------------------------------->

<div id="top_1" style="background-color:#666666; height:45px;   text-align:center"> <p style="padding-top:8px; font-size:20px; font-weight:bold; color:white;">  상의 (Top)   <span style="font-size:22px; background-color:green"> <span style="padding-bottom:8px;" :8px; class="glyphicon glyphicon-list-alt"></span>


 리뷰 
 

  </span>  </p> </div>



<div id= 'bix_body_2'  > <!--class="container"-->



<?php
include 'top.php';
?>


</div>

<!------5번쨰 화면(상의) 끝 ----------->





<!-------- 6번째 화면(바지 부분) -------------------------------->

<div id="pants_1" style="background-color:#666666; height:45px;   text-align:center"> <p style="padding-top:8px; font-size:20px; font-weight:bold; color:white;"> 바지 (Pants)   <span style="font-size:22px; background-color:green"> <span style="padding-bottom:8px;" :8px; class="glyphicon glyphicon-list-alt"></span>


 리뷰 


  </span>  </p> </div>



<div id= 'bix_body_2'  > <!--class="container"-->



<?php
include 'pants.php';
?>


</div>

<!------6번쨰 화면(바지) 끝 ----------->






<!-------- 7번째 화면(신발 부분) -------------------------------->

<div id="shoes_1" style="background-color:#666666; height:45px;   text-align:center"> <p style="padding-top:8px; font-size:20px; font-weight:bold; color:white;"> 신발 (shoes)   <span style="font-size:22px; background-color:green"> <span style="padding-bottom:8px;" :8px; class="glyphicon glyphicon-list-alt"></span>


 리뷰 


  </span>  </p> </div>



<div id= 'bix_body_2'  > <!--class="container"-->



<?php
include 'shoes.php';
?>


</div>

<!------7번쨰 화면(신발) 끝 ----------->






<!--- 8번쨰 화면(검색 불러오기) -------->


<div id="search_1" style="background-color:green; height:45px;   text-align:center"> <p style="padding-top:8px; font-size:20px; font-weight:bold; color:white;"> 검색 내역(Search)   <span style="font-size:22px; background-color:#339933"> <span style="padding-bottom:8px;" :8px; class="glyphicon glyphicon-list-alt"></span>

 리뷰 


  </span> </p> </div>



<div id= 'bix_body_2'>

<?php 
  include 'research.php'; 
  ?>


</div>
<!---8번째 화면 (검색 불러오기 끝) ------->










</body>



</html>

























<?php
// 리뷰등록 :  폼 제출하고 db에 등록하는 코드
 $con = mysqli_connect("localhost","root","123123","exam") or die(mysqli_connect_error());
 


  if (isset($_POST['submit2'])) {             //제출이 완료되면
if(isset($_SESSION['login']) || isset($_SESSION['admin'])){                //세션에 로그인 사용자가 있으면.. 즉) 로그인된 사용자면


$kind = $_POST['kind2'];
$score = $_POST['score2'];
$brand = $_POST['brand2'];
$name = $_POST['name2'];
$size = $_POST['size2'];
$color = $_POST['color2'];
$price = $_POST['price2'];
$review = $_POST['review2'];





  $file = $_FILES['image2']['tmp_name'];   //파일형식 폼의 이름 image와 임시이름으로 불러옴
                 


    if(!isset($file)) {                      //이미지가 제대로 전달이 안됬으면..
        echo "Please select an image.";
    }

    else {                               //이미지가 제대로 전달이 됬으면...
    $image_data = addslashes(file_get_contents($_FILES['image2']['tmp_name'])); 
    $image_name = addslashes($_FILES['image2']['name']);
    $image_size = getimagesize($_FILES['image2']['tmp_name']);

     if($image_size == FALSE) {                                              //이미지가 아니면
           echo "<script> alert('이미지 파일을 등록해 주세요.')</script>"; 
        }
        else {                                                                //이미지이면 db에 넣기
            $sql = "INSERT INTO information (image, kind, score, brand, name, size, color, price, review) VALUES('$image_data','$kind','$score','$brand','$name','$size','$color','$price','$review')" ;    //images테이블을
                                                 
               
            if ( !mysqli_query($con,$sql) ) {                                 //db에 이미지 넣는게 실패시
                echo "이미지 업로드시 문제발생 => ." . mysqli_error($con);
            }
            else {                                                           //db에 이미지 넣는게 성공시
                //echo "<p> Your Image : $image_name </p>";   
                        //잘 저장됬다는걸 알림
                // echo "db저장에 성공하였습니다."; 

               
              // header("Cache-Control: no cache");
// session_cache_limiter("private_no_expire");
                // header("Refresh:0");

               // header('Location:user_account.php');
              echo"
              <script>
               setTimeout(function(){      // 특정 코드, 함수를 의도적으로 지연하는 함수
                location.reload();          //페이지 새로고침
                alert('리뷰 등록이 완료되었습니다.');
               },0000); // 3000밀리초 = 3초          
               </script>
               ";

                // echo "<script> alert('리뷰 등록이 완료되었습니다.')</script>";   

               // header('Location:user_account.php');
               // header("Refresh:0; url=user_account.php");

            }
        }   
    }

}



else{
  echo "<script> alert('로그인시 리뷰 등록이 가능합니다.')</script>";
}


}


mysqli_close($con);

?>



<!-- (양식 다시제출 방지)새로 고침 및 뒤로 버튼을 다시 제출하는 것을 방지---->

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<!---------------------------------------------->



