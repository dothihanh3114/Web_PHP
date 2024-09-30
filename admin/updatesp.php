<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>From nhập sản phẩm</title>
    </head>
    <body>
        <?php
            include('../conect/ketnoi.php');
        ?>
        <form method="post" enctype="multipart/form-data" action="./index.php?admin=update">
            <div class="form-group">
                <?php
                    if(isset($_GET['admin'])=='updatesp'){
                        $masp = $_GET['id'];
                        $sp = "SELECT * FROM sanpham where idsp = '$masp'";
                        $kq = mysqli_query($con, $sp);
                        if(mysqli_num_rows($kq)>0){
                            while($rows = mysqli_fetch_array($kq)){
                
                ?>
                <input type="hidden" name="masp" value="<?php echo $masp; ?>">
                <input type="hidden" name="hinh_old" value="<?php echo $rows['hddsp']; ?>">
                <label for="txt_tensp">Tên sản phẩm</label>
                <input type="text" class="form-control" id="txt_tensp" name="txt_tensp" value="<?php echo $rows['tensp'] ?>" placeholder="Nhập tên sản phẩm">
            </div> 
            <div class="form-group">
                <div class="file-loading">
                    <label>Hình đại diện</label>
                    <input type="file" name="sp_hinh"  class="form-control" id="sp_hinh" value="<?php echo $rows['hddsp']?>"/>
                </div>
            </div>   
            <div class="form-group">
                <label for="loaisp">Loại sản phẩm</label>
                <select name="loaisp" class="form-group">
                    <?php
                        $sql = "select * from loaisp";
                        $loaisp = mysqli_query($con, $sql);
                        if(mysqli_num_rows($loaisp)>0){
                            while($row = mysqli_fetch_array($loaisp)){
                                echo "<option value=".$row['idloaisp'].">".$row['tenloaisp']."</option>";
                            }
                        }else{
                            echo "Đang cập nhật dữ liệu";
                        }

                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="hangsx">Hãng sản xuất</label>
                <select name="hangsx" class="form-group">
                    <?php
                        $sql = "select * from hangsx";
                        $hangsx = mysqli_query($con, $sql);
                        if(mysqli_num_rows($hangsx)>0){
                            while($row = mysqli_fetch_array($hangsx)){
                                echo "<option value=".$row['idhang'].">".$row['tenhang']."</option>";
                            }
                        }else{
                            echo "Đang cập nhật dữ liệu";
                        }

                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nhaccsp">Nhà cung cấp sản phẩm</label>
                <select name="nhaccsp" class="form-group">
                    <?php
                       $sql = "select * from nhacungcap";
                        $nhaccsp = mysqli_query($con, $sql);
                        if(mysqli_num_rows($nhaccsp)>0){
                            while($row = mysqli_fetch_array($nhaccsp)){
                                echo "<option value=".$row['idncc'].">".$row['tenncc']."</option>";
                            }
                        }else{
                            echo "Đang cập nhật dữ liệu";
                        }

                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="txt_chitiet">Nhập mô tả sản phẩm</label>
                <input type="text" class="form-control" id="txt_chitiet" name="txt_chitiet" value="<?php echo $rows['motasp']; ?>" placeholder="Nhập mô tả sản phẩm">
            </div>
                <?php
                        }
                        }
                        }else{
                            echo "Đang cập nhật dữ liệu";
                        }
                    
                ?>                          
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </body>
</html>

<!-- require('xulynhapsp.php'); -->





