<?php
    include('./conect/ketnoi.php');
    if(isset($_GET['action'])){
        $masp=$_GET['idsp'];
    
        $sql = "SELECT * FROM sanpham sp INNER JOIN gia g on sp.idsp=g.idsp WHERE chon=1 and idloaisp=$masp";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <!-- <div class="col-md-2 col-sm-3 col-12"> -->
                    <!-- <div class="card sp">
                        <div class="card-body"> -->
                                <span class="span_ten"><?php echo $row['tensp'] ?></span><br>
                                <img src="./img/<?php echo $row['hddsp'] ?>" alt="">
                                <span class="span_mota"><?php echo $row['motasp'] ?></span><br>
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->
                <?php
            }
        } else {
            echo "Hiện đang được cập nhật dữ liệu";
        }     
    } 
?>