<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="thongtinkhachhang" align="center">
        <h3>Thông tin thanh toán</h3>
        <!-- id="a" onsubmit="return kiemtra" -->
        <form action="index.php?content=dathang" method="post" >
            <table>
                <?php
                    include './conect/ketnoi.php';
                    if(isset($_SESSION['idkh'])==null){
                        echo "<h2>Quý khách phải đăng nhập trước khi đặt hàng.</h2>";
                    }else{
                        $sql = mysqli_query($con,"select * from khachhang where idkh='" .$_SESSION['idkh'] ."'");
                        $row = mysqli_fetch_array($sql);                        
                ?>
                <tr>
                    <td class="tieude">Tên khách hàng</td>
                    <td><input type="text" name="hoten" value="<?php echo $row['tenkh']?>"></td>
                </tr>
                <tr>
                    <td class="tieude">Địa chỉ giao hàng</td>
                    <td><input type="text" name="diachi" value="<?php echo $row['diachikh']?>"></td>
                </tr>
                <tr>
                    <td class="tieude">Điện thoại khách hàng</td>
                    <td><input type="text" name="dienthoai" value="<?php echo $row['sdtkh']?>"></td>
                </tr>
                <tr>
                    <td class="tieude">Email</td>
                    <td><input type="text" name="email" value="<?php echo $row['emailkh']?>"></td>
                </tr>
                <tr>
                    <td class="tieude">Phương thức: </td>
                    <td>
                        <select name="phuongthuc" id="">
                            <option value="0">Chọn phương thức</option>
                            <option value="1">Qua bưu điện</option>
                            <option value="2">Qua thẻ ATM</option>
                            <option value="3">Thanh toán khi nhận hàng</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" class="submit">
                        <center><input type="submit" value="Đặt hàng" width="120px"></center>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </form>            
    </div>
</body>
</html>