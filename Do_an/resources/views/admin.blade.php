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
        header
        fixed-top
        shadow
        d-flex
        justify-content-between
        px-4
        py-3
        bg-white
      ">
        <a href="#" class="logo mr-3">
            <img src="svgs/logo.svg" alt="Logo" />
        </a>

        <div class="fs-5 flex-center">Admin</div>
        <form action="{{route('dang_xuat')}}">
        <button class="btn btn-danger">Log out</button>
        </form>
    </header>

    <!-- Admin -->
    <section class="container border py-4 space-header bg-white">
        <div>
            <h2 class="text-success border-bottom pb-3 mb-4">Admin</h2>

            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar me-3">
                        <img src="svgs/2.jpg" alt="Avatar" />
                    </div>
                    <span class="fs-5">Uchiha Sasuren</span>
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
                        <span class="fs-5">{{$gv->ho_ten}}</span>
                    </div>
                 
                    <div>
                        <form action="{{route('xoa_tai_khoan',['id'=>$gv->id])}}"method="POST">
                        
                    @csrf
                        <button class="d-inline-flex btn btn-primary">Remove to Teacher</button>
                    </form>   
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
                    <form action="{{route('xoa_tai_khoan',['id'=>$hv->id])}}"method="POST"> 
                        @csrf
                            <button class="d-inline-flex btn btn-primary">Remove to student</button>
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
</body>

</html>