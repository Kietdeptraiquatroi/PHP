<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
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
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: right;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

/* Style the close button */
.topright {
  float: right;
  cursor: pointer;
  font-size: 28px;
}

.topright:hover {color: red;}
</style>
</head>
<body>
    <!-- Header -->
    <header class="
       
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
            <input class="form-control py-2" placeholder="Search for class" />
          <button class="btn btn-primary py-2">T??m ki???m</button>
          <form action="{{route('dang_ky')}}">
              <button class="btn btn-primary py-2">????ng k??</button>
          </form>
                 

       
      </div>
    </header> 
    <!-- Admin -->
    
   
    <body>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Admin')" id="defaultOpen">Admin</button>
  <button class="tablinks" onclick="openCity(event, 'GiaoVien')">Gi??o vi??n</button>
  <button class="tablinks" onclick="openCity(event, 'HocVien')">H???c vi??n</button>
  <button class="tablinks" onclick="openCity(event, 'Lop')">L???p</button>

</div>
<!-- Danh s??ch Admin -->
<div id="Admin" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
          <div>
            <h2 class="text-success border-bottom pb-3 mb-4">{{$user->username}}</h2>

                        <div class="d-flex align-items-right justify-content-between">
                        
                                         
                                              <div class="container">
                                                    
                                                                    <table class="table">
                                                                      <thead>
                                                                        <tr>
                                                                          <th>Avartar</th>
                                                                          <th>T??n ????ng nh???p</th>
                                                                          <th>H??? t??n</th>
                                                                          <th>Email</th>
                                                                          <th>Ng??y t???o</th>
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                        <tr>
                                                                          <td>
                                                                            <div class="avatar me-3" data-toggle="dropdown">
                                                                                                      <img src="{{$user->images}}" alt="Avatar" />
                                                                            </div>
                                                                          </td>
                                                                          <td>{{$user->username}}</td>
                                                                          <td>{{$user->ho_ten}}</td>
                                                                          <td>{{$user->email}}</td>
                                                                          <td>{{$user->created_at}}</td>
                                                                          <td>
                                                                            <form action="{{route('cn_tai_khoan',['id'=>$user->id])}}">
                                                                              <button class="btn btn-primary btn-sm fa fa-edit "> Thay ?????i</button>
                                                                            </form>
                                                                        </td>
                                                                          <td><form action="{{route('dang_xuat')}}">
                                                                                <button class="btn btn-outline-danger btn-sm fa fa-sign-out"> ????ng xu???t</button>
                                                                              </form>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                      </tbody>
                                                                  </table>
                                              </div>       
                                        </div>
                        <div class="container">
                        <form action="{{route('gui_thong_bao')}}" method="POST">
                                <div class="form-group">
                                        @csrf
                                          @if('thong_bao')
                                                    <div class="alert alert-denger">
                                                    {{session('thong_bao')}}
                                                    </div>
                                          @endif
                                            <h2>G???i th??ng b??o ?????n ng?????i d??ng</h2>
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                    <label >N???i dung th??ng b??o:</label>
                                    <textarea class="w-100 p-3 border mb-2" name="noi_dung" cols="30" rows="5" placeholder="N???i dung..."></textarea>
                                    <button class="btn btn-primary  fa fa-send"> G???i</button>
                                </div>
                                </form>
                        </div>
                        
          </div>
</div>
<!-- Danh s??ch gi??o vi??n ch??a x??a -->
<div id="GiaoVien" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <div>
            <h2 class="text-success border-bottom pb-3 mb-4">Gi??o vi??n</h2>
          
                <div class="container">
                         
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Avartar</th>
                        <th>T??n ????ng nh???p</th>
                        <th>H??? t??n</th>
                        <th>Email</th>
                        <th>Ng??y l???p</th>
                        <th>Ng??y c???p nh???t g???n nh???t</th>

                      </tr>
                    </thead>
                      @forelse($dsTaiKhoanGV as $gv)
                    <tbody>
                      <tr>
                        <td>
                        <div class="avatar me-3">
                          <img src="{{$gv->images}}" alt="Avatar" />
                        </div>
                        </td>
                        <td>{{$gv->username}}</td>
                        <td>{{$gv->ho_ten}}</td>
                        <td>{{$gv->email}}</td>
                        <td>{{$gv->created_at}} </td>
                        <td>{{$gv->updated_at}}</td>
                        <td>
                          <a href="{{route('cn_tai_khoan',['id'=>$gv->id])}}"class="btn btn-primary fa fa-edit">Thay ?????i</a>
                        </td>

                        <td>
                        <a href="{{route('xoa_tai_khoan',['id'=>$gv->id])}};" onclick="return confirm('B???n Th???t s??? mu???n x??a?');"class="btn btn-xs btn-danger fa fa-trash"> X??a</a>
                        </td>
                        
                      </tr>
                     
                    </tbody>
                    @empty
                  <tr>
                      <td colspan="5">Kh??ng c?? gi??o vi??n n??o</td>
                  </tr>
                 @endforelse
               
                  </table>
                </div>
               
      </div>
      <!-- Danh s??ch t??i kho???n gi??o vi??n ???? x??a -->
      <div>
            <h2 class="text-success border-bottom pb-3 mb-4">Gi??o vi??n ???? x??a </h2>
          
                <div class="container">
                         
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Avartar</th>
                        <th>T??n ????ng nh???p</th>
                        <th>H??? t??n</th>
                        <th>Email</th>
                        <th>Ng??y l???p</th>
                        <th>Ng??y c???p nh???t g???n nh???t</th>

                      </tr>
                    </thead>
                      @forelse($dsGVXoa as $gv)
                    <tbody>
                      <tr>
                        <td>
                        <div class="avatar me-3">
                          <img src="{{$gv->images}}" alt="Avatar" />
                        </div>
                        </td>
                        <td>{{$gv->username}}</td>
                        <td>{{$gv->ho_ten}}</td>
                        <td>{{$gv->email}}</td>
                        <td>{{$gv->created_at}} </td>
                        <td>{{$gv->updated_at}}</td>
                        <td>
                        <div class="btn-group">
                        <a href="{{route('khoi_phuc_tai_khoan',['id'=>$gv->id])}};" onclick="return confirm('B???n mu???n kh??i ph???c c?? t??i kho???n n??y?');"class=" btn btn-success fa fa-history"> Kh??i ph???c</a>
                        <a href="{{route('xoa_vinh_vien_tai_khoan',['id'=>$gv->id])}};" onclick="return confirm('B???n mu???n b???n c?? mu???n x??a v??nh vi???n n??y?');"class="btn btn-danger fa fa-trash-o"> X??a v??nh vi???n</a>
                        </div>
                        </td>
                      </tr>
                     
                    </tbody>
                    @empty
                  <tr>
                      <td colspan="5">Kh??ng c?? gi??o vi??n n??o</td>
                  </tr>
                 @endforelse
               
                  </table>
                </div>
               
      </div>
</div>
<!-- Danh s??ch sinh vi??n ch??a x??a -->
<div id="HocVien" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <div>
            <h2 class="text-success border-bottom pb-3 mb-4">H???c vi??n</h2>

           
            <div class="container">         
              <table class="table">
                <thead>
                  <tr>
                        <th>Avartar</th>
                        <th>T??n ????ng nh???p</th>
                        <th>H??? t??n</th>
                        <th>Email</th>
                        <th>Ng??y l???p</th>
                        <th>Ng??y c???p nh???t g???n nh???t</th>
                  </tr>
                </thead>
                @forelse($dsTaiKhoanSV as $hv)
                <tbody>
                  <tr>
                    <td>
                      <div class="avatar me-3">
                          <img src="{{$hv->images}}" alt="Avatar" />
                      </div>
                    </td>
                    <td>{{$hv->ho_ten}}</td>
                    <td>{{$hv->ho_ten}} </td>
                    <td>{{$hv->email}}</td>
                    <td>{{$hv->created_at}}</td>
                    <td>{{$hv->updated_at}}</td>
                    <td>
                          <a href="{{route('cn_tai_khoan',['id'=>$hv->id])}}"class="btn btn-primary fa fa-edit"> Thay ?????i</a>
                        </td>
                    <td>
                    <a href="{{route('xoa_tai_khoan',['id'=>$hv->id])}};" onclick="return confirm('B???n Th???t s??? mu???n x??a?');"class="btn btn-danger fa fa-trash"> X??a</a>
                                                
                    </td>
                   

                  
                  </tr>
                  
                </tbody>
                @empty
              <tr>
                  <td colspan="5">Kh??ng c?? h???c vi??n n??o</td>
              </tr>
              @endforelse
              </table>
            </div>   
      </div>
      <!-- Danh s??ch t??i kho???n sinh vi??n ???? x??a -->
      <div>
            <h2 class="text-success border-bottom pb-3 mb-4">H???c vi??n ???? x??a</h2>

           
            <div class="container">         
              <table class="table">
                <thead>
                  <tr>
                        <th>Avartar</th>
                        <th>T??n ????ng nh???p</th>
                        <th>H??? t??n</th>
                        <th>Email</th>
                        <th>Ng??y l???p</th>
                        <th>Ng??y c???p nh???t g???n nh???t</th>
                  </tr>
                </thead>
                @forelse($dsHVXoa as $hv)
                <tbody>
                  <tr>
                    <td>
                      <div class="avatar me-3">
                          <img src="{{$hv->images}}" alt="Avatar" />
                      </div>
                    </td>
                    <td>{{$hv->ho_ten}}</td>
                    <td>{{$hv->ho_ten}} </td>
                    <td>{{$hv->email}}</td>
                    <td>{{$hv->created_at}}</td>
                    <td>{{$hv->updated_at}}</td>
                    <td>
                    <div class="btn-group">
                    <a href="{{route('khoi_phuc_tai_khoan',['id'=>$hv->id])}};" onclick="return confirm('B???n mu???n kh??i ph???c c?? t??i kho???n n??y?');"class="btn btn-xs btn-btn-success btn-success fa fa-history">Kh??i ph???c</a>
                    <a href="{{route('xoa_vinh_vien_tai_khoan',['id'=>$hv->id])}};" onclick="return confirm('B???n mu???n b???n c?? mu???n x??a v??nh vi???n n??y?');"class="btn btn-xs btn-btn-danger btn-danger fa fa-trash-o">x??a v??nh vi???n</a>
                    </div>
                                                
                    </td>
                   

                  
                  </tr>
                  
                </tbody>
                @empty
              <tr>
                  <td colspan="5">Kh??ng c?? h???c vi??n n??o</td>
              </tr>
              @endforelse
              </table>
            </div>   
      </div>
</div>

<!-- Danh s??ch l???p ch??a x??a -->
<div id="Lop" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
 
            <h2 class="text-success border-bottom pb-3 mb-4">L???p ??ang ho???t ?????ng</h2>
            <body>
          <div class="container">
            <table class="table">
              <thead>
                <tr>
                  <th>T??n l???p</th>
                 
                  <th>Th??ng tin</th>
                  <th>Code</th>
                  <!-- <th>Gi??o vi??n</th> -->
                <th>Ng??y t???o l???p</th>
                </tr>
              </thead>
              @forelse($dsLop as $lop)
              <tbody>
                <tr>
                 
                  <td>{{$lop->ten_lop}}</td>
                
                  <td>{{$lop->thong_tin}}</td>
                  <td>{{$lop->code}}</td>
                  <!-- <td>
                 
                 </td> -->
                  <td>{{$lop->created_at}}</td>
                  <td>
                  <div class="btn-group">
                  <form action="{{route('tt_stream_hv',['id'=>$lop->id])}}">
                        <button class="btn btn-primary mt-auto py-2 fa fa-external-link"> V??o l???p</button>
                        </form>
                  <a href="{{route('xoa_lop',['id'=>$lop->id])}};" onclick="return confirm('B???n th???t s??? mu???n ng???ng ho???t ?????ng l???p n??y?');"class="btn btn-xs btn-danger btn-delete fa fa-stop">Ng???ng ho???t ?????ng</a>
                  
                </div>
                </td>
                 
                  
                </tr>
                @empty
                <tr>
                    <td colspan="5">Kh??ng c?? l???p n??o</td>
                </tr>
                @endforelse
                      </div >
          </div>
              </tbody>
            </table>
          </div>
        
          <!-- Danh s??ch l???p ???? x??a -->
          <h2 class="text-success border-bottom pb-3 mb-4">L???p ng???ng ho???t ?????ng</h2>
          <div class="container">
            <table class="table">
              <thead>
                <tr>
                  <th>T??n l???p</th>
               
                  <th>Th??ng tin</th>
                  <th>Code</th>
                  <!-- <th>Gi??o vi??n</th> -->
                <th>Ng??y t???o l???p</th>
                </tr>
              </thead>
              @forelse($dsLopXoa as $lop)
              <tbody>
                <tr>
                  <td>{{$lop->ten_lop}}</td>
               
                  <td>{{$lop->thong_tin}}</td>
                  <td>{{$lop->code}}</td>
                  <!-- <td>
                  {{$lop->username}}
                  </td>  -->
                  <td>{{$lop->created_at}}</td>
                  <td>
                  <div class="btn-group">
                    <a href="{{route('khoi_phuc_lop',['id'=>$lop->id])}};" onclick="return confirm('B???n mu???n kh??i ph???c  l???p n??y?');"class="btn btn-xs btn-success fa fa-history "> kh??i ph???c</a>
                    <a href="{{route('xoa_vinh_vien_lop',['id'=>$lop->id])}};" onclick="return confirm('B???n mu???n x??a v??nh vi???n l???p n??y?');"class="btn btn-xs btn-danger fa fa-trash-o">X??a v??nh vi???n </a>
                  </div>
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Kh??ng c?? l???p n??o</td>
                </tr>
                @endforelse
                      </div >
          </div>
              </tbody>
            </table>
          </div>

</body>

</div>
<script>

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

</script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html>