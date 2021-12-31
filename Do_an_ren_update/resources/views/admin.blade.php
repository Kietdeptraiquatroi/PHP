<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>

    <!-- Tab icon -->
    <link rel="icon" href="./svgs/board.svg" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/reset.css" />
</head>

<body>
    <!-- Header -->
    <header class="
        fixed-top
        header
        shadow
        d-flex
        justify-content-between
        px-4
        py-3
        bg-white
      ">
        <a href="#" class="logo me-3">
            <img src="svgs/logo.svg" alt="Logo" />
        </a>
          <div class="d-flex gap-3">
            <input class="form-control py-2" placeholder="Search for class" />
          <button class="btn btn-primary py-2">Search</button>
          <form action="{{route('dang_ky')}}">
              <button class="btn btn-primary py-2">Registration</button>
          </form>
                  <div class="dropdown">
                    <a class="avatar me-5" data-toggle="dropdown">
                        <img src="{{$user->images}}" alt="Avatar"  />
                    </a>
                          <div class="dropdown-menu">
                                  <div>
                                  <img src="{{$user->images}}" alt="Avatar" width="300" height="400"  />
                                  </div>
                                <b class="dropdown-item">Tên đăng nhập: <i>{{$user->username}}</i></b>
                                <b class="dropdown-item">Tên họ tên: <i>{{$user->ho_ten}}</i></b>
                                <b class="dropdown-item">Email: <i>{{$user->email}}</i></b>
                                <b class="dropdown-item">Ngày đăng ký: <i>{{$user->created_at}}</i></b>
                                  <div class="btn-group">
                                      <form action="{{route('cn_tai_khoan')}}">
                                        <button class="btn btn-primary btn-sm ">Change  </button>
                                      </form>
                                      <form action="{{route('dang_xuat')}}">
                                        <button class="btn btn-outline-danger btn-sm">Log out</button>
                                      </form>
                                  </div>
                            </div>
                    </div>
            </div>


       
      </div>
    </header> 
    <!-- Admin -->
    <section class="container border py-4 space-header bg-white">
        <div>
            <h2 class="text-success border-bottom pb-3 mb-4">{{$user->username}}</h2>

            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar me-3">
                        <img src="{{$user->images}}" alt="Avatar" />
                    </div>
                    <span class="fs-5">{{$user->ho_ten}}</span>
                </div>

                <!-- <div>
                    <div class="d-inline-flex btn btn-primary me-2">
                        Remove to Teacher
                    </div>
                    <div class="d-inline-flex btn btn-primary">Remove to Student</div>
                </div> -->
            </div>
        </div>
    </section>

   
<!-- Teacher -->
<section class="container mt-4 border py-4 bg-white">
        <div>
            <h2 class="text-success border-bottom pb-3 mb-4">Teacher</h2>
            @forelse($dsTaiKhoanGV as $gv)
            
            <ul class="d-flex flex-column gap-4">
                <li class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="avatar me-3">
                            <img src="{{$gv->images}}" alt="Avatar" />
                        </div>
                        <span class="fs-5">{{$gv->username}}</span>
                    </div>
                 
                    <div>
                    <div class="btn-group">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        details
                        </button>
                        <div class="dropdown-menu">
                            <strong class="dropdown-item" >Họ tên: <i> {{$gv->ho_ten}} </i></strong>
                            <strong class="dropdown-item" >Email: <i> {{$gv->email}} </i></strong>
                            <strong class="dropdown-item" type="date" format="DD,MM,YYYY">Ngày đăng ký: <i> {{$gv->created_at}} </i></strong>
                            <strong class="dropdown-item" >Cập nhật gần nhất: <i> {{$gv->updated_at}} </i></strong>
                            <!-- <form action="{{route('cn_tai_khoan_ad',['id'=>$gv->id])}}">
                            @csrf
                             <button class="btn btn-primary btn-sm ">Change  </button>
                            </form> -->
                        </div>
                        </div>
                        <form action="{{route('xoa_tai_khoan',['id'=>$gv->id])}}"method="POST">
                        @csrf
                        <button type="button" class="btn btn-danger">Remove to Teacher</button>
                        </form>   
    
                        </div>
                    </div>
                </li>
                </ul>
                @empty
<tr>
    <td colspan="5">Không có dữ liệu</td>
</tr>
@endforelse
               
        </div>
    </section>

    

    <!-- Student -->
    <section class="container mt-4 border py-4 bg-white">
        <div>
            <h2 class="text-success border-bottom pb-3 mb-4">Student</h2>

            @forelse($dsTaiKhoanSV as $hv)
            <ul class="d-flex flex-column gap-4">
                <li class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="avatar me-3">
                            <img src="{{$hv->images}}" alt="Avatar" />
                        </div>
                        <span class="fs-5">{{$hv->ho_ten}}</span>
                    </div>
                    <div>
                 
                    <div class="btn-group">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        details
                        </button>
                        <div class="dropdown-menu">
                        <strong class="dropdown-item" >Họ tên: <i> {{$hv->ho_ten}} </i></strong>
                            <strong class="dropdown-item" >Email: <i> {{$hv->email}} </i></strong>
                            <strong class="dropdown-item" type="date" format="DD,MM,YYYY">Ngày đăng ký: <i> {{$hv->created_at}} </i></strong>
                            <strong class="dropdown-item" >Cập nhật gần nhất: <i> {{$hv->updated_at}} </i></strong>
                        </div>
                        </div>
                        <form action="{{route('xoa_tai_khoan',['id'=>$hv->id])}}"method="POST"> 
                        @csrf
                            <button class="d-inline-flex btn btn-danger">Remove to student</button>
                    </form>
    
                        </div>
                    </div>
                   </div>
                </li>
            </ul>
            @empty
<tr>
    <td colspan="5">Không có dữ liệu</td>
</tr>
@endforelse
            </div>
    </section>
</body>

</html>