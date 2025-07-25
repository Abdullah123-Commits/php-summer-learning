<!-- hehe -->
<!-- hehe -->
<?php
    require('config/db.php');
    require('config/config.php');


    // Get id
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make query
    $query = 'SELECT * FROM posts WHERE id='.$id;

    // Get result
    $result = mysqli_query($conn, $query);

    // fetch data
    $post = mysqli_fetch_assoc($result);
    // var_dump($posts);

    // free results

    mysqli_free_result($result);
    
    // close the connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Blog</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <a href="<?php echo ROOT_URL; ?>" class="btn btn-danger">Back</a>
        <h1><?php echo $post['title']; ?></h1>
        <small><?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
        <p><?php echo $post['body']; ?></p>
    </div>
</body>
</html>