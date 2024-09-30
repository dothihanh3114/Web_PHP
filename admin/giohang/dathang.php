<?php
    include('./conect/ketnoi.php');
    if (isset($_GET['content']) == "dathang") {
        $pt_ThanhToan = $_POST['phuongthuc'];
        $ngaymua = date('y-m-d');
        $idnmua = $_SESSION['idkh'];
        $noidung = "Mua hang online.";
        $sql1 = "INSERT INTO hoadon(idkh, ngaymua, noidung, phuongthuctt) VALUES ('$idnmua','$ngaymua','$noidung','$pt_ThanhToan')";
        mysqli_query($con, $sql1);
        $mahd = mysqli_insert_id($con);
        foreach ($_SESSION['gio'] as $id => $value) {
            $sl = $_SESSION['gio'][$id]['sl'];
            $gia = $_SESSION['gio'][$id]['gia'];
            $sql2 = "INSERT INTO chitiethd(idhd, idsp, slban, dongia) VALUES ('$mahd','$id', '$sl','$gia')";
            mysqli_query($con, $sql2);
        }
        unset($_SESSION['gio']);
        echo "
        <script language='javascript'>
            alert('Đơn hàng của bạn đã thiết lập thành công chúng tôi sẽ chuyển hàng cho bạn thời gian sớm nhất');
            window.open('./index.php','_self',3);
        </script>";
    } else {
    } 
?>

