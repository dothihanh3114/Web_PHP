<?php
  include('../conect/ketnoi.php');
  if(isset($_GET['admin'])){
    if($_GET['admin']='xulyhd'){
        $mahd = $_GET['madh'];
        $status = $_POST['status'];       
        $sql="update hoadon set trangthai = $status where idhd='$mahd'";
        if(mysqli_query($con,$sql)===true){            
            header('location: index.php?admin=donhang');
        }else{
            echo "Xác nhận không thành công.";
        }
    }
}
?>