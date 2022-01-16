<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Main Page</title>

    <!-- Tab icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="/svgs/board.svg" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/reset.css" />

    <!-- Scripts -->
    <script src="js/bootstrap.min.js" defer></script>
    <!--Infor-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
              <span class="flex-center text-nowrap d-none d-md-flex">Xin chào {{$user->username}}</span>
            <input class="form-control py-2" placeholder="Search for class" />
          <button class="btn btn-primary py-2 fa fa-search">Tìm kiếm</button>
                  <div class="dropdown">
                    <a  data-toggle="dropdown">
                        <img src="{{$user->images}}" alt="Avatar" class="rounded-circle" width="50" height="50"  />
                    </a>
                          <div class="dropdown-menu">
                                  <div>
                                  <img src="{{$user->images}}" alt="Avatar" class="rounded-circle mx-auto d-block"  width="200" height="200"  />
                                  </div>
                                <b class="dropdown-item">Tên đăng nhập: <i>{{$user->username}}</i></b>
                                <b class="dropdown-item">Tên họ tên: <i>{{$user->ho_ten}}</i></b>
                                <b class="dropdown-item">Email: <i>{{$user->email}}</i></b>
                                <b class="dropdown-item">Ngày đăng ký: <i>{{$user->created_at}}</i></b>
                                  <div class="btn-group">
                                      <form action="{{route('cn_tai_khoan',['id'=>$user->id])}}">
                                        <button class="btn btn-primary btn-sm fa fa-edit"> Thay đổi </button>
                                      </form>
                                      <form action="{{route('dang_xuat')}}">
                                        <button class="btn btn-outline-danger btn-sm fa fa-sign-out"> Đăng xuất</button>
                                      </form>
                                  </div>
                            </div>
                    </div>
            </div>


       
      </div>
    </header> 
    <!-- Show when user is student -->
    <section class="px-4 space-header mb-4">
    <form form method="POST" action="{{route('them_ma_lop')}}">
          
      <button
        type="button"
        class="btn btn-dark"
        data-bs-toggle="modal"
        data-bs-target="#modal-student"
      >
        Find class
      </button>
      @csrf
            @if('thong_bao')
            <span stype="color: red">{{session('thong_bao')}}</span>
            @endif
      <div
        class="modal fade"
        id="modal-student"
        tabindex="-1"
        style="display: none"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Class Code</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
              <div class="mx-3 my-3">
                <input class="form-control py-3" placeholder="Class code" name="code"/>
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary py-2"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
                <button class="btn btn-primary py-2">
                  Find
                </button>
              </div>
          </div>
        </div>
      </div>
      </form>
    </section>
   <!-- Class cards -->
  
  
   <section>
  
      <div class="container">
              <div class="row">
              @foreach($taikhoan->chiTiet as $tk)
             @if($tk->pivot->deleted_at==null)
                    <div class="col-md-4 col-lg-3 mb-5">
                            <div class="d-flex flex-column h-100  border">
                              <img
                                src="{{$tk->background}}"
                                class="img-cover h-50"
                                alt="Card background"
                              /><a href="{{route('tt_stream_hv',['id'=>$tk->id])}}">
                                      <div class="class-card__body my-2">
                                              <div
                                                class="d-flex align-items-center justify-content-between mb-2 ">
                                                <h5 class="class-card__classname container-fluid">{{$tk->ten_lop}}</h5>
                                              </div>

                                              <div
                                                class="d-flex align-items-center justify-content-between mb-2 "
                                              >
                                              @foreach($taikhoanGV as $gv)
                                              @if($gv->id==$tk->tai_khoan_id)
                                              
                                                <span class="class-card__role fs-5 container-fluid">Teacher: {{$gv->username}}</span>
                                            
                                              @endif
                                               
                                                @endforeach
                                              </div>
                                            <p class="class-card__subjects truncate container-fluid"> {{$tk->thong_tin}}
                                            </p>
                                            </a>
                                            <div class="class-card_code container-fluid">
                                                <span>Code: </span><span>{{$tk->code}}</span>
                                        <a href="{{route('roi_lop',['id'=>$tk->pivot->id])}}" onclick="return confirm('Bạn thật sự muốn rời lớp này?');"class="btn btn-danger fa fa-sign-out">Rời lớp</a>

                                               
                                            </div>
                                            
                                        </div>
                                       
                                        
                        </div>
              </div>
           @endif
         @endforeach
              </div>        
        
        </div>
       

</section>
</body>

</html>
    