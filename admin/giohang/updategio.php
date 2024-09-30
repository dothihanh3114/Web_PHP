<?php
    session_start();
    include ("./conect/ketnoi.php");

    if (isset($_GET['content']) && $_GET['content'] == 'update') {
        if (isset($_GET['idsp']) && isset($_POST['sl'])) {
            $idsp = $_GET['idsp'];
            $sl = $_POST['sl'][$idsp];

            // Kiểm tra và cập nhật số lượng sản phẩm trong giỏ hàng
            if (isset($_SESSION['gio'][$idsp])) {
                $_SESSION['gio'][$idsp]['sl'] = $sl;

                // Cập nhật tổng tiền và số lượng sản phẩm
                $sql = "SELECT g.dongiaban FROM gia g WHERE g.idsp = $idsp";
                $query = mysqli_query($con, $sql);
                if ($row = mysqli_fetch_array($query)) {
                    $_SESSION['gio'][$idsp]['tongtien'] = $sl * $row['dongiaban'];
                }
            }
        }
    }    
    header('Location: index.php?content=viewgio');
    exit();
?>