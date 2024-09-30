<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <title>Document</title>
</head>
<body>
    <br>
        <a href="./index.php?admin=nhaploai">Thêm loại</a>
    <br>
    <br>
    <table boder="1px" class="loai">
        <tr>
            <th style="width: 50px;">STT</th>
            <th style="width: 100px;">Mã loại</th>
            <th style="width: 250px;">Tên loại</th>
        </tr>
        
        <?php
            include ("../conect/ketnoi.php");
            $sql= "SELECT * FROM loaisp";
            $result=mysqli_query($con,$sql);//thực hiện lệnh truy vấn
            
            if(mysqli_num_rows($result)>0){
                $i=1;
                while($row=mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row['idloaisp'];?></td>
                        <td><?php echo $row['tenloaisp'];?></td>
                    </tr>
                    <?php
                    $i++;
                }
            }else{
                    echo "Hiện đang được cập nhật dữ liệu";
                }
        ?>
        
    </table>

    <br>
        <a href="./index.php?nhaploai">Thêm hãng</a>
    <br>

    <table boder="1px" class="loai">
        <tr>
            <th style="width: 50px;">STT</th>
            <th style="width: 100px;">Mã hãng</th>
            <th style="width: 250px;">Tên hãng</th>
        </tr>
        
        <?php
            $sql= "SELECT * FROM hangsx";
            $result=mysqli_query($con,$sql);//thực hiện lệnh truy vấn
            
            if(mysqli_num_rows($result)>0){
                $i=1;
                while($row=mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row['idhang'];?></td>
                        <td><?php echo $row['tenhang'];?></td>
                    </tr>
                    <?php
                    $i++;
                }
            }else{
                    echo "Hiện đang được cập nhật dữ liệu";
                }
        ?>
        
    </table>
</body>
</html>

