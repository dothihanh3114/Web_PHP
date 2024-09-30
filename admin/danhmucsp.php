<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table table-bordered">
        <h3 style="text-align: center">Danh mục sản phẩm</h3>
        <tr>
            <td colspan="5"><a href="./index.php?admin=addsanpham"><button class="btn btn-primary">Thêm mới</button></a></td>
        </tr>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình sản phẩm</th>
            <th>Mô tả sản phẩm</th>
            <th>Sửa - Xóa</th>
            
        </tr>
        <?php
            include('../conect/ketnoi.php');
            $sql = "SELECT * FROM sanpham order by idsp DESC";
            $kq = mysqli_query($con, $sql);
            if (mysqli_num_rows($kq) > 0) {
                while ($row = mysqli_fetch_array($kq)) {
                    echo"<tr>";
                    echo "<td>".$row['idsp']."</td>";
                    echo "<td>".$row['tensp']."</td>";
                    echo "<td> <img src=../img/".$row['hddsp']. " width='100px' heigh='100px'></td>";
                    echo "<td>".$row['motasp']."</td>";
                    echo "<td><a href='index.php?admin=updatesp&id=$row[idsp]' class='btn btn-primary'>Sửa</a>
                    <a href='index.php?admin=delete&id=$row[idsp]' class='btn btn-danger'>Xóa</a></td>";
                    echo"</tr>";
                }
            }
        ?>
        <tr>
                   
        </tr>
    </table>
</body>
</html>

<!-- border="1px"  order by MaSP DESC -->















