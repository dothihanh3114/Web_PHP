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
        <form method="post" enctype="multipart/form-data" action="">
            <div style="width: 700px; height: auto; align-items: center;" align="center">
                <table width="500"  align="center">
                    <tr height="30" style="font-weight:bold">
                        <td colspan="4" align="center">NHẬP MỚI GIÁ</td>
                    </tr>
                    <tr>
                        <td>Mã sản phẩm</td>
                        <td><input type="text" id="txt_idsp" name="txt_idsp" style="width:250px;" placeholder="Nhập mã sản phẩm" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td>Đơn giá nhập</td>
                        <td><input type="text" id="txt_dgnhap" name="txt_dgnhap" style="width:250px;" placeholder="Nhập đơn giá nhập" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td>Đơn giá bán</td>
                        <td><input type="text" id="txt_dgban" name="txt_dgban" style="width:250px;" placeholder="Nhập đơn giá bán" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td>Ngày</td>
                        <td><input type="datetime-local" id="txt_ngay" name="txt_ngay" style="width:250px;" placeholder="Nhập ngày" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td>Chọn</td>
                        <td><input type="text" id="txt_chon" name="txt_chon" style="width:250px;" placeholder="Nhập chọn" class="form-control"/></td>
                    </tr>
                    
                    <tr>
                        <td colspan="4" align="center"><input type="submit" name="btn_them" value="Thêm giá sp"/></td>
                    </tr>
                    <?php ?>
                </table>
            </div>
        </form>

        <?php
        if(isset($_POST['btn_them'])){
            $tensp=$_POST['txt_idsp'];
            $ma_loai=$_POST['txt_dgnhap'];
            $ma_hang=$_POST['txt_dgban'];
            $ma_nhacc=$_POST['txt_ngay'];
            $sp_thongtin=$_POST['txt_chon'];
            $sql_insert = "insert into gia(idsp, dongianhap, dongiaban, ngayad, chon) values('$tensp','$ma_loai','$ma_hang','$ma_nhacc','$sp_thongtin')";
            if($tensp!=''){
                if(mysqli_query($con, $sql_insert)===true){
                    echo "<script language ='javascript'>
                        alert('Bạn đã thêm mới thành công!');
                        window.open('index.php?admin=gia');
                    </script>";
                }
            }else{
                echo "<script language ='javascript'>
                    alert('Thêm mới thất bại!');
                    window.open('index.php?admin=gia');
                </script>";
            }
        }        
    ?>
    </body>
</html>

<!-- require('xulynhapsp.php'); -->