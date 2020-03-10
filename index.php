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

            $sql = "SELECT id, product_title, short_product_description, product_image FROM products";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                //output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-md-4">
                    <div class="card mt-3" style="width: 18rem;">
                        <img src="<?php echo $row["product_image"]?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["product_title"] ?></h5>
                            <p class="card-text"><?php echo $row["short_product_description"] ?></p>
                            <a href="product_detail.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary"><?php echo "View product" ?></a>
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