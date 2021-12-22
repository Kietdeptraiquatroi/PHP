@extends ('layouts.app')
@section('main-content')
@forelse($dsTaiKhoan as $taiKhoan)
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
            <img src="svgs/1.jpg" alt="Logo" />
        </a>
        <div class="d-flex gap-3">
      <form action="{{route('back_Main')}}">
  <button  class="btn btn-danger btn-lg" >Thoát</button>
</div>
</form>
</header>
    </header>
<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-3">
      <h5></h5>
      <div class="fakeimg">
      <img src="{{$taiKhoan->images}}" alt="Avatar" width="300" height="400" />
      </div>
    </div>
    <div class="col-sm-8">
     <b>Tên đăng nhập:</b>
    <div class="mb-3">
                <input type="text" class="form-control py-3" placeholder="{{$taiKhoan->username}}" readonly/>
    </div>
    <b>Họ và tên:</b>
    <div class="mb-3">
                <input type="text" class="form-control py-3" placeholder="{{$taiKhoan->ho_ten}}" readonly  />
    </div>
    <b>Email:</b>
     <div class="mb-3">
                <input type="text" class="form-control py-3" placeholder="{{$taiKhoan->email}}" readonly />
    </div>
    <b>Số điện thoại:</b>
    <div class="mb-3">
                <input type="text" class="form-control py-3" placeholder="{{$taiKhoan->phone}}" readonly  />
    </div>
    <b>Loại tài khoản:</b>
    <div class="mb-3">
                <input type="text" class="form-control py-3" placeholder="{{$taiKhoan->loai_tk}}" readonly />
    </div>
    <b>Thời gian tạo:</b>
    <div class="mb-3">
                <input type="text" class="form-control py-3" placeholder="{{$taiKhoan->created_at}}" readonly />
    </div>
    <b>Cập nhật gần nhất:</b>
    <div class="mb-3">
                <input type="text" class="form-control py-3" placeholder="{{$taiKhoan->updated_at}}" readonly />
    </div>
    <form action="{{route('cn_tai_khoan')}}">
    <button class="btn btn-primary py-2" name="update">Chỉnh sửa</button>
    </form>
    
</div>

      @empty
@endforelse
@endsection
@section('title')
-Giảng viên
@endsection

