<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>

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
       
        <p class="fs-2">Vui lòng nhập lại mật khẩu mới :)</p>

        <form form method="POST" action="{{route('update_pass')}}">
        @csrf
        @php
        $token=$_GET['token'];
        $email=$_GET['email'];
        @endphp
            <div class="mb-3">
                <input type="hidden" name="email" value="{{$email}}">
                <input type="hidden" name="token" value="{{$token}}">
                <input type="password" class="form-control py-3" placeholder="Password" name="password" />
                @error('password')
                    <span style="color: red" >{{ $message }}</span>
                    @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control py-3" placeholder="Confirm password" name="confirmpassword" />
                @error('confirmpassword')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
            </div>
            <button type="submit" class="w-100 btn py-3 btn-primary">
          Xác nhận mật khẩu
        </button>
        </form>
    </div>
</body>

</html>