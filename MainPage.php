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
    <title>提醒事項</title>
    <!--link href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"-->
    <link rel="stylesheet" href="bootstrap-4.6.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="stylesheet" href="jquery-ui-1.13.0/jquery-ui.min.css">
    <!--link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"-->
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
            <ul class="navbar-nav ml-auto ">
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
<div class="main-area BackGround_img py-3">
  <div class="container mt-2 bg-light py-5 px-2">
    <div class="mb-3 text-center">
      <h3 id="Todo_or_yet">待辦事項 - 未完成</h3>
    </div>
    <div class="mb-3 d-flex flex-row">
      <div class="col">
        <button id="Add_Notification_Btn" class="btn btn-danger" type="button" data-toggle="modal" data-target="#AddNotifyModal" >新增提醒事項</button>
        <button class="btn btn-primary" id="SwitchCcomplete" value="N">查看已完成事項</button>
      </div>
      <div class="col d-flex flex-row justify-content-end">
        <label for="" class="col-4 text-right">項目顯示數量：</label>
        <input id="PEN_before_change" type="text" value="10" hidden>
        <select id="PageEventNum" class="custom-select custom-select-sm col-4" aria-label=".form-select-sm example">
          <option value="10" selected>10</option>
          <option value="25">25</option>
          <option value="50">50</option>
        </select>
      </div>
    </div>
      <table id="maintable" class="table  table-striped table-hover">
        <thead id="mainthead" class="text-center">
          <tr>
            <th>#</th>
            <th>項目</th>
            <th>備註</th>
            <th class="tablebtn">詳情</th>
            <th class="tablebtn">完成</th>
            <th class="tablebtn">刪除</th>
            <!--<th hidden>提醒Check</th>
            <th hidden>提醒日期</th>
            <th hidden>提醒時間</th>-->
          </tr>
        </thead>
        <tbody id="maintbody">
         
        </tbody>

      </table>
          <div class="d-flex flex-row">
            <div class="col">
              <label id="rowCount" for="">代辦事項共計：</label>
            </div>
            <div class="col d-flex flex-row justify-content-end">
              <label for="" class="col-4 text-right">頁次：</label>
              <select id="pagenumber" class="custom-select custom-select-sm col-4 " aria-label=".form-select-sm example">
                <option value="0">請選擇分頁</option>
              </select>
            </div>
          </div>
  </div>
</div>
<!--Main Area End-->

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
            <input type="text" class="form-control" value="" id="Notifyevent">
          </div>
          <div class="mb-3">
            <label for="Remark" class="col-form-label">備註</label>
            <textarea class="form-control"  id="Remark"></textarea>
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
    $('#SwitchCcomplete').click(function(){
      var state = $('#SwitchCcomplete').val();
      if(state == "Y"){
        $('#SwitchCcomplete').val("N");
        $('#SwitchCcomplete').text("查看已完成事項");
        $('#Todo_or_yet').text("待辦事項 - 未完成")
        $('#Add_Notification_Btn').removeAttr('disabled','true')
        $('#pagenumber')[0].selectedIndex = 0;
      }
      else{
        $('#SwitchCcomplete').val("Y");
        $('#SwitchCcomplete').text("查看未完成事項");
        $('#Todo_or_yet').text("待辦事項 - 已完成");
        $('#Add_Notification_Btn').attr('disabled','false');
        $('#pagenumber')[0].selectedIndex = 0;
      }
      RefreshList();
    })
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
      RefreshList();
    })
    $('#PageEventNum').change(function(){
      RefreshList();
    })
    document.onclick = function(e){
      var obj = event.srcElement;
      if(obj.type=="button" && obj.value == "delete"){
        swal({
          icon:"warning",
          title:"是否確定刪除",
          buttons:{
            cancle: {
              text: "取消",
              value: "no"
            },
            confirm: {
              text : "確認",
              value: "yes"
            }
          }
        }).then(function(data){
          if(data == "yes"){
            Delete(obj.id);
          }
        })
      }
      else if(obj.type == "button" && obj.value == "complete"){
        StateChange(obj.id) ;
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


  //提交已完成項目
  function StateChange(ID){
    var state = $('#SwitchCcomplete').val();
    if(state == "N")
    {
      state = "Y";
    }
    else{
      state = "N";
    }
    $.ajax({
      url:"RefreshList.php",
      type:"post",
      data:{
        Upmode : 2,
        EventID : ID,
        Eventstate : state
      },
      success:function(data){
        if(data == "success"){
          RefreshList();
        }
      }
    })
  }

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
    if(CHChcked == "1" && (CHDate == "" || CHTime == "時間"))
      {
        swal({
          icon:"error",
          title:"請選擇時間及日期"
        })
      }
      else if(CHEvent == ""){
        swal({
          icon:"warning",
          title: "主題欄位不得為空"
        })
      }
    else{
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
      success:function(data){
        if(data =="success"){
          swal({
            icon:"success",
            title:"修改成功"
          }).then(function(){
            $('#NotifyDetail').modal('hide');
            RefreshList();
          })
        }
        else{
          $('#NotifyDetail').modal('hide');
        }
      }
    })
    }
    
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
    console.log(Ntevent);
    console.log(Ntremark);
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
    else if(Ntevent = null){
      swal({
          icon:"error",
          title:"提醒事項主題不得為空"
        })
    }
    else{
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
        else{
           swal({
             icon:"warning",
             title:"請確定主題不得為空"
           })
        }
      }
      
    })
    }
    
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
      success:function(data){
        if(data == "success"){
          RefreshList();
        }
        
      },
    })
  }

  //更新List表單
  function RefreshList(){
    var state = $('#SwitchCcomplete').val();
    var pagenumber = $('#pagenumber option:selected').val();
    var PEN_before_change = $('#PEN_before_change').val();
    var Page_Event_Num = $('#PageEventNum option:selected').val();
    if(PEN_before_change != Page_Event_Num){
      pagenumber = 1;
      $('#PEN_before_change').val(`${Page_Event_Num}`);
    }
    
    if(pagenumber == 0){
      pagenumber++;
    }
    $('#maintbody').empty();
    $('#pagenumber').empty();
    $.ajax({
     url: "RefreshList.php",
     type: "post",
     data:{
       "mode" : "1",
       "pagenumber" : pagenumber,
       "state" : state,
       "Page_Event_Num" : Page_Event_Num
     },
     dataType:"json",
     success:function(data){
       console.log(data);
       if(state == "N"){
        $('.tablebtn').attr("hidden",false)
        $.each(data.data,function(n,v){
         var str = "<tr>";
         str+= `<td class="text-center">${v[0]}</td>`;
         str+= `<td class="text-center">${v[1]}</td>`;
         str+= `<td class="text-center">${v[2]}</td>`;
         str+= `<td class="text-center">${v[3]}</td>`;
         str+= `<td class="text-center">${v[4]}</td>`;
         str+= `<td class="text-center">${v[5]}</td>`;
         str+= "</tr>"
         $('#maintbody').append(str);
       })
       }else{
        $.each(data.data,function(n,v){
          $('.tablebtn').attr("hidden",true)
         var str = "<tr>";
         str+= `<td class="text-center">${v[0]}</td>`;
         str+= `<td class="text-center">${v[1]}</td>`;
         str+= `<td class="text-center">${v[2]}</td>`;
         str+= "</tr>"
         $('#maintbody').append(str);
       })
       }
       
       console.log(data.pages)
       for(var i=1; i<=data.pages; i++)
       {
          var str = `<option value="${i}">${i}</option>`;
          $('#pagenumber').append(str)
       }
       $('#pagenumber')[0].selectedIndex = pagenumber-1;
       if(data.pages == 0){
        $('#pagenumber').append("<option value='0'>無資料</option>");
       }
       else if(pagenumber > data.pages){
        $('#pagenumber')[0].selectedIndex = pagenumber-2;
        RefreshList()
       }
       $('#rowCount').text(`代辦事項共計：${data.rows}項`);
       if($('#SwitchCcomplete').val() == "Y"){
        $('#rowCount').text("");
       }
       
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