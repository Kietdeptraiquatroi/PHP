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
  <button  class="btn btn-outline-danger btn-lg" >Thoát</button>
</div>
</form>
</header>

    </header>
<form action="{{route('xl_cn_tai_khoan')}}" method="POST" enctype="multipart/form-data">
<div class="container" style="margin-top:30px">
@csrf
@forelse($taiKhoan as $taiKhoan)
  <div class="row">
    <div class="col-sm-3">
      <h5></h5>
      <div class="fakeimg">
      <img src="{{$taiKhoan->images}}" alt="Avatar" width="300" height="400" />
      <input type="file" name="file_upload">
      </div>
    </div>
    <div class="col-sm-8">
       <h2>Thay đổi thông tin cá nhân</h2>
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
    <b>Email:</b>
     <div class="mb-3">
                <input type="text" class="form-control py-3"value="{{$taiKhoan->email}}" name="email" />
                @error('email')
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
              <br>
              <h2>Thay đổi mật khẩu</h2>
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
    <button class="btn btn-primary py-2" name="update">Lưu thay đổi</button>

      @empty
    @endforelse
</form>


@endsection
@section('title')
-Giảng viên
@endsection