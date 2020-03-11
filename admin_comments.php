<?php
//section for including external files and libraries
include './database/mysqlconnection.php';
include './includes/headers/header.php';
include './includes/footers/footer.php';
include './includes/functions/functions.php';
?>

<!-- database connection -->
<?php
$conn = OpenConnection();
?>
<!-- Main Content -->
<div class="container">
<div class="row">
  <div class="col">
      <table class="table table-hover table-dark">
          <thead>
              <tr>
                  
                  <th scope="col">Product id's</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Approve</th>
                  <th scope="col">Unaprove</th>
                  <th scope="col">Status of visibility</th>
                  <th scope="col">Comment ID</th>
                  
              </tr>
          </thead>

          <?php
          $sql = "SELECT id, product_id, email, comment_text, full_name, comment_status FROM comments";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
              //output data of each row
              while ($row = mysqli_fetch_assoc($result)) {
                  $comment_author = $row['full_name'];
                  $comment_email = $row['email'];
                  $comment_status = $row['comment_status'];
                  $comment_id = $row['id'];
                  $comment_product_id = $row['product_id']; ?>

                  <tbody>
                      <tr>
                          <th scope="row"><?php echo $comment_product_id ?></th>
                          <td><?php echo $comment_author ?></td>
                          <td><?php echo $comment_email ?></td>
                          <?php echo "<td><a href='admin_comments.php?approve=$comment_id'>Approve</a></td>"; ?>
                          <?php echo "<td><a href='admin_comments.php?unapprove=$comment_id'>Unapprove</a></td>"; ?>
                          <td><?php echo $comment_status ?></td>
                          <td><?php echo $comment_id ?></td>
                      </tr>
                  </tbody>

              <?php
              }
          } else {  ?>
              <p class="lead">No comments yet</p>
          <?php } ?>

      </table>
  </div>
</div>
</div>


<!-- logic for approving and unapproving comments -->
<?php

if (isset($_GET['approve'])) {
    $comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'approved' WHERE id = $comment_id ";
    $approve_comment_query = mysqli_query($conn, $query);
    redirect("http://localhost:8888/citrus_system/");
}

if (isset($_GET['unapprove'])) {
    $comment_id = $_GET['unapprove'];
    $query1 = "UPDATE comments SET comment_status = 'unapproved' WHERE id = $comment_id ";
    $unapprove_comment_query = mysqli_query($conn, $query1);
    redirect("http://localhost:8888/citrus_system/index.php");
}

?>

<!-- Close database connection -->
<?php
CloseConnection($conn);
?>