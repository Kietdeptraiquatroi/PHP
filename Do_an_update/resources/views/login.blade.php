<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>

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
    <div class="mt-5 col-10 col-md-7 col-lg-3 text-center mx-auto">
        <div class="board">
            <img src="svgs/logo.jpg" alt="Board" />
        </div>
        <h1 class="fs-2 mb-3">Sign In</h1>

        <form action="{{route('xl_dang_nhap')}}" method="POST">
            @csrf
            @if('thong_bao')
            <span stype="color: red">{{session('thong_bao')}}</span>
            @endif
            <div class="mb-3">
                <input type="text" class="form-control py-3" placeholder="Username" name="ten_dang_nhap" />
                @error('ten_dang_nhap')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control py-3" placeholder="Password" name="mat_khau" />
                @error('mat_khau')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
            </div>
            <a href="{{route('forgot')}}" class="d-block mb-3 text-primary">Forgot password?</a>
            <button type="submit" class="w-100 py-3 btn btn-primary" name ="dang_nhap">
          Sign In
            </button>
    </div>
</body>

</html>