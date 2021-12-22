<?php session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
if(isset($_SESSION['UserID']) && isset($_SESSION['UserName'])){
 header("Location: MainPage.php");   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-4.6.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="stylesheet" href="jquery-ui-1.13.0/jquery-ui.min.css">
</head>
<body>
    <!--NavBar Area Start-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-brand align-text-center" href="#"><img width="30" height="30" class="d-inline-block align-text-center" src="img/kisspng-royalty-free-logo-dragon-5af7c7409a9693.0700452215261878406332.png" alt="">&emsp;提醒事項系統</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
              
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">登入</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#Signin">註冊</a>
              </li>
              <!--
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">登入</a></li>
                  <li><a class="dropdown-item" href="#">註冊</a></li>
                </ul>
              </li>
              -->
            </ul>
          </div>
        </div>
      </nav>
    <!--NavBar Area End-->

    <!--Login Area Start-->
    <div class="BackGround_img">
      <div class=" text-center container " >
          <div class="row justify-content-center align-items-center" style="height: 80vh;">
            <main class="form-signin col-12 col-md-4 mx-4 bg-light rounded">
                <form class="">
                <img class="mb-4 mt-4" src="img/kisspng-royalty-free-logo-dragon-5af7c7409a9693.0700452215261878406332.png" alt="" width="72" height="72">
                <h1 class="h3 mb-3 fw-normal">歡迎回來</h1>
            
                <div class="form-floating text-left mb-3">
                  <label for="loginmail">Email</label>    
                  <input type="email" class="form-control" id="loginmail" placeholder="name@example.com">  
                </div>
                <div class="form-floating mb-2 text-left">
                  <label for="loginpwd">密碼</label> 
                  <input type="password" class="form-control" id="loginpwd" placeholder="Password">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="button" id="loginsent">登入</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
                </form>
            </main>
        </div>
      </div>
    </div>
    <!--Login Area End-->

    <!--modal Area start-->
      <div class="modal fade" id="Signin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content text-center">
            <div class="modal-header ">
              <h5 class="modal-title" id="staticBackdropLabel">註冊</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="">
                <img class="mb-4 mt-4" src="img/kisspng-royalty-free-logo-dragon-5af7c7409a9693.0700452215261878406332.png" alt="" width="72" height="72">
                <h1 class="h3 mb-3 fw-normal">新朋友安安</h1>
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">姓名</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Username" placeholder="可愛鯊鯊">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Useremail" placeholder="email@example.com">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">密碼</label>
                  <div class="col-sm-10">
                    <input type="password"class="form-control" id="Userpwd" placeholder="大小寫英文家數字至少8碼">
                  </div>
                </div>
                <div class="mb-3 row">
                    <span id="Errormsg" class="text-danger"></span>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              
              <button type="button" id="registsent" class="btn btn-primary col-12 col-md-6 mx-auto">送出</button>
            </div>
          </div>
        </div>
      </div>
    <!--modal Area End-->

    <!--Footer Area Start-->
    <div class="bg-dark">    
    <div class="container">
        <footer class="py-3  ">
          <ul class="nav col-md-4 justify-content-center border-bottom pb-3 mb-3 mx-auto">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
          </ul>
          <p class="text-center text-muted">© 2021 Company, Inc</p>
        </footer>
    </div>
  </div>
    <!--Footer Area End-->

<!--JavaScript Area-->
<!--Bootstrap js
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
Jquery js
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
Sweetalert js
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="jquery-ui-1.13.0/jquery-ui.min.js"></script>
<script src="bootstrap-4.6.1-dist/js/bootstrap.bundle.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(document).ready(function(){
    $('#registsent').click(function(){regist()})
    $('#loginsent').click(function(){Login()})
  });

  function Login(){
    var Loginmail = $('#loginmail').val();
    var Loginpwd = $('#loginpwd').val();
    if((Loginmail=="")||(Loginpwd==""))
    {
      swal({
        icon:"error",
        title:"登入失敗",
        text:"請輸入正確的帳號密碼"
      }).then(function(){
        $('#loginmail').val("") ;
        $('#loginpwd').val("") ;
      })
    }
    else
    {
      $.ajax({
        url:"Login.php",
        type:"post",
        data:{
          Loginmail : Loginmail,
          Loginpwd : Loginpwd
        },
        success:function(data){
         if(data == "success"){
           swal({
             icon:"success",
             title:"跳轉中請稍後",
           }).then(function(){
             window.location.href = "MainPage.php"
           })
          console.log("yes");
         }
          else{
            swal({
              icon:"error",
              title:"帳號或密碼輸入錯誤"
            })
          }
        }

      })
    }
  }


  //Regist Function Area//
  function regist(){
    var Username = $("#Username").val();
    var Useremail = $('#Useremail').val();
    var Userpwd = $('#Userpwd').val();
    var regbool = false

    var Pwdreg=/^(?![0-9]+$)(?![a-z]+$)(?![A-Z]+$)(?!([^(0-9a-zA-Z)])+$)^.{8,16}$/;
    var Emailreg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if((Emailreg.test(Useremail))&&(Pwdreg.test(Userpwd)))
    {
      regbool = true;
    }
    if((Username == "")||(Useremail == "")||(Userpwd == ""))
    {
      swal({
        icon:"error",
        title: "請輸入內容"
      })
    }
    else if (regbool == false)
    {
      $('#Errormsg').text("請確定Email或密碼符合格式")
    }
    else{
      $.ajax({
        url:"regist.php",
        type:"post",
        data:{
          Username : Username,
          Useremail : Useremail,
          Userpwd : Userpwd
        },
        success:function(data,status){
          if(data == "success")
          {
            swal({
              icon:"success",
              title:"註冊成功",
              text:"請直接登入"
            }).then(function(){
              window.location.href = "LoginPage.php"
            })
          }
          else if(data == "RepeatEmail"){
            swal({
              icon:"error",
              title:"此帳號已被註冊"
            })
          }
        }

      })
    }
  }
</script>

</body>
</html>
