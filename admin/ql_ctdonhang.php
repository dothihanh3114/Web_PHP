<link rel="stylesheet" href="hienthi_sp.css">
<?php 
  include('../conect/ketnoi.php');
  $madh = $_GET['madh'];
  $select = "SELECT * FROM sanpham sp INNER JOIN chitiethd cthd ON cthd.idsp = sp.idsp where cthd.idhd='.$madh'";
  $query = mysqli_query($con,$select);
  $dem = mysqli_num_rows($query);
  $sql1 = "SELECT * FROM hoadon dh INNER JOIN khachhang nd ON dh.idkh = nd.idkh WHERE idhd = '$madh' ";
  $rows1 = mysqli_query($con,$sql1);
  $row1 = mysqli_fetch_array($rows1);
?>
<div class="quanlysp">
    <h3>CHI TIẾT ĐƠN HÀNG</h3>
    <?php
     echo "Tên khách hàng : ".$row1['tenkh']; echo "</br>";
     echo "Địa chỉ : ".$row1['diachikh']; echo "</br>";
     echo "Điện thoại : ".$row1['sdtkh']; echo "</br>";
     echo "Ngày giao hàng : ".date("d/m/y"); echo "</br>";
     echo "Phương thức thanh toán: ";
     if($row1['phuongthuctt']==1)
        echo "qua bưu điện";
      else if($row1['phuongthuctt']==2) echo "qua thẻ ATM"  ;
      else echo "thanh toán khi nhận hàng";
    ?>
</div>
<table>
  <tr class='tieude_hienthi_sp'>
    <td>Mã HD</td>
    <td>Tên sản phẩm</td>
    <td>Số lượng</td>
    <td>Giá</td>
    <td>Thành tiền</td>
  </tr>
  <?php
    $tong=0;
  if($dem > 0){
    $i = 0;
    while ($bien = mysqli_fetch_array($query))
    {
      $i++;
      $thanhtien=$bien['dongiaban']*$bien['slban'];
      $tong+=$thanhtien;
    ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $bien['idhd'] ?></td>
      <td align="left" style="margin-left: 10px"><?php echo $bien['tensp'] ?></td>
      <td><?php echo $bien['slban'] ?></td>
      <td align="right"><?php echo number_format($bien['dongiaban'],0,",",".") ?></td>
      <td align="right"><?php echo number_format($thanhtien,0,",",".") ?></td>
    </tr>
    <?php } ?>
    <tr> <td colspan=5 align="right" style="padding:5px 5px 5px 0px; fontsize:20px;">Tổng: <font color="red"><?php echo number_format($tong,0,",",".") ?></font></td> </tr>
    <?php
    }
    else echo "<tr><td colspan='6'>Không có sản phẩm trong CSDL</td></tr>"; ?>
</table>
<div id="inhoadon">
	<p style="float:right; margin-top:10px; padding-right:30px;"><a href="in_donhang.php?madh=<?=$_GET['madh']?>" target="_blank">In hoá đơn</a></p>
</div>

