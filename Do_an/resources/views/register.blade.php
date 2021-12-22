<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>

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
            <img src="svgs/1.jpg" alt="Board" />
        </div>
        <h1 class="fs-2">Sign Up</h1>
        <p class="fs-2">Please fill your information</p>

        <form form method="POST" action="{{route('xl_them_tk')}}">
        @csrf
            <div class="mb-3">
                <input type="text" class="form-control py-3" placeholder="Username" name="username" />
                @error('username')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control py-3" placeholder="Password" name="password" />
                @error('password')
                    <span style="color: red" >{{ $message }}</span>
                    @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control py-3" placeholder="confirm_password" name="confirm_password" />
                @error('confirm_password')
                    <span style="color: red" >{{ $message }}</span>
                    @enderror
            </div>
            <div class="mb-3">
                <input class="form-control py-3" placeholder="Full name" name="ho_ten" />
                @error('ho_ten')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
            </div>
            <div class="mb-3">
                <input type="email" class="form-control py-3" placeholder="Email" name="email" />
                @error('email')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
            </div>
            <div class="mb-3">
                <input class="form-control py-3" placeholder="Phone (8 numbers)" name="phone" />
                @error('phone')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
            </div>
            <div class="mb-3">
            <select class="form-control py-3" name="loai_tk" >
                <option>Giáo viên</option>
                <option>Học viên</option>
            </select>
            </div>
            <button type="submit" class="w-100 btn py-3 btn-primary">
          Đăng ký
        </button>
        </form>
        <a href="{{route('dang_nhap')}}">Thoát</a>
    </div>
</body>

</html>