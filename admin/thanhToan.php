<?php
    include ("./conect/ketnoi.php");
    if ($action = "insert") {
        $phuongthuc = $_POST['phuongthuc'];
        $ngay = date('Y-m-d');
        $idnd = $_SESSION['idnd'];
        $sql1 = "INSERT INTO da(idnd, ngaydathang, trangthai, phuongthucthanhtoan) VALUES ('$idnd', '$ngay','1','$phuongthuc')";
        mysqli_query($con, $sql1);
        $mahd = mysqli_insert_id($con);
        foreach ($_SESSION['gio'] as $stt => $soluong) {
            $sql = "select * from sanpham where idsp = $stt";
            $rows = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($rows);
            $soluong = $_SESSION['gio'][$row['idsp']]['sl'];
            $gia = $row['dongiaban'];
            $sql1 = "INSERT INTO tbl_ctdathang(madh,idsp,slban,dongiaban) values('$mahd','$stt','$soluong','$gia')";
            mysqli_query($con, $sql1);
            unset($_SESSION['gio']);
            echo "
            <script 
                language='javascript'>alert('Đơn hàng của bạn đã thiết lập thành công chúng tôi sẽ chuyển hàng cho bạntrong thời gian sớm nhất');
                window.open('index.php','_self',3);
            </script>";
        }
    }
?>