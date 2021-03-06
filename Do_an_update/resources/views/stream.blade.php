<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stream</title>

    <!-- Tab icon -->
    <link rel="icon" href="{{asset('./svgs/board.svg') }}">
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons')}}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    
</head>

<body>
    <!-- Header -->
    <header class="
        fixed-top
        header
        shadow
        d-flex
        align-content-center
        gap-5
        px-4
        py-3
        bg-white
      ">
        <a href="#" class="logo mr-3">
            <img src="'svgs/logo.svg" alt="Logo" />
        </a>
       
        <nav class="d-flex align-items-center gap-3">
        <a href="{{route('back_Main')}}"><i class="material-icons">home</i></a>
            <a class="d-flex align-items-center text-secondary" href="#">Stream</a>
            <a class="d-flex align-items-center text-secondary" href="#">Classwork</a
        >
        <a class="d-flex align-items-center text-secondary" href="{{route('people',['id'=>$ttLop->id])}}">People</a>
        </nav>
    </header>

    <main class="container">
        <!-- Banner -->
        
        <section class="
          d-flex
          flex-column
          gap-2
          space-header
          banner
          text-white
          bg-secondary
          px-3
          py-4
          rounded
        ">
     
    <section>
            <h1 class="banner__class">{{$ttLop->ten_lop}}</h1>
            <div class="fs-4">
                <span>Teacher: </span
          ><span class="banner__teacher">{{$user->username}}</span>
            </div>
            <div class="fs-4">
                <span>Subject: </span
          ><span class="banner__subject">{{$ttLop->thong_tin}}</span>
            </div>
            <div class="fs-4">
                <span>Room: </span><span class="banner__room">{{$ttLop->code}}</span>
            </div>
        </section>
        

        <!-- Content -->
        <section class="container mt-5">
            <div class="row">
                <div class="col col-lg-3 d-none d-lg-block">
                    <div class="border pt-4 px-4 pb-5">
                        <div class="mb-4">Tuy???t V???i</div>
                        <p class="mb-5">Kh??ng C?? B??i T???p N??o S???p ?????n H???n!</p>
                        <a href="#" class="d-block text-success text-end">Xem T???t C???</a>
                    </div>
                </div>

                <div class="col col-lg-9">
                    <div class="bg-white px-3 py-4 rounded shadow">
                        <div class="d-flex align-items-center mb-3">
                            <img class="avatar me-3" src="svgs/6.jpg" alt="Avatar" />
                            <div>Chia s??? v???i l???p h???c c???a b???n</div>
                        </div>
                        <textarea class="w-100 p-3 border mb-2" cols="30" rows="5" placeholder="Write something..."></textarea>
                        <div class="d-flex align-items-lg-center justify-content-between">
                            <input type="file" />
                            <div class="btn btn-primary">T???i L??n</div>
                        </div>
                    </div>

                    <ul class="mt-5">
                        <li class="bg-white px-3 py-4 rounded shadow">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mb-3">
                                    <img class="avatar me-3" src="svgs/13.png" alt="Avatar" />
                                    <h3 class="fs-5">Teacher: Nguy???n V??n Tr?????ng</h3>
                                </div>
                                <div class="btn btn-dark text-white">&#x2716;</div>
                            </div>

                            <p class="border-bottom pb-3">Hi all my students!!</p>

                            <div class="fw-bold">Comment:</div>

                            <ul class="mt-2 border-bottom">
                                <li>
                                    <div class="
                        d-flex
                        align-items-center
                        justify-content-between
                        mb-3
                      ">
                                        <div class="d-flex align-items-center">
                                            <img class="avatar me-3" src="svgs/4.jpg" alt="Avatar" />
                                            <h3 class="fs-6">Student</h3>
                                        </div>
                                        <div class="btn btn-dark text-white">&#x2716;</div>
                                    </div>
                                    <p>Hi there!</p>
                                </li>
                            </ul>

                            <form class="d-flex align-items-center mt-4">
                                <img class="avatar me-3" src="svgs/14.jpg" alt="Avatar" />
                                <input class="flex-grow-1 border me-2 p-2" placeholder="Write your comment..." />
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
      
    </main>
</body>

</html>