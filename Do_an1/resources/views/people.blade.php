<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>People</title>

        <!-- Tab icon -->
        <link rel="icon" href="./svgs/board.svg" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
            align-content-center
            gap-5
            px-4
            py-3
            bg-white
        ">
            <a href="#" class="logo mr-3">
                <img src="svgs/logo.svg" alt="Logo" />
            </a>
        

            <nav class="d-flex align-items-center gap-3">
            <a href="{{route('back_Main')}}"><i class="material-icons">home</i></a>
            
            <a class="d-flex align-items-center text-secondary" href="{{route('tt_stream')}}">Stream</a>
                
            <a class="d-flex align-items-center text-secondary" href="#">Classwork</a>
            
            <a class="d-flex align-items-center text-secondary" href="#">People</a>
            
            </nav>
            
        
        </header>
        
        <!-- Teacher -->
        <section class="container border py-4 bg-white space-header">
            <div>
                <h2 class="text-success border-bottom pb-3 mb-4">Admin</h2>

                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="avatar me-3">
                            <img src="{{$user->images}}" alt="Avatar" />
                        </div>
                        <span class="fs-5">{{$user->ho_ten}}</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Requests -->
        <section class="container mt-4 border py-4 bg-white">
            <div>
                <h2 class="text-success border-bottom pb-3 mb-4">Request</h2>
            </div>

            <form class="d-flex gap-2 mb-4 border-bottom pb-3">
                <div class="flex-grow-1">
                    <input type="email" class="form-control py-2" placeholder="Add Student by Email" />
                </div>
                <button type="submit" class="btn btn-primary">Find</button>
            </form>

            <ul class="d-flex flex-column gap-4">
                <li class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="avatar me-3">
                            <img src="svgs/7.jpg" alt="Avatar" />
                        
                        </div>
                        <span class="fs-5">Nguy???n Tr???n Linh ??an</span>
                    </div>

                    <div>
                        <div class="d-inline-flex btn btn-primary me-2">Accept Request</div>
                        <div class="d-inline-flex btn btn-primary">Decline Request</div>
                    </div>
                </li>
                <li class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="avatar me-3">
                            <img src="svgs/6.jpg" alt="Avatar" />
                        </div>
                        <span class="fs-5">Nguy???n Tr???n Linh Chi</span>
                    </div>

                    <div>
                        <div class="d-inline-flex btn btn-primary me-2">Accept Request</div>
                        <div class="d-inline-flex btn btn-primary">Decline Request</div>
                    </div>
                </li>
            </ul>
        </section>
    </body>

</html>