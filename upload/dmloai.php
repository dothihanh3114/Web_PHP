<?php
    include('conect/ketnoi.php');
    $sql="SELECT * FROM loaisp";//câu lệnh truy vấn
    $result=mysqli_query($con,$sql);//thực hiện lệnh truy vấn
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            echo "<li><a href=./index.php?action=loai&idloaisp=$row[idloaisp]>$row[tenloaisp]</a></li>";
        }
    }else{
            echo "Hiện đang được cập nhật dữ liệu";
        }
?>