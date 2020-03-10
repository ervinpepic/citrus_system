<?php
//section for including files
include './database/mysqlconnection.php';
include './headers/header.php';
include './footers/footer.php';
?>
<div class="container">
    <div class="row">
        
            <?php
            //database connection
            $conn = OpenConnection();
            ?>
            <?php

            $sql = "SELECT id, korisnik, mesto, grad FROM testni_podaci";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                //output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-md-4 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["korisnik"] ?></h5>
                            <p class="card-text"><?php echo $row["mesto"] ?></p>
                            <a href="#" class="btn btn-primary"><?php echo $row["grad"] ?></a>
                        </div>
                    </div>
                    </div>

            <?php

                }
            } else {
                echo "0 result";
            }

            ?>

            <?php
            CloseConnection($conn);
            ?>
        
    </div>
</div>