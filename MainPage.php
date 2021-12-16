<?php 
session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="stylesheet" href="jquery-ui-1.13.0/jquery-ui.min.css">
</head>
<body>
<!--NavBar Area Start-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand align-text-center" href="#"><img width="30" height="30" class="d-inline-block align-text-center" src="img/kisspng-royalty-free-logo-dragon-5af7c7409a9693.0700452215261878406332.png" alt="">&emsp;提醒事項系統</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $_SESSION['UserName']?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">登出</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>
<!--NavBar Area End-->

<!--Main Area Start-->
<div class="main-area BackGround_img mb-5 p-3">
  <div class="container mt-5 bg-light py-5 px-2">
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addnewnotify">新增提醒事項</button>
    <button class="btn btn-primary">切換至已完成事項</button>
      <table class="table  table-striped table-hover">
        <thead id="mainthead" class="text-center">
          <tr>
            <th>#</th>
            <th>項目</th>
            <th>備註</th>
            <th>詳情</th>
            <th>完成</th>
            <th>刪除</th>
          </tr>
        </thead>
        <tbody id="maintbody">
          <tr>
            <td class="text-center">1</td>
            <td class="text-center">345656456</td>
            <td >完成專案版面架設</td>
            <td class="text-center"><button class="btn btn-primary" >詳情</button></td>
            <td class="text-center"><button class="btn btn-info">完成</button></td>
            <td class="text-center"><button class="btn btn-danger">刪除</button></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="6" class=""><label for="">代辦事項共計：</label></td>
          </tr>
        </tfoot>
      </table>
      <div class="">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

</div>
<!--Main Area End-->

<!--Footer Area Start-->
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top container">
          <p class="col-md-4 mb-0 text-muted">&copy; 2021 Company, Inc</p>
      
          <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          </a>
      
          <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
          </ul>
        </footer>
    <!--Footer Area End-->

<!--notify Area start-->
<div class="modal fade" id="addnewnotify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">提醒事項</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">提醒事項主題</label>
            <input type="text" class="form-control" id="Notifyevent">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">備註</label>
            <textarea class="form-control" id="Remark"></textarea>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">是否計出提醒通知信?</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="Emailoption" id="inlineRadio1" value="1">
              <label class="form-check-label" for="inlineRadio1">是</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="Emailoption" id="inlineRadio2" value="0" checked>
              <label class="form-check-label" for="inlineRadio2">否</label>
            </div>
          </div>
          <div id="timepick" class=" row mb-3">
              <label for="recipient-name" class="col-form-label">通知時間</label>
              <input type="text" id="Datetime" name="NotifyDate" class="form-control mb-3 col" placeholder="日期">
              <select id="NotifyTime" class="form-select form-select-lg mb-3 col" aria-label=".form-select-lg example">
                <option name="originT" selected>時間</option>
                <?php
                for($i=1;$i<=24;$i++)
                {
                  echo "<option name='NotifyTime' value='$i:00'>$i:00</option>";
                }
                ?>
              </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
        <button type="button" id="NotifySent" class="btn btn-primary">新增</button>
      </div>
    </div>
  </div>
</div>
<!--modal Area End-->

<!--JavaScript Area-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="jquery-ui-1.13.0/jquery-ui.min.js"></script>
<!--Sweetalert js-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function(){
    $('#timepick').hide();
    $('#Datetime').datepicker({ dateFormat: 'yy-mm-dd' });
    $('#NotifySent').click(function(){NotifySend()});
    $('input[type=radio][name="Emailoption"]').on("change",function(){
      switch($(this).val()){
        case'0':
          $('#timepick').hide();
          break
        case'1':
          $('#timepick').show();
          break
      }
    })
  })

  function NotifySend(){
    var Ntevent = $('#Notifyevent').val();
    var Ntremark = $('#Remark').val();
    var NtDate = "";
    var NtTime = "";
    var Checked = $('input[type=radio][name="Emailoption"]:checked').val()
    if(Checked == "1")
    {
      NtDate = $('#Datetime').val();
      NtTime = $('#NotifyTime option:selected').val();
      if((NtDate== "")&& (NtTime == "時間"))
      {
        Swal.fire({
          icon:"error",
          title:"請選擇時間及日期"
        })
      }
    }
    $.ajax({
      url:"Addnotify.php",
      type:"post",
      data:{
        Ntevent : Ntevent,
        Ntremark : Ntremark,
        NtDate : NtDate,
        NtTime : NtTime
      },
      success:function(data){
        if(data == "successful")
        {
          Swal.fire({
            icon:"success",
            title:"新增成功"
          }).then(function(){
            $('#Notifyevent').val("");
            $('#Remark').val("");
            $('#Datetime').val("");
            $('#NotifyTime option[name="originT"]').attr('selected');
            $('#addnewnotify').modal('hide');
          })
        }
      }
      
    })
  }

  function RefreshList(){
    $.ajax({
      url:""
    })
  }
</script>

</body>
</html>