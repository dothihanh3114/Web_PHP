<?php
    //session_start();
    if((isset($_SESSION['username'])!=null) && ($_SESSION['phanquyen'])!=0)
    {
        header('location:login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Trang quản trị</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <img src="../img/banner.jpg" style="height: 250px;">
        </div>
        <div class="row" style="background-color: aquamarine; height: 50px;">
        </div>
        <div class="row">
            <div class="col-3" style="background-color: pink;">
                <ul class="menu-left">
                    <li><a href="./index.php?admin=loai">Danh mục loại</a></li>
                    <li><a href="./index.php?admin=hang">Danh mục hãng</a></li>
                    <li><a href="#">Danh mục nhà cung cấp</a></li>
                    <li><a href="./index.php?admin=donhang">Quản lí đơn hàng</a></li>
                    <li><a href="./index.php?admin=sanpham">Danh mục sản phẩm</a></li>
                    <li><a href="./index.php?admin=gia">Đơn giá</a></li>
                </ul>
            </div>
            <div class="col-9">
                <?php
                    // if(isset($_GET['loai'])){
                    //     include('./getLoai.php');
                    // }
                    // if(isset($_GET['nhaploai'])){
                    //     include('./frmNhapLoai.php');
                    // }
                    if(isset($_GET['sanpham'])){
                        include('./addsanpham.php');
                    }
                    include('../conect/ketnoi.php');
                    if(isset($_GET['admin'])){
                        switch($_GET['admin']){
                            case 'sanpham':{
                                include('./danhmucsp.php');
                                break;
                            }
                            case 'addsanpham':{
                                include('./addsanpham.php');
                                break;
                            }
                            case 'insertsp':{
                                include('./insertsp.php');
                                break;
                            }
                            case 'updatesp':{
                                include('./updatesp.php');
                                break;
                            }
                            case 'update':{
                                include('./insertsp.php');
                                break;
                            }
                            case 'delete':{
                                include('./insertsp.php');
                                break;
                            }
                            case 'donhang':{
                                include('./ql_donhang.php');
                                break;
                            }
                            case 'xulyhd':{
                                include('./xulydonhang.php');
                                break;
                            }
                            case 'chitiethoadon':{
                                include('./ql_ctdonhang.php');
                                break;
                            }
                            case 'gia':{
                                include('./danhmucgia.php');
                                break;
                            }
                            case 'addgia':{
                                include('./addgia.php');
                                break;
                            }
                            case 'hang':{
                                include('./danhmuchang.php');
                                break;
                            }
                            case 'addhang':{
                                include('./addhang.php');
                                break;
                            }
                            case 'loai':{
                                include('./getLoai.php');
                                break;
                            }
                            case 'nhaploai':{
                                include('./frmNhapLoai.php');
                                break;
                            }
                            default:{
                                break;
                            }
                        }
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <p style="text-align: center; background-color: blue;">CNTT2</p>
        </div>
    </div>
</body>
</html>