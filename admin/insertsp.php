<?php
    if(isset($_GET['admin'])){
        if($_GET['admin']=='insertsp'){
            $tensp=$_POST['txt_tensp'];
            $ma_loai=$_POST['loaisp'];
            $ma_hang=$_POST['hangsx'];
            $ma_nhacc=$_POST['nhaccsp'];
            $sp_thongtin=$_POST['txt_chitiet'];
            $hinh_sp=$_FILES['sp_hinh']['name'];
            if($hinh_sp!=''){
                $file_path = '../img/'.$hinh_sp;
                move_uploaded_file($_FILES['sp_hinh']['tmp_name'],$file_path);
            }
            $sql_insert = "insert into sanpham(tensp, idloaisp, idncc, idhang, motasp,  hddsp) values('$tensp','$ma_loai','$ma_nhacc','$ma_hang','$sp_thongtin','$hinh_sp')";
            if($tensp!=''){
                if(mysqli_query($con, $sql_insert)===true){
                    echo "<script language ='javascript'>
                        alert('Bạn đã thêm mới thành công!');
                        window.open('index.php?admin=sanpham');
                    </script>";
                }
            }else{
                echo "<script language ='javascript'>
                    alert('Thêm mới thất bại!');
                    window.open('index.php?admin=sanpham');
                </script>";
            }
        }else
        if($_GET['admin']=='update'){
            $id = $_POST['masp'];
            $hinh_old = $_POST['hinh_old'];
            $tensp=$_POST['txt_tensp'];
            $ma_loai=$_POST['loaisp'];
            $ma_hang=$_POST['hangsx'];
            $ma_nhacc=$_POST['nhaccsp'];
            $sp_thongtin=$_POST['txt_chitiet'];
            $datetim = new DateTime();
            $hinh_sp='sp_'.$datetim->getTimestamp().'_'.$_FILES['sp_hinh']['name'];
            if($hinh_sp!=''){
                $file_path = '../img/'.$hinh_sp;
                move_uploaded_file($_FILES['sp_hinh']['tmp_name'],$file_path);
                unlink('../img/'.$hinh_old);
            }
            $sql_update = "update sanpham set tensp='$tensp', motasp='$sp_thongtin', idncc='$ma_nhacc', idloaisp='$ma_loai',idhang='$ma_hang',hddsp='$hinh_sp' where idsp = '$id'";
            if($tensp!=''){
                if(mysqli_query($con,$sql_update)===true){
                    echo "<script language ='javascript'>
                        alert('Bạn đã sửa thành công!');
                        window.open('index.php?admin=sanpham');
                    </script>";
                }
            }else{
                echo "<script language ='javascript'>
                    alert('Lỗi update!');
                    window.open('index.php?admin=sanpham');
                </script>";
            }
        }else
        if($_GET['admin']=='delete'){
            $masp = $_GET['id'];
            $sql_sp = "SELECT * FROM sanpham where idsp = '$masp'";
            $hinh_daidien ="";
            $kq = mysqli_query($con, $sql_sp);
            if(mysqli_num_rows($kq)>0){
                while($row = mysqli_fetch_array($kq)){
                    $hinh_daidien = $row['hinhdaidien'];
                }
            }
            $sql_delete = "DELETE FROM sanpham WHERE MaSP = '$masp'";
            if(mysqli_query($con, $sql_delete)===true){
                unlink('../img/'.$hinh_daidien);
                echo "<script language ='javascript'>
                        alert('Bạn đã vừa xóa dữ liệu thành công!');
                        window.open('index.php?admin=sanpham');
                    </script>";
            }else{
                echo "<script language ='javascript'>
                    alert('Lỗi xóa dữ liệu!');
                    window.open('index.php?admin=sanpham');
                </script>";
            }
        }    
    };
?>