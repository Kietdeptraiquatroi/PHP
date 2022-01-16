<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>

    <!-- Tab icon -->
    <link rel="icon" href="./svgs/board.svg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <div class="mt-5 col-10 col-md-7 col-lg-3 text-center mx-auto">
        <div class="board">
            <img src="svgs/logo.jpg" alt="Board" />
        </div>
        <h1 class="fs-2 mb-3">Thay đổi mật khẩu</h1>


        <form action="{{route('xl_forgot')}}" method="POST" >
            @csrf
            @if('thong_bao')
            <div class="alert alert-success">
            {{session('thanh_cong')}}
            </div>
            @elseif('loi')
            <div class="alert alert-danger">
            {{session('loi')}}
            </div>
            @endif
            <div class="mb-3">
                <input type="email" class="form-control py-3" placeholder="Nhập email" name="mail" />
                <!-- @error('ten_dang_nhap')
                    <span style="color: red">{{ $message }}</span>
                @enderror -->
            </div>
            <button type="submit" class="w-100 py-3 btn btn-primary">
          Lấy lại mật khẩu
            </button>
        </form>
        <a href="{{route('dang_nhap')}}">Trở về đăng nhập</a>
        
    </div>
</body>

</html>