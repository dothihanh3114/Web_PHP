<?php
    include('conect/ketnoi.php');
    if(isset($_GET['action'])){
        $idloai=$_GET['idloaisp'];
        $sql = "SELECT * FROM sanpham sp INNER JOIN gia g on sp.idsp=g.idsp WHERE chon=1 and idloaisp=$idloai";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="col-md-2 col-sm-3 col-12">
                    <div class="card sp">
                        <div class="card-body">
                            <a href="./index.php?chitiethd=idsp&idsp=<?php echo $row['idsp'] ?>" class="a_chitiet">
                                <img src="./img/<?php echo $row['hddsp'] ?>" alt="">
                                <span><?php echo $row['tensp'] ?></span><br>
                                <span class="g2"><?php echo $row['dongianhap'] ?></span><br>
                                <span class="g1"><?php echo $row['dongiaban'] ?></span><br></a>
                                <form action="index.php?content=add&idsp=<?php echo $row["idsp"]?>" method="POST">
                                    <input type="number" value="1" name="txt_sl" class="input_sl">
                                    <a href=""><button>Mua ngay</button></a> <br>
                                </form>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Hiện đang được cập nhật dữ liệu";
        }      
    }
?>