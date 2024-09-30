<?php
    include('./conect/ketnoi.php');
    if(isset($_GET['content'])){
        if($_GET["content"] == "delete"){
            $id = $_GET["idsp"];
            unset($_SESSION['gio'][$id]);
            // echo '<script> alert("Đã xoá mã sản phẩm '.$id.' !")</script>';
            // echo '<script>window.location.href="index.php?content=giohang"</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
?>



    <!-- session_start();
    if(isset($_GET['idsp'])) {
        $idsp = $_GET['idsp'];
        if(isset($_SESSION['gio'][$idsp])) {
            unset($_SESSION['gio'][$idsp]);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
    header("Location: viewgio.php");
    exit; -->

