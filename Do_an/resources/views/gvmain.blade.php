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

        <div>
        <a href="{{route('ds_tai_khoan_cn')}}" class="avatar me-5">
            <img src="{{$user->images}}" alt="Avatar"  />
        </a>
        </div>
       
     

        <form action="{{route('dang_xuat')}}">
          <button class="btn btn-danger py-2">Sign out</button>
        </form>
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
                <div class="mb-3">
                  <input class="form-control py-3" placeholder="Room" name="code"/>
                </div>
                <div>
                  <p>Choose background</p>
                  <div class="backgrounds">
                    <div class="background h-100 cursor-pointer">
                      <img
                        class="img-cover rounded"
                        src="svgs/8.jpg"
                        alt="Background"
                      />
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
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
                <button
               
                  class="btn btn-primary"
>
                  Add
                </button>
              </div>
           
          </div>
        </div>
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
                                <div>
                                  <a href="{{route('stream')}}">
                                    <button class="btn btn-primary mt-auto py-2">Go to Class</button>
                                    </a>
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
    