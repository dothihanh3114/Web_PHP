<?php
  session_start();
  include '../conect/ketnoi.php';
  include ("docso.php");
  $madh=$_GET['madh'];
  $sql = "select * from tbl_donvi";
  $query = mysqli_query($con,$sql);
  $kq = mysqli_fetch_array($query);
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hóa Đơn Mua Hàng</title></head>
<body onLoad="window.print()">
  <div style="margin:0 auto; width:700px; border:1px solid #000;">
    <table width="100%" style="margin-left: 20px; margin-top: 20px">
      <tr>
        <td width="100px" height="100px">
          <img src="../img/logo.jpg" width="100px" height="100px">
        </td>
        <td>
          <table>
            <tr>
              <td><?php echo "Tên đơn vị: ".$kq['TenDV']; ?></td>
            <tr>
            <tr>
              <td><?php echo "ĐC: ".$kq['DiaChi'];?></td>
            </tr>
            <tr>
              <td><?php echo "ĐT: ".$kq['DienThoai'];?></td>
              <td><?php echo "MST: ".$kq['MST'];?></td>
            </tr>
            <tr>
              <td><?php echo "Email: ".$kq['Email'];?></td>
              <td><?php echo "Website: ".$kq['Website'];?></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td colspan="3" height="25" valign="top" align="center">
        <strong><font color="#FF0000" size="+2">HOÁ ĐƠN BÁN HÀNG</font></strong></td>
      </tr>
      <?php   
      $sql1="SELECT * FROM hoadon dh INNER JOIN khachhang nd ON dh.idkh = nd.idkh where idhd='$madh'";
      $rows1 = mysqli_query($con, $sql1);
      $row1 = mysqli_fetch_array($rows1);
    ?>
      <tr>
        <td width="30%">&nbsp;</td>
        <td height="25" align="center" width="40%"><I>
        <?php echo "Ngày ".date("d/m/Y"); ?></I></td>
        <td align="left" width="30%"><?php include 'sohoadon.php'; ?></td>
      </tr>
    </table>
    
    <table width="100%" style="margin-left: 20px">
      <tr>
        <td><?php echo "Khách hàng: ".$row1['tenkh'];?></td>
        <td><?php echo "MST: ";?><td>
      </tr>
      <tr>
        <td><?php echo "Địa chỉ: ".$row1['diachikh']." ";?></td>
        <td><td>
      </tr>
      <tr>
        <td><?php echo "Điện thoại: 0".$row1['sdtkh'];?></td>
        <td><?php echo "Email: ".$row1['emailkh'];?><td>
      </tr>
      <tr>
        <td><?php echo "Ngày giao hàng: ".date("d/m/Y"); ?></td>
        <td><?php echo "Phương thức thanh toán: "; if($row1['phuongthuctt']==1) echo "Qua bưu điện"; else if($row1['phuongthuctt']==2) echo "Qua thẻ ATM"; else echo"Thanh toán trực tiếp";?><td>
      </tr>
    </table>
    <table width="95%" style="border-collapse:collapse; margin-left: 20px; margin-right: 20px;">
        <tr>
          <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid #000;"><div align="center"><b>STT</b></div></td>
          <td width="10%" bgcolor="#CCCCCC"  align="left" style="border:1px solid #000;"><div align="center"><b>Mã sản phẩm</b></div></td>
          <td width="25%" bgcolor="#CCCCCC"  align="left" style="border:1px solid #000;"><div align="center"><b>Tên sản phẩm</b></div></td>
          <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid #000;"><div align="center"><b>ĐVT</b></div></td>
          <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid #000;"><div align="center"><b>Số lượng</b></div></td>
          <td width="12%" bgcolor="#CCCCCC"  align="left" style="border:1px solid #000;"><div align="center"><b>Đơn giá VNĐ</b></div></td>            
          <td width="12%" align="right" bgcolor="#CCCCCC"  align="left" style="border:1px solid #000;"><div align="center"><b>Thành tiền</b></div></td>
        </tr>
      <?php
      $stt = 1;
      $tong = 0; $vat=0; $tongcong = 0;
      $sql="SELECT * FROM sanpham sp INNER JOIN chitiethd ctdh ON ctdh.idsp = sp.idsp where ctdh.idhd='.$madh.'";
      $rows=mysqli_query($con, $sql);
      while($row=mysqli_fetch_array($rows))
      {
        $thanhtien=$row['dongia']*$row['slban'];
        $tong+= $thanhtien;
      ?>
      <tr>
        <td align="left" style="border:1px solid #000;"><?php echo  $stt++?></td>
        <td align="center" style="border:1px solid #000;"><?php echo $row['idsp']?></td>
        <td align="left" style="border:1px solid #000;"><?php echo $row['tensp']?></td>
        <td align="left" style="border:1px solid #000;"></td>
        <td align="center" align="left" style="border:1px solid #000;"><?php echo $row['slban']?></td>
        <td align="right" align="left" style="border:1px solid #000;"><?php echo number_format($row['dongia'],"0",",",".")?></td>
        <td align="right" align="left" style="border:1px solid #000;"><?php echo number_format($thanhtien,"0",",",".")?></td>
      </tr>
    <?php } $vat = $tong * 0.1; 
      $tongcong = $tong + $vat; ?>
      <tr style="border:1px solid #000;">
        <td colspan="6" align="center" width="5%" style="border:1px solid #000;"><B>Tổng tiền hàng</B></td>
        <td align="right" ><b><?php echo number_format($tong,"0",",",".") ?></b></td>
      </tr>
      <tr style="border:1px solid #000;">
        <td colspan="6" align="center" width="5%" style="border:1px solid #000;"><B>Thuế VAT 10%</B></td>
        <td align="right" ><b><?php echo number_format($vat,"0",",",".") ?></b></td>
      </tr>  
      <tr style="border:1px solid #000;">
        <td colspan="6" align="center" width="5%" style="border:1px solid #000;"><B>Tổng giá trị đơn hàng</B></td>
        <td align="right" ><b><?php echo number_format($tongcong,"0",",",".") ?></b></td>
      </tr>
      <tr style="border:1px solid #000;">
        <td colspan="7" align="center" width="5%" style="border:1px solid #000;"><B>Bằng chữ: </B>
        <I><?php 
          // echo ucfirst(convert_number_to_words($tongcong));
          $docso = new Docso();
          echo ucfirst($docso->doc($tongcong));
        ?></I></td>
      </tr>
      <tr>
        <td align="center" colspan="2"><b>Khách hàng</b></td>
        <td align="center"><b>Người nhận</b></td>
        <td align="center" colspan="2"><b>Thủ kho</b></td>
        <td align="center"><b>Kế toán</b></td>
        <td align="center"><b>Giám đốc</b></td>
      </tr>
      <tr>
      <td align="center" colspan="2"><I><font size="-1">(Ký, ghi rõ họ tên)</font></I></td>
        <td align="center"><I><font size="-1">(Ký, ghi rõ họ tên)</font></I></td>
        <td align="center" colspan="2"><I><font size="-1">(Ký, ghi rõ họ tên)</font></I></td>
        <td align="center"><I><font size="-1">(Ký, ghi rõ họ tên)</font></I></td>
        <td align="center"><I><font size="-1">(Ký, ghi rõ họ tên)</font></I></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
</div>
</body>
</html>