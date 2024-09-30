<link rel = "stylesheet"href = "hienthi_sp.css">
<script type="text/javascript" src="js/checkbox.js"></script>
<?php
  include('../conect/ketnoi.php');
  $select = "SELECT * FROM hoadon dh INNER JOIN khachhang nd ON dh.idkh = nd.idkh";
  $query = mysqli_query($con,$select);
  $dem = mysqli_num_rows($query);
?>
<div>
    <div class="quanlysp">
        <h3 class="text-center" style="color:green">QUẢN LÝ ĐƠN HÀNG</h3>
        <p>có tổng <font color=red><b><?php echo $dem ?></b></font> đơn hàng</p><br>
    </div>
    <table>
        <tr class='tieude_hienthi_sp'>
            <td>STT</td>
            <td>Mã đơn hàng</td>
            <td>tên khách hàng</td>
            <td>điện thoại</td>
            <td>Email</td>
            <td>trạng thái</td>
            <td>xác nhận</td>
            <td colspan=2>Active</td>
        </tr>
        <?php 
        // nếu đã có số thứ tự của trang thì giữ nguên (ở đây tôi dùng biến $page)
        // nếu chưa có đặt mặc định là 1
        if(!isset($_GET['page'])){
            $page = 1;
        }else {
            $page = $_GET['page'];
        }
        //chọn số kết quả trả về trong mỗi trang mặt định là 10 
        $max_results = 10;
        // tính số thứ tự giá trị trả về đầu trang của hiện tại
        $from = (($page * $max_results)- $max_results);
        // chạy 1 mysql query để hiển thị kết quả trên trang hiện tại 
        $sql = mysqli_query($con,"SELECT * FROM hoadon dh INNER JOIN khachhang nd ON dh.idkh = nd.idkh ORDER BY idhd DESC LIMIT $from , $max_results ");
        if($dem > 0){
            $i = 1;
            while($bien = mysqli_fetch_array($sql))
            {
        ?>
        <tr class='noidung_hienthi_sp'>
            <form action="index.php?admin=xulyhd&madh=<?php echo $bien['idhd']; ?>" method="post">
                <td ><?php  echo $i ?></td>
                <td align="left"><?php echo $bien['idhd'] ?></td>
                <td align="left"><?php echo $bien['tenkh'] ?></td>
                <td >0<?php echo $bien['sdtkh'] ?></td>
                <td ><?php echo $bien['emailkh'] ?></td>
                <td>				
                    <select name="status" id="">				
                    <?php
                        $sql_s = "SELECT * FROM s_status";
                        $qk_s = mysqli_query($con, $sql_s);	
                        while($row_s = mysqli_fetch_array($qk_s)){
                            if($bien['trangthai']==$row_s['id']){
                                echo "<option value='$row_s[id]' selected='selected' >$row_s[tenStatus]</option>";
                            }else{
                                echo "<option value='$row_s[id]'>$row_s[tenStatus]</option>";
                            }
                        }					
                    ?>
                    </select>
                </td>
                <td style="width:100px;"><button type="submit" class="btn btn-primary">Xác nhận</button>	
                <td style="width:70px;"><a href="index.php?admin=chitiethoadon&madh=<?php echo $bien['idhd']; ?> " style="float:left;">Chi tiết</a>	
                </td>
			</form>  
        </tr>
        <?php 
        $i++;}
        }else echo "<tr><td colspan='6'> không có sản phẩm trong CSDL</td></tr>";
        ?>
    </table>
    <div id="phantrang_sp">
		<?php
			// Tính tổng kết quả trong toàn DB:  
			$total_results = mysqli_num_rows(mysqli_query($con,"SELECT COUNT(*) as Num FROM hoadon"));  
			// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
			$total_pages = ceil($total_results / $max_results);  
			// Tạo liên kết đến trang trước trang đang xem 
			if($page > 1){  
			$prev = ($page - 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthihd&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
			}  
			for($i = 1; $i <= $total_pages; $i++){  
			if(($page) == $i){  
			echo "$i&nbsp;";  
			} else {  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthihd&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
			}  
			}  
			// Tạo liên kết đến trang tiếp theo  
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthihd&page=$next\"><button class='trang'>Trang sau</button></a>";  
			}  
			echo "</center>";  		
		?>
	</div>
</div>