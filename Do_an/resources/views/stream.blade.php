<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stream</title>

    <!-- Tab icon -->
    <link rel="icon" href="{{asset('./svgs/board.svg') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <img src="svgs/logo.svg" alt="Logo" />
        </a>
       
        <nav class="d-flex align-items-center gap-3">
        <a href="{{route('back_Main')}}"><i class="fa fa-home"></i></a>
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
        " style="background-image:url({{$ttLop->background}})">
     

      
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
                    <form action="{{route('them_thong_bao',['id'=>$ttLop->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bg-white px-3 py-4 rounded shadow">
                        <div class="d-flex align-items-center mb-3">
                            <img class="avatar me-3" src="{{$user->images}}" alt="Avatar" />
                            <div>Chia s??? v???i l???p h???c c???a b???n</div>
                        </div>
                        <textarea name="thong_bao" class="w-100 p-3 border mb-2" cols="30" rows="5" placeholder="Write something..."></textarea>
                        <div class="d-flex align-items-lg-center justify-content-between">
                            <input type="file" name="file_upload[]" multiple/>
                           <button class="btn btn-primary">T???i l??n</button>
                        </div>
                    </div>
                    </form>
               
                    @forelse($thongBao as $tt)
                    <ul class="mt-5">
                        <li class="bg-white px-3 py-4 rounded shadow">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mb-3">
                                    <img class="avatar me-3" src="{{$ttLop->chiTietTaiKhoanGiaoVien->images}}" alt="Avatar" />
                                    <div>
                                    <h3 class="fs-5">Teacher:{{$ttLop->chiTietTaiKhoanGiaoVien->username}} </h3>
                                    <i>{{$tt->created_at}}</i>
                                    </div>
                                </div>
                                <div >
                                <a href="{{route('xoa_thong_bao',['id'=>$tt->id])}}"class="btn btn-danger fa fa-trash" onclick="return confirm('B???n th???t s??? mu???n x??a th??ng b??o n??y?');"></a>
                                </div>
                            </div>
                            <p class="border-bottom pb-3">{{$tt->noi_dung}}</p>
                           
                            @foreach($upload_thong_bao as $ul)
                                    @if($ul->id_thong_bao==$tt->id)
                                    <div class="card " style="width:400px"style="height=250px" >
                                    <iframe src="https://drive.google.com/file/d/{{$ul->path}}/preview"  ></iframe>
                                    </div>
                                    @endif
                            @endforeach
                            <div class="fw-bold">B??nh lu???n:</div>
                            @forelse($binhLuan as $bl)
                            @if($bl->thong_bao_id==$tt->id)
                            <ul class="mt-2 border-bottom">
                                <li>
                                    <div class="
                        d-flex
                        align-items-center
                        justify-content-between
                        mb-3
                      ">
                    
                                        <div class="d-flex align-items-center">
                                            <img class="avatar me-3" src="{{$bl->chiTietTaiKhoanBL->images}}" alt="Avatar" />
                                            <div class="row">
                                            <h3 class="fs-6"><b> {{$bl->chiTietTaiKhoanBL->username}} </b> <i>{{$bl->chiTietTaiKhoanBL->created_at}}</i></h3>
                                            <p>{{$bl->noi_dung_binh_luan}}</p>
                                            </div>
                                        </div>
                                      
                                        <a href="{{route('xoa_binh_luan',['id'=>$bl->id])}}" class="btn btn-danger fa fa-trash" onclick="return confirm('B???n  mu???n x??a b??nh lu???n n??y?');"></a>
                                    </div>
                                   
                                </li>
                            </ul>
                            @endif
                                        @empty
                            <tr>
                                <td colspan="5">Kh??ng c?? b??nh lu???n n??o d??? li???u</td>
                            </tr>
                            @endforelse
                            <form class="d-flex align-items-center mt-4" action="{{route('them_binh_luan',['id'=>$tt->id])}}">
                                <img class="avatar me-3" src="{{$user->images}}" alt="Avatar" />
                                <input class="flex-grow-1 border me-2 p-2" placeholder="Write your comment..." name="noi_dung_binh_luan"/>
                                <button type="submit" class="btn btn-primary fa fa-send"> G???i</button>
                            </form>
                        </li>
                    </ul>
                    @empty

                 @endforelse
                </div>
            </div>
        </section>
      
    </main>
</body>

</html>