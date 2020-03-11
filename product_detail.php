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

<!-- Main content in single post -->
<div class="container">
  <div class="row">

    <!-- get single product from database  -->
    <?php

    $product_id = $_GET['id'];
    $query_sql = "SELECT * FROM products WHERE id = " . $product_id . " LIMIT 1";
    $result = mysqli_query($start_connection, $query_sql);
    if (mysqli_num_rows($result) == 0) {
        return header("index.html");
    }
    //set single item in product variable
    $product = $result->fetch_object();

    ?>

    <!-- Product item for single item from database -->
    <div class="container">
      <div class="row">
        <div class="col">
          <h3><?php echo $product->product_title ?></h3>
          <p class="lead"><?php echo $product->short_product_description ?></p>
          <img class="img-fluid img-thumbnail" src="<?php echo $product->product_image ?>" alt="" width="400" height="400">
        </div>
      </div>

      <!-- Comment system -->

      <!-- gett singe comment item for particular post -->
      <?php include 'comment_item.php' ?>

      <!-- Display comments only if statys is apprvoed -->
      <?php include 'comment_approved.php' ?>

      <!-- display comment item -->
      <?php include 'comment_item.php' ?>

      <!-- Comment Form for posting new comment -->
      <?php include 'comment_form.php' ?>

    </div>

    <!-- Close database connection -->
    <?php
    CloseConnection($new_connection);
    ?>