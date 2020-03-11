<?php

//php logic for getting comment
if (isset($_POST['create_comment'])) {
    $product_id = $_GET['id'];
    $full_name = $_POST['full_name'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];

    if (!empty($full_name) && !empty($comment_email) && !empty($comment_content)) {
        $query_sql = "INSERT INTO comments (product_id, full_name, email, comment_text, comment_status)
                  VALUES ($product_id, '$full_name', '$comment_email', '$comment_content', 'unapproved')";
        $create_comment_query = mysqli_query($start_connection, $query_sql);

        if (!$create_comment_query) {
            die('query failed' . mysqli_error($start_connection));
        }
    } else {
        echo "<script>alert('Fields Cannot be emty')</script>";
    }
}
?>


<!-- Display comments item -->
<?php

while ($row = mysqli_fetch_assoc($select_comment_query)) {
    $comment_content = $row['comment_text'];
    $comment_author = $row['full_name'];
    $comment_email = $row['email']; ?>

    <div class="mt-3">
        <ul class="list-unstyled">
            <li class="media">
                <img class="mr-3" src="http://placehold.it/64x64" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0 mb-1"><?php echo $comment_author; ?></h5>
                    <?php echo $comment_content; ?>
                    <p class="small"><?php echo $comment_email ?></p>
                </div>
            </li>
        </ul>
    </div>

<?php
} ?>

