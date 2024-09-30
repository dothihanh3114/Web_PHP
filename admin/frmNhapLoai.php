<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <th>Thêm mới loại sản phẩm</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="tenloaisp">
                    <input type="submit" name="btn_them" value="Thêm mới">
                </td>
            </tr>
        </table>
    </form>
    <?php
        if(isset($_POST['btn_them'])){
            $ten = $_POST['tenloaisp'];
            $sql="INSERT INTO loaisp(tenloaisp) VALUES ('$ten')";
            if(mysqli_query($con, $sql)==true){
                echo "Thêm mới thành công";
            }else{
                echo "Thêm mới thất bại";
            }
        }        
    ?>
</body>
</html>