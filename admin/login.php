
<div style="border: 1px solid #111; width: 400px; height: 180px; margin:auto; textalign: center;">
    <div>
        <h2>Đăng nhập quản trị hệ thống</h2>
    </div>
    <div align="center">
        <form action="" method="post">
            <table>
                <tr>
                    <td>Tên tài khoản</td>
                    <td><input type="text" name="user" placeholder=" Username" style="height: 25px; width: 200px"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" name="pass" placeholder=" Password" style="height: 25px; width: 200px; margin-top: 10px"></td>
                </tr>
                <tr >
                    <td colspan="2" style="margin-top: 10px; text-align: center;">
                        <button name="login" class="dangnhap" style="margintop: 10px">Đăng nhập</button>
                        <button class="thoat"><a href="../index.php">Thoát</a></button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    include ("./conect/ketnoi.php");
    if(isset($_POST['login'])) {
        $username = $_POST['user'];
        $password = MD5($_POST['pass']);
        $sql_check = mysqli_query($con,"select * from khachhang where tendangnhap = '$username'");
        $dem = mysqli_num_rows($sql_check);
        if($dem == 0) {
            //echo "<p class='thongbao1'>Tài khoản không tồn tại</p>";
            echo "<script language='javascript'>
                            alert('Tài khoản này không tồn tại');
                   </script>";
        } else {
            $sql_check2 = "select * from khachhang where tendangnhap = '$username' and password = '$password'";
            $row = mysqli_query($con, $sql_check2);
            $dem2 = mysqli_num_rows($row);
            if($dem2 == 0)
                //echo "<p style='text-align:center'>Mật khẩu không chính xác</p>";
                echo "<script language='javascript'>
                                alert('Mật khẩu hoặc tài khoản không đúng');
                      </script>";
            else{
                while($rows = mysqli_fetch_array($row)){
                    $_SESSION['username'] = $username;
                    $_SESSION['phanquyen'] = $rows['quyentruycap'];
                    $_SESSION['idkh'] = $rows['idkh'];
                    if($rows['quyentruycap'] == 0){
                        echo "<script language='javascript'>
                                        alert('Đăng nhập quản trị thành công');
                                        window.open('./admin/index.php','_self', 1);
                                </script>";
                    } else{
                        header('location:../index.php');
                    } 
                }
            }
        }
    }
?>




