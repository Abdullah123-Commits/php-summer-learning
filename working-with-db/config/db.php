<?php
    // Create connection with database
    $conn = mysqli_connect('localhost', 'root', '123456', 'phpblog');

    // Verify if conn established
    if (mysqli_connect_errno()) {
        // connection Failed
        echo 'Failed to connect to MySQL '. mysqli_connect_errno();
    }
?>