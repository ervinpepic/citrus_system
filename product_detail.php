<?php
//section for including files
include './database/mysqlconnection.php';
include './headers/header.php';
include './footers/footer.php';
?>
<?php
//database connection
$conn = OpenConnection();
?>
<div class="container">
    <div class="row">


        <?php

        $product_id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = " . $product_id . " LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            return header("index.html");
        }
        $product = $result->fetch_object();
        ?>
        <!-- // comment list for this post -->



        <!-- Comment -->

        <!-- // php comment -->
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3><?php echo $product->product_title ?></h3>
                    <p class="lead"><?php echo $product->short_product_description ?></p>

                    <img class="img-fluid img-thumbnail" src="<?php echo $product->product_image ?>" alt="" width="400" height="400">
                </div>
            </div>

            <?php

            if (isset($_POST['create_comment'])) {
                $product_id = $_GET['id'];
                $full_name = $_POST['full_name'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];
                if (!empty($full_name) && !empty($comment_email) && !empty($comment_content)) {

                    $query = "INSERT INTO comments (product_id, full_name, email, comment_text) VALUES ($product_id, '$full_name', '$comment_email', '$comment_content')";

                    $create_comment_query = mysqli_query($conn, $query);
                    if (!$create_comment_query) {
                        die('query failed' . mysqli_error($conn));
                    }
                } else {
                    echo "<script>alert('Fields Cannot be emty')</script>";
                }
            }

            ?>
            <h3 class="lead mt-3 mb-2">Comments for this product</h1>
                <?php

                $query0 = "SELECT * FROM comments WHERE product_id = {$product_id} ORDER BY id DESC ";
                $select_comment_query = mysqli_query($conn, $query0);
                if (!$select_comment_query) {
                    die('QUERY FAILED' . mysqli_error($conn));
                }
                while ($row = mysqli_fetch_assoc($select_comment_query)) {

                    $comment_content = $row['comment_text'];
                    $comment_author = $row['full_name'];
                    $comment_email = $row['email'];
                ?>

                    <div class="mt-3">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img class="mr-3" src="http://placehold.it/64x64" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1"><?php echo $comment_author; ?></h5> 
                                    <?php echo $comment_content; ?>
                                    <p class="small"><?php echo $comment_email?></p>
                                </div>
                            </li>
                        </ul>
                    </div>

                <?php  } ?>
                <!-- comments -->
                <div class="row">
                    <div class="col">
                        <form action="" method="POST" role="form">
                            <div class="form-group">
                                <label for="full_name">Full name</label>
                                <input type="text" class="form-control" placeholder="First and Last name" name="full_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email address</label>
                                <input type="email" class="form-control" placeholder="name@example.com" name="comment_email">
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Your suggestion for company or comment for product</label>
                                <textarea class="form-control" rows="3" name="comment_content"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                        </form>
                    </div>
                </div>




        </div>