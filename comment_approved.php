<!-- display only approved comments -->

<?php

$query_sql_1 = "SELECT * FROM comments WHERE product_id = {$product_id} AND comment_status = 'approved' ORDER BY id DESC ";
$select_comment_query = mysqli_query($start_connection, $query_sql_1);

if (!$select_comment_query) {
    die('QUERY FAILED' . mysqli_error($start_connection));
}
?>

<?php
if (mysqli_num_rows($select_comment_query) > 0) {
?>
    <h3 class="lead mt-3 mb-2">Comments for this product</h1>

    <?php
} else if (mysqli_num_rows($select_comment_query) < 1) {
    ?>
        <h3 class='lead mt-3 mb-2'>No comments yet</h1>
        <?php
    }
        ?>