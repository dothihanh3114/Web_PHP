<?php
    // Khởi động phiên
    session_start();

    // Xóa tất cả các biến phiên
    session_unset();

    // Hủy phiên hiện tại
    session_destroy();

    // Chuyển hướng người dùng về trang chính
    header("location: ../index.php");
    exit; // Đảm bảo không có mã PHP khác được thực thi sau chuyển hướng
?>
