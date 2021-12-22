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

        <form action="{{route('ds_tai_khoan_cn')}}">
          <button class="btn btn-primary py-2">Information</button>
        </form>

        <form action="{{route('dang_xuat')}}">
          <button class="btn btn-danger py-2">Sign out</button>
        </form>
      </div>
    </header> 
    <!-- Show when user is student -->
    <section class="px-4 space-header mb-4">
      <button
        type="button"
        class="btn btn-dark"
        data-bs-toggle="modal"
        data-bs-target="#modal-student"
      >
        Find class
      </button>

      <div
        class="modal fade"
        id="modal-student"
        tabindex="-1"
        style="display: none"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Class Code</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>

            <form class="">
              <div class="mx-3 my-3">
                <input class="form-control py-3" placeholder="Class code" />
              </div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary py-2"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
                <button
                  type="button"
                  class="btn btn-primary py-2"
                  data-bs-dismiss="modal"
                >
                  Find
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
   <!-- Class cards -->
   <section>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-lg-3 mb-5">
            <div class="d-flex flex-column h-100">
              <img
                src="svgs/8.jpg"
                class="img-cover h-50"
                alt="Card background"
              />
              <div class="class-card__body my-2">
                <div
                  class="d-flex align-items-center justify-content-between mb-2">
                  <h5 class="class-card__classname">Anh Văn A1(Căn Bản)</h5>
                </div>

                <div
                  class="d-flex align-items-center justify-content-between mb-2"
                >
                  <span class="class-card__role fs-5">Teacher: Lê Anh Kiệt</span>
                </div>
                    <p class="class-card__subjects truncate"> Khóa Học Anh Văn A1 Căn Bản Cho Người Mất Gốc
                    </p>
              <div class="class-card_code">
                  <span>Code: </span><span>0306191239</span>
              </div>
        </div>
        <button class="btn btn-primary mt-auto py-2">Go to Class</button>
        </div>
        </div>



        <div class="col-md-4 col-lg-3 mb-5">
            <div class="d-flex flex-column h-100">
                <img src="svgs/9.jpg" class="img-cover h-50" alt="Card background" />
                <div class="class-card__body my-2">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h5 class="class-card__classname">Anh Văn A2(Căn Bản)</h5>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="class-card__role fs-5">Teacher: Nguyễn Văn Trường</span>
                    </div>
                    <p class="class-card__subjects truncate">
                        Khóa Học Anh Văn A2 Căn Bản Cho Người Mất Gốc
                    </p>

                    <div class="class-card_code">
                        <span>Code: </span><span>0306191289</span>
                    </div>
                </div>
                <button class="btn btn-primary mt-auto py-2">Go to Class</button>
            </div>
        </div>


        <div class="col-md-4 col-lg-3 mb-5">
            <div class="d-flex flex-column h-100">
                <img src="svgs/10.jpg" class="img-cover h-50" alt="Card background" />
                <div class="class-card__body my-2">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h5 class="class-card__classname">Anh Văn A3(Căn Bản)</h5>

                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="class-card__role fs-5">Teacher: Nguyễn Văn Trường</span>
                    </div>

                    <p class="class-card__subjects truncate">
                        Khóa Học Anh Văn A3 Căn Bản Cho Người Mất Gốc
                    </p>

                    <div class="class-card_code">
                        <span>Code: </span><span>0306191265</span>
                    </div>
                </div>
                <button class="btn btn-primary mt-auto py-2">Go to Class</button>
            </div>
        </div>


        <div class="col-md-4 col-lg-3 mb-5">
            <div class="d-flex flex-column h-100">
                <img src="svgs/11.jpg" class="img-cover h-50" alt="Card background" />
                <div class="class-card__body my-2">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h5 class="class-card__classname">Khóa Học Anh Văn Chuyên Ngành</h5>

                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="class-card__role fs-5">Teacher: Lê Anh Kiệt</span>
                    </div>
                    <p class="class-card__subjects truncate">
                        Luyện Thi Anh Văn Chuyên Ngành
                    </p>
                    <div class="class-card_code">
                        <span>Code: </span><span>0306893965</span>
                    </div>
                </div>
                <button class="btn btn-primary mt-auto py-2">Go to Class</button>
            </div>
        </div>

        
   
        </div>
        </section>
</body>

</html>
    