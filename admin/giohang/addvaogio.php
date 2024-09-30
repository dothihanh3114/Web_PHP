<?php
    include('./conect/ketnoi.php');
    if(isset($_GET['content'])){
        if($_GET['content'] == "add"){
            $idsp = $_GET["idsp"];
            $sl1 = $_POST['txt_sl'];

            $gia = $_POST['txtGiasp'];
            $tensp = $_POST['txtTensp'];
            $imgHinh = $_POST['imghinh'];
            //trường hợp trong giỏ đã có sản phẩm
            if(isset($_SESSION['gio'][$idsp])){
                $_SESSION['gio'][$idsp]['sl'] = $_SESSION['gio'][$idsp]['sl'] + $sl1;
                header('location: index.php');
            }else{
                 //trường hợp trong giỏ không có sản phẩm
                // $sql_s = "SELECT * FROM sanpham sp INNER JOIN gia g on sp.idsp=g.idsp WHERE chon=1 and sp.idsp={$idsp}";
                // $query_s=mysqli_query($con, $sql_s);
                // if(mysqli_num_rows($query_s)!=0){
                //     $row_s=mysqli_fetch_array($query_s);
                    $_SESSION['gio'][$idsp] = array(
                        "sl" => $sl1,
                        "tensp" => $tensp,
                        "gia" => $gia,
                        "imghinh" => $imgHinh
                    );
                    header('location: index.php');
                // }else{
                //     $message="Mã sản phẩm này không có trong hệ thống!";
                // }
            }
        }
    }
?>