<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="script.js"></script>
    <title>Document</title>
    <style>
        body {
          min-width: 1200px;
        }
      </style>
      <style>
        @media (max-width: 768px) {
          body {
            min-width: 1200px;
          }
        }
      </style>
</head>
<body>
    <?php
        include('./conect/ketnoi.php');
        session_start();
        ob_start();
    ?>
    <div class="continer">
        <div class="row">
            <img src="./img/a2.png">
        </div>

        <div class="row">
            <div class="col-md-9 col-12">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="./index.php">Trang chủ</a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <?php
                                include('./upload/menu_ngang.php');
                                if (isset($_SESSION["gio"]) && $_SESSION["gio"] != null) { 
                                    $count = count($_SESSION["gio"]);
                                } else {
                                    $count = 0;
                                }
                            ?>                       
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-md-3 col-12 text-center mt-2">
                <a href="index.php?content=viewgio" class="center">
                    <i class="bi bi-cart-check"></i>
                    <?php
                        if($count>0){
                        ?> <span style="color: red; font-weight: bold">Giỏ hàng có <?php echo $count;?> sản phẩm <br>
                        <?php
                        }else{
                            ?> <span style="color: red; font-weight: bold">Giỏ hàng có <?php echo $count;?> sản phẩm <br>
                            <?php
                        }
                    ?>
                </a>
                <?php
                    if(isset($_SESSION['idkh']) == null) {
                        echo "Bạn chưa đăng nhập";
                        echo "<a href="."index.php?content=login"."> [<strong> Đăng nhập </strong>]</a>"; 
                    }else{
                        echo "Chào mừng User <strong> ".$_SESSION['username']." </strong>";
                        echo "<a href="."index.php?content=logout"."> [<strong> Thoát </strong>]</a>"; 
                    }
                ?>
            </div>
        
        </div>
        
        <div class="row">
            <!-- <h1>Tìm kiếm</h1> -->
            <div class="col-md-3 col-sm-6 col-12">
                <img style="width: 150px; height: 50px;" src="./img/a.png">
            </div>
            <div class="col-md-6 col-sm-4 col-12">
                <form class="d-flex" role="search" action="index.php?content=timkiem" method="post">
                    <input class="form-control me-2" type="text" placeholder="Tìm kiếm trên Lazada" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit" name="timkiem" value="Tìm kiếm">Search</button>
                    <!-- <img style="width: 30px; height: 30px;" src="./img/giohang.png"> -->
                </form>

                <!-- <form action="index.php?content=timkiem" method="post">
                    <p style="text-align:center; background:#48dbfb; color:#F00; padding:7px; fontweight:bold; font-size:18px; margin-left: 0px;">Tìm kiếm</p>
                    <input type="text" name="search" style="height:20px; width:155px; marginleft: 20px; margin-top: 10px;"><br>
                    <input type="submit" name="timkiem" value="Tìm kiếm" style="width: 160px; height: 25px; margin-left: 20px; margin-top: 10px;">
                </form> -->
            </div>
        
        <div class="row">
            <!-- <h1>Danh Mục</h1> -->
            <div class="col-md-3 col-sm-6 col-12">
                <ul class="dmloai">
                    <?php
                        include('upload/dmloai.php');
                    ?>
                    
                </ul>
            </div>
            <div class="col-md-9 col-sm-6 col-12">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="./img/a3.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="./img/a4.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="./img/a5.png" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
              </div>
          </div>
          <div class="row mt-3 mp-3">
              
              <div class="col-md-4 col-sm-6 col-12">
                  <img src="./img/a9.png" alt="">
              </div>
              <div class="col-md-4 col-sm-6 col-12">
                  <img src="./img/a9.png" alt="">
              </div>
              <div class="col-md-4 col-sm-6 col-12">
                  <img src="./img/a9.png" alt="">
              </div>

          </div>
          <div class="row">
                    <?php
                        if(isset($_GET['action'])){
                            switch($_GET['action']){
                                case 'loai':{
                                    include('./upload/laysptheoloai.php');
                                    break;
                                }
                                case 'hangsx':{
                                    include('./upload/laysptheohang.php');
                                    break;
                                }
                                case 'chitiet':{
                                    include('./upload/chitietsp.php');
                                    break;
                                }
                                default:{
                                    break;
                                }
                            }
                        }else{
                            if(isset($_GET['content'])){
                                switch($_GET['content']){
                                    case 'add':{
                                        include('./admin/giohang/addvaogio.php');
                                        break;
                                    }
                                    case 'viewgio':{
                                        include('./admin/giohang/viewgio.php');
                                        break;
                                    }
                                    case 'thanhtoan':{
                                        include('./admin/giohang/thongtin_thanhToan.php');
                                        break;
                                    }
                                    case 'delete':{
                                        include('./admin/giohang/deletegio.php');
                                        break;
                                    }
                                    case 'update':{
                                        include('./admin/giohang/updategio.php');
                                        break;
                                    }
                                    case 'timkiem':{
                                        include('./upload/timsp.php');
                                        break;
                                    }
                                    case 'login':{
                                        include('./admin/login.php');
                                        break;
                                    }
                                    case 'logout':{
                                        include('./admin/logout.php');
                                        break;
                                    }
                                    case 'dathang':{
                                        include('./admin/giohang/dathang.php');
                                        break;
                                    }
                                    default:{
                                        break;
                                    }
                                }
                            }else{
                                include('./upload/layallsp.php');
                            }
                        }                       
                    ?>
            </div>
        </div>
        <div class="row">
          
        
        </div>
        
    </div>
    <?php
        ob_end_flush();
    ?>
</body>
</html>