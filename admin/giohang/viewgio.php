<meta charset="utf-8" />
<h2 style="text-align: center;">CHI TIẾT GIỎ HÀNG</h2>
<div class="table-responsive">
    <!-- <form methed="post"> -->
    <table class="table table-bordered" border="1px" style="bordercollapse:collapse; border-color: green">
        <tr style="font-weight:bold; background-color: green">
            <th width="25%">Tên sản phẩm</th>
            <th width="5%">Số lượng</th>
            <th width="12%">Giá</th>
            <th width="12%">Tổng tiền</th>
            <th width="18%">Action</th>
        </tr>
        <?php
            include ("./conect/ketnoi.php");
            $total = 0; $tongsp = 0;
            if(isset($_SESSION["gio"]) && $_SESSION["gio"] != null){
                $sql="SELECT * FROM sanpham sp INNER JOIN gia g on sp.idsp=g.idsp WHERE chon = 1 and sp.idsp IN (";
                foreach($_SESSION['gio'] as $id => $value) {
                    $sql.=$id.",";
                }
                $sql = substr($sql, 0, -1).") ORDER BY sp.idsp ASC";
                // echo $sql;
                $query = mysqli_query($con, $sql);
                if(mysqli_num_rows($query)>0){
                    while($row = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td style="padding-left: 10px">
                                <a href="index.php?action=chitiet&id=<?php echo $row['idsp'] ?>">
                                <?php echo $row["tensp"];?></a>
                            </td>
                            <td style="text-align:center">
                                <input type="number" name="sl[<?php echo $row['idsp'] ?>]"
                                value="<?php echo $_SESSION['gio'][$row['idsp']]['sl'] ?>"
                                style="width: 40px; border-style: none;textalign: center;" onchange=(alert(this.value)) >
                            </td>
                            <td style="text-align:right; padding-right:5px;">
                                <?php echo number_format($row["dongiaban"],0); ?>
                            </td>
                            <td style="text-align:right; padding-right:5px;">
                                <?php echo number_format($_SESSION['gio'][$row['idsp']]['sl'] * $row ["dongiaban"]);?>
                            </td>
                            <td style="text-align:center">
                                <a href="index.php?content=delete&idsp=<?php echo $row["idsp"]; ?>"><button style="width:60px;">Xoá</button></a>
                                <a href="index.php?content=update&idsp=<?php echo $row["idsp"]; ?>"><button style="width:60px;">Cập nhật</button></a>
                            </td> 
                        </tr>
                        <?php
                        $total = $total + ($_SESSION['gio'][$row['idsp']]['sl'] * $row["dongiaban"]);
                        $tongsp = $tongsp + $_SESSION['gio'][$row['idsp']]['sl'];
                    } ?>
                    <tr>
                        <td align="right" style="font-weight:bold; padding-right:5px; bordercolor: green">Tổng cộng</td>
                        <td align="right" style="font-weight:bold; paddingright:5px"><?php echo number_format($tongsp); ?></td>
                        <td></td>
                        <td align="right" style="font-weight:bold; paddingright:5px"><?php echo number_format($total); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align:center">
                        <a href="index.php"><button style="width:100px; margin-top:5px; marginbottom:5px; color:red ">Mua hàng tiếp</button></a>
                        <a href="index.php?content=thanhtoan"><button style="width:100px; margintop:5px; margin-bottom:5px">Thanh toán</button></a></td> 
                    </tr>
                <?php }else{
                    echo "Giỏ hàng không có sản phẩm nào!";
                }
            }
        ?>
    </table>
</div>

