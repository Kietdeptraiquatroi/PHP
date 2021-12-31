<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Main Page</title>

    <!-- Tab icon -->
    <link rel="icon" href="./svgs/board.svg" />

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
            <span class="flex-center text-nowrap d-none d-md-flex">Welcome student</span>
          <input class="form-control py-2" placeholder="Search for class" />
        <button class="btn btn-primary py-2">Search</button>
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
                      <button class="btn btn-outline-danger btn-sm">log out</button>
                    </form>
                </div>
            </div>
          </div>

        <div>
        
        </div>

      </div>
    </header>  
    <!-- Header -->
  
    <section class="px-4 space-header mb-4">
      <button
        type="button"
        class="btn btn-dark"
        data-bs-toggle="modal"
        data-bs-target="#modal-teacher"
      >
        Add new class
      </button>

      <div
        class="modal fade"
        id="modal-teacher"
        tabindex="-1"
        style="display: none"
        aria-hidden="true"
      >
      <form action="{{route('them_moi_lop_hoc')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add new class</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            
          
              
              <div class="mx-3 my-3">
                <div class="mb-3">
                  <input class="form-control py-3" placeholder="Class Name" name="ten_lop"/>
                </div>
                <div class="mb-3">
                  <input class="form-control py-3" placeholder="Subject" name="thong_tin" />
                </div>
                <input type="file" name="file_upload">
                <!-- <div>
                  
                  <p>Choose background</p>
                  <div class="backgrounds">
                    <div class="background h-100 cursor-pointer">
                    <input class="img-cover rounded" type="image" src="svgs/8.jpg" alt="Background">
                      
                    </div>
                    <div class="background h-100 cursor-pointer">
                      <img
                        class="img-cover rounded"
                        src="https://cdn.dribbble.com/users/1338391/screenshots/15322399/media/4290a3ccff443d96fe1c8d990211254e.jpg?compress=1&resize=1600x1200"
                        alt="Background"
                      />
                    </div>
                    <div class="background h-100 cursor-pointer">
                      <img
                        class="img-cover rounded"
                        src="https://cdn.dribbble.com/users/1338391/screenshots/15333283/media/8b76dd5f6d7d18d37e4e3b74b33cd903.jpg?compress=1&resize=1600x1200"
                        alt="Background"
                      />
                    </div>
                    <div class="background h-100 cursor-pointer">
                      <img
                        class="img-cover rounded"
                        src="https://cdn.dribbble.com/users/1338391/screenshots/15318231/media/4c725fe4efbaa9d498f39f13600e396a.jpg?compress=1&resize=1600x1200"
                        alt="Background"
                      />
                    </div>
                  </div> 
                </div>
              </div>-->

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
                <button class="btn btn-primary">
                  Add
                </button>
              </div>
           
          </div>
        </div>
        </form>
      </div>
      
    </section>
<!-- Class cards -->


<section>

      <div class="container">
        <div class="row">
        @forelse($dsLop as $gv)

          <div class="col-md-4 col-lg-3 mb-5">
                <div class="d-flex flex-column h-100">
                    <img src="{{$gv->background}}" class="img-cover h-50" alt="Card background" />
                              <div class="class-card__body my-2">
                                          <div class="d-flex align-items-center justify-content-between mb-2">
                                              <h5 class="class-card__classname">{{$gv->ten_lop}}</h5>
                                          </div>

                                          <div class="d-flex align-items-center justify-content-between mb-2">
                                                <span class="class-card__role fs-5">Teacher:{{$user->username}}</span>
                                          </div>
                                          <p class="class-card__subjects truncate">
                                          {{$gv->thong_tin}}
                                          </p>
                                          <div class="class-card_code">
                                                <span>Code: </span><span>{{$gv->code}}</span>
                                          </div>
                                </div>
                                
                                <form action="{{route('people')}}">
                                  @csrf
                                <button class="btn btn-primary mt-auto py-2">Go to Class</button>
                                </form>
                                <div>
                                <form action="{{route('xoa_lop',['id'=>$gv->id])}}"method="POST">
                                @csrf
                                    <button class="d-inline-flex btn btn-danger">Remove class</button>
                                </form> 
                                <div class="dropdown">
                                <button class="btn btn-primary mt-auto py-2" data-toggle="dropdown">Sửa</button>
                                <form action="{{route('sua_lop',['id'=>$gv->id])}}"method="POST">
                                     @csrf
                                  <div class="dropdown-menu">
                                      <b >Tên lớp:</b><input  type="text" placeholder="Tên lớp" value="{{$gv->ten_lop}}" name="ten_lop">
                                      <b>Thông tin:</b><input type="text" placeholder="Thông tin" value=" {{$gv->thong_tin}}" name="thong_tin">
                                      <input type="file" name="backgroud">
                                      <div class="btn-group"> 
                                            <button class="btn btn-outline-primary btn-sm">Thay đổi</button>
                                      </div>
                                  </div>
                                </div>
                                </form> 
                                </div>
                                
                  </div>
            </div>
          @empty
        <tr>
    <td colspan="5">Không có dữ liệu</td>
</tr>
@endforelse
        </div>
      </div>
     
      
</section>
       
</body>

</html>
    
