<?php
    include('conect/ketnoi.php');
    $sql="SELECT * FROM hangsx";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php?action=hangsx&idhang=<?php echo $row['idhang']; ?>">
                        <?php echo $row['tenhang']; ?>
                    </a>  
                </li>
            </ul>
            <?php
        }
    }else{
            echo "Hiện đang được cập nhật dữ liệu";
        }

?>



