<?php 

session_start();
if(!isset($_SESSION['UserID']) && !isset($_SESSION['UserName'])){
  header("Location: LoginPage.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--link href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"-->
    <link rel="stylesheet" href="bootstrap-4.6.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="stylesheet" href="jquery-ui-1.13.0/jquery-ui.min.css">
    <!--link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"-->
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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['UserName']?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" id="Logout" href="#">登出</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
    </nav>
<!--NavBar Area End-->

<!--Main Area Start  -->
<div class="main-area BackGround_img mb-5 p-3">
  <div class="container mt-5 bg-light py-5 px-2">
    <div class="mb-3">
    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#AddNotifyModal">新增提醒事項</button>
    <button class="btn btn-primary" id="SwitchCcomplete">切換至已完成事項</button>
    </div>
      <table id="maintable" class="table  table-striped table-hover mt-3">
        <thead id="mainthead" class="text-center">
          <tr>
            <th>#</th>
            <th>項目</th>
            <th>備註</th>
            <th>詳情</th>
            <th>完成</th>
            <th>刪除</th>
            <!--<th hidden>提醒Check</th>
            <th hidden>提醒日期</th>
            <th hidden>提醒時間</th>-->
          </tr>
        </thead>
        <tbody id="maintbody">
         
        </tbody>
        <tfoot>
          <tr>
            <td colspan="6" class=""><label id="rowCount" for="">代辦事項共計：</label></td>
          </tr>
        </tfoot>
      </table>
      <form class="row" action="">
        <div class="col"></div>
        <select id="pagenumber" class="form-select form-select-sm col" aria-label=".form-select-sm example">
          <option selected>選擇分頁</option>
        </select>
        <div class="col"></div>
      </form>

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

<!--AddNotify Modal -->
<div class="modal fade" id="AddNotifyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">提醒事項</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="mb-3">
            <label for="Notifyevent" class="col-form-label">提醒事項主題</label>
            <input type="text" class="form-control" id="Notifyevent">
          </div>
          <div class="mb-3">
            <label for="Remark" class="col-form-label">備註</label>
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
          <div id="timepick" class="mb-3 form-row">
            <div class="form-group col-md-6">
              <label for="Datetime" class="col-form-label">通知時間</label>
              <input type="text" id="Datetime" name="NotifyDate" class="form-control mb-3" placeholder="日期">
            </div>
            <div class="form-group col-md-6">
              <label for="NotifyTime" class="col-form-label">&emsp;</label>
              <select id="NotifyTime" class="form-control mb-3" aria-label="form-select-lg example">
                <option name="originT" selected>時間</option>
                <?php
                for($i=1;$i<=24;$i++)
                {
                  echo "<option name='NotifyTime' value='$i:00'>$i:00</option>";
                }
                ?>
              </select>
            </div>
              
              
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="NotifySent" class="btn btn-primary">送出</button>
      </div>
    </div>
  </div>
</div>
<!--NotifyDetail Area End-->
<div class="modal fade" id="NotifyDetail" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">提醒事項</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="mb-3">
          <input type="text" class="form-control" id="NotifyID" hidden>
            <label for="Detailevent" class="col-form-label">提醒事項主題</label>
            <input type="text" class="form-control" id="Detailevent">
          </div>
          <div class="mb-3">
            <label for="DetailRemark" class="col-form-label">備註</label>
            <textarea class="form-control" id="DetailRemark"></textarea>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">是否計出提醒通知信?</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="DetailEmailoption" id="DetailRadio1" value="1">
              <label class="form-check-label" for="inlineRadio1">是</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="DetailEmailoption" id="DetailRadio2" value="0" checked>
              <label class="form-check-label" for="inlineRadio2">否</label>
            </div>
          </div>
          <div id="Detailtimepick" class="mb-3 form-row">
            <div class="form-group col-md-6">
              <label for="DetailDatetime" class="col-form-label">通知時間</label>
              <input type="text" id="DetailDatetime" name="NotifyDate" class="form-control mb-3" placeholder="日期">
            </div>
            <div class="form-group col-md-6">
              <label for="DetailTime" class="col-form-label">&emsp;</label>
              <select id="DetailTime" class="form-control mb-3" aria-label="form-select-lg example">
                <option name="originT" selected>時間</option>
                <?php
                for($i=1;$i<=24;$i++)
                {
                  echo "<option name='DetailTime' value='$i:00'>$i:00</option>";
                }
                ?>
              </select>
            </div>
              
              
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
        <button type="button" class="btn btn-primary" id="DetailChange">送出修改</button>
      </div>
    </div>
  </div>
</div>
<!--NotifyDetail Area End-->

<!--JavaScript Area-->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="jquery-ui-1.13.0/jquery-ui.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
              
weetalert js
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="jquery-ui-1.13.0/jquery-ui.min.js"></script>
<script src="bootstrap-4.6.1-dist/js/bootstrap.bundle.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $(document).ready(function(){
    $('#DetailChange').click(function(){NotifyChange()} );
    $('#timepick').hide();
    $('#Detailtimepick').hide();
    RefreshList()
    $('#Datetime').datepicker({ dateFormat: 'yy-mm-dd' });
    $('#DetailDatetime').datepicker({ dateFormat: 'yy-mm-dd' });
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
    $('input[type=radio][name="DetailEmailoption"]').on("change",function(){
      switch($(this).val()){
        case'0':
          $('#Detailtimepick').hide();
          break
        case'1':
          $('#Detailtimepick').show();
          break
      }
    })
    $('#pagenumber').change(function(){
      console.log($('#pagenumber option:selected').val());
    })
    document.onclick = function(e){
      var obj = event.srcElement;
      if(obj.type=="button" && obj.value == "delete"){
        Delete(obj.id);
      }
      else if(obj.type == "button" && obj.value == "complete"){
        alert(obj.id) ;
      }
      else if(obj.type == "button" && obj.value == "detail"){
        console.log("click success");
        alterlist(obj.id);
      }
    }
    $('#Logout').click(function(){
      console.log("logout");
      logout();
    })
  })


  //提醒事項修改
  function NotifyChange(){
    // chang = CH
    var CHId = $('#NotifyID').val();
    var CHEvent = $('#Detailevent').val();
    var CHRemark = $('#DetailRemark').val();
    var CHChcked = $('input[type=radio][name="DetailEmailoption"]:checked').val();
    var CHDate = "";
    var CHTime = "";
    if(CHChcked == "1")
    {
      CHDate = $('#DetailDatetime').val();
      CHTime = $('#DetailTime option:selected').val();
    }
    console.log(`${CHId},${CHEvent},${CHRemark},${CHChcked},${CHDate},${CHTime}`)
    $.ajax({
      url:"RefreshList.php",
      type:"post",
      data:{
        Upmode: 1,
        CHId: CHId,
        CHEvent: CHEvent,
        CHRemark: CHRemark,
        CHChcked: CHChcked,
        CHDate: CHDate,
        CHTime: CHTime
      },
      dataType:"json",
      success:function(data){
        console.log();
      }
    })
  }

  //顯示Detail的訊息
  function alterlist(ID){
    console.log("function success");
    $.ajax({
      url:"RefreshList.php",
      type:"POST",
      data:{
        mode: "3",
        DetailID: ID
      },
      success:function(data){
        console.log(data[0])       
        $('#NotifyID').val(data[0]['fid']);
        $('#Detailevent').val(data[0]['fEvent']);
        $('#DetailRemark').val(data[0]['fRemark']);
        if(data[0]['fAlertCheck'] == "1"){
          $("#DetailRadio1").prop("checked", true);
          $('#Detailtimepick').show();
          $('#DetailDatetime').val(data[0]['fAlertdate']);
          var time =`${data[0]['fAlertdate']} ${data[0]['fAlerttime']}`;
          var time1 = new Date(time);
          $('#DetailTime')[0].selectedIndex = time1.getHours()+1;
        }
        else{
          $("#DetailRadio2").prop("checked", true);
          $('#Detailtimepick').hide();
          $('#DetailDatetime').val("");
          $('#DetailTime')[0].selectedIndex = 0;
        }
      },
      dataType:"json"
    })
  }


  //logout
  function logout(){
    $.ajax({
      url:"Logout.php",
      type:"post",
      data:{
        Logout: "1"
      },
      success:function(data){
        if(data == "success"){
          console.log("logoutsuccess")
          window.location.href = "LoginPage.php";
        }
        else{
          console.log("logoutFail")
        }
      }
    })
  }

  //新增提醒事項
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
        swal({
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
        Checked : Checked,
        NtDate : NtDate,
        NtTime : NtTime
      },
      success:function(data){
        if(data == "successful")
        {
          swal({
            icon:"success",
            title:"新增成功"
          }).then(function(){
            $('#Notifyevent').val("");
            $('#Remark').val("");
            $('#Datetime').val("");
            $('#NotifyTime')[0].selectedIndex = 0;
            $('#AddNotifyModal').modal('hide');
          }).then(RefreshList());
        }
      }
      
    })
  }

  //刪除項目
  function Delete(ID){
    $.ajax({
      url:"RefreshList.php",
      type:"post",
      data:{
        mode: "2",
        DeleteID : ID,
      },
      dataType:"json",
      success:function(data){
        console.log(data);
        $('#maintbody').empty();
        $.each(data.data,function(n,v){
         var str = "<tr>";
         str+= `<td class="text-center">${v[0]}</td>`;
         str+= `<td class="text-center">${v[1]}</td>`;
         str+= `<td class="">${v[2]}</td>`;
         str+= `<td class="text-center">${v[3]}</td>`;
         str+= `<td class="text-center">${v[4]}</td>`;
         str+= `<td class="text-center">${v[5]}</td>`;
         $('#maintbody').append(str);
       })
       console.log(data.pages)
       for(var i=1; i<=data.pages; i++)
       {
          var str = `<option value="${i}">${i}</option>`;
          $('#pagenumber').append(str)
       }
       
       $('#rowCount').text(`代辦事項共計：${data.rows}項`);
      },
    })
  }

  //更新List表單
  function RefreshList(){
    $('#maintbody').empty();
    $.ajax({
     url: "RefreshList.php",
     type: "post",
     data:{
       "mode" : "1"
     },
     dataType:"json",
     success:function(data){
       console.log(data);
       $.each(data.data,function(n,v){
         var str = "<tr>";
         str+= `<td class="text-center">${v[0]}</td>`;
         str+= `<td class="text-center">${v[1]}</td>`;
         str+= `<td class="">${v[2]}</td>`;
         str+= `<td class="text-center">${v[3]}</td>`;
         str+= `<td class="text-center">${v[4]}</td>`;
         str+= `<td class="text-center">${v[5]}</td>`;
         $('#maintbody').append(str);
       })
       console.log(data.pages)
       for(var i=1; i<=data.pages; i++)
       {
          var str = `<option value="${i}">${i}</option>`;
          $('#pagenumber').append(str)
       }
       
       $('#rowCount').text(`代辦事項共計：${data.rows}項`);
     }
   })
  }
  /*<tr>
            <td class="text-center">1</td>
            <td class="text-center">345656456</td>
            <td >完成專案版面架設</td>
            <td class="text-center"><button type="button" id="" class="btn btn-primary " >詳情</button></td>
            <td class="text-center"><button class="btn btn-info">完成</button></td>
            <td class="text-center"><button class="btn btn-danger">刪除</button></td>
          </tr>*/
</script>

</body>
</html>