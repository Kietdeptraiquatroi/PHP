@extends ('layouts.app')
@section('main-content')
<header class="
       
        header
        shadow
        d-flex
        justify-content-between
        px-3
        py-0
        bg-white
      ">
      <a href="#" class="logo me-5">
            <img src="svgs/logo.jpg" alt="Logo" />
        </a>
        <div class="d-flex gap-3">
      <form action="{{route('back_Main')}}">
  <button  class="btn btn-outline-danger btn-lg fa fa-sign-out" > Thoát</button>
</div>
</form>
</header>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 300px;
}
</style>
</head>

<body>



@foreach($taiKhoan as $taiKhoan)

<h1><b>Thay đổi thông tin</b> </h1>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'info')" id="defaultOpen">Thông tin cá nhân</button>
  <button class="tablinks" onclick="openCity(event, 'email')">Email</button>
  <button class="tablinks" onclick="openCity(event, 'password')">Mật khẩu</button>
</div>
<form action="{{route('xl_cn_tai_khoan',['id'=>$taiKhoan->id])}}" method="POST" enctype="multipart/form-data">
@csrf
<div id="info" class="tabcontent">

<div class="row">
    <div class="col-sm-3">
      <h5></h5>
      <div class="fakeimg">
      <img src="{{$taiKhoan->images}}" alt="Avatar" width="200" height="250" />
      <input type="file" name="file_upload">
      </div>
    </div>
    <div class="col-sm-8">
     <b>Tên đăng nhập:</b>
    <div class="mb-3">
                <input type="text" class="form-control py-3" value="{{$taiKhoan->username}}" readonly name="username"/>
    </div>
    <b>Họ và tên:</b>
    <div class="mb-3">
                <input type="text" class="form-control py-3" value="{{$taiKhoan->ho_ten}}" name="ho_ten" />
                @error('ho_ten')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
              </div>
              <b>Số điện thoại:</b>
    <div class="mb-3">
                <input type="text" class="form-control py-3" value="{{$taiKhoan->phone}}" name="phone" />
                @error('phone')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
              </div>
              </div>
              </div>
              
</div>

<div id="email" class="tabcontent">
<b>Email hiện tại:</b>
    <div class="mb-3">
                <input type="text" class="form-control py-3" value="{{$taiKhoan->email}}" readonly />
    </div>
<b>Email mới:</b>
     <div class="mb-3">
                <input type="text" class="form-control py-3"value="{{$taiKhoan->email}}" name="email" />
                @error('email')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
              </div>
</div>

<div id="password" class="tabcontent">
<b>Mật khẩu cũ :</b>
    <div class="mb-3">
               <input type="password" class="form-control py-3" name="password_cu"/>
               @error('password')
                    <span style="color: red" >{{ $message }}</span>
                    @enderror
                    @if('thong_bao')
            <span stype="color: red">{{session('thong_bao')}}</span>
            @endif
              </div>
    <b>Mật khẩu mới:</b>
    <div class="mb-3">
               <input type="password" class="form-control py-3" name="password_moi"/>
               @error('password')
                    <span style="color: red" >{{ $message }}</span>
                    @enderror
              </div>
    <b>Xác nhận mật khẩu:</b>
    <div class="mb-3">
                <input type="password" class="form-control py-3"  name="password_comfirm" />
                @error('confirm_password')
                    <span style="color: red" >{{ $message }}</span>
                    @enderror
              </div>
</div>
<button class="btn btn-primary py-2 fa fa-save" name="update">Lưu thay đổi</button>

</form>
@endforeach

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</body>

@endsection
@section('title')
-Giảng viên
@endsection