<?php
    include ("./conect/ketnoi.php");
    if(isset($_POST['timkiem'])){
        $tim = $_POST['search'];
        $sql = "SELECT * FROM sanpham sp INNER JOIN gia g on sp.idsp=g.idsp WHERE tensp like '%".$tim."%'";
        $rows = mysqli_query($con,$sql);
        $tong = mysqli_num_rows($rows);
        if($tong < 0){
            echo"Không tìm được sản phẩm nào";
        }
        else{ ?>
            <h2>Từ khóa <font color="red"><b><?php echo $tim ?></b></font> : có <?php echo $tong ?> kết quả </h2>
            <?php while($row = mysqli_fetch_array($rows)){ ?>
                <div class="col-md-2 col-sm-3 col-12">
                    <div class="card sp">
                        <div class="card-body">
                            <a href="./index.php?action=chitiet&idsp=<?php echo $row['idsp'] ?>" class="a_chitiet">
                                <img src="./img/<?php echo $row['hddsp'] ?>" alt="">
                                <span><?php echo $row['tensp'] ?></span><br>
                                <span class="g2"><?php echo  $row['dongianhap'] ?></span><br>
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
            <?php }
        }
    } 
?>