  <?php
  //section for including external files and libraries
  include './database/mysqlconnection.php';
  include './includes/headers/header.php';
  include './includes/footers/footer.php';
  ?>

  <!-- database connection -->
  <?php
  $start_connection = OpenConnection();
  ?>

  <!-- Main Content -->
  <div class="container">
    <div class="row">

      <!-- get all products from database  -->
      <?php

      $query_sql = "SELECT id, product_title, short_product_description, product_image FROM products";
      $result = mysqli_query($start_connection, $query_sql);

      if (mysqli_num_rows($result) > 0) {
          //output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
              ?>
          <!-- Print data from request in bootstrap card  -->
          <div class="col-md-4">
            <div class="card mt-3" style="width: 18rem;">
              <img src="<?php echo $row["product_image"] ?>" class="card-img-top" alt="...">
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
          echo "<p class='lead'>No Products</p>";
      }

      ?>
    </div>
  </div>

  <!-- Close database connection -->
  <?php
  CloseConnection($new_connection);
  ?>