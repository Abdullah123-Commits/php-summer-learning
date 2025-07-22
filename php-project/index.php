<?php 
    // MESSAGE VARS
    $msg = '';
    $msgClass = '';
    // Check for submit
    if (filter_has_var(INPUT_POST, 'submit')) {
        echo 'Submitted';
        // Get for data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // CHECK REQD FIELDS
        if (!empty($name) && !empty($email) && !empty($message)) {
            // PASSED
            // echo '<br>'.'Passed!';
            // Checking for email validation
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                // failed
                $msg = 'Please use a valid Email';
                $msgClass = 'alert-danger';
            } else {
                // passed
                // sending mail 
                $toEmail = 'abdullahmuaz002@gmail.com';
                $subject = 'Contact Request From' . $name;
                $body = '<h2> Contact Request </h2>
                        <h4>Name</h4><p>'.$name.'</p>
                        <h4>Email</h4><p>'.$email.'</p>
                        <h4>Message</h4><p>'.$message.'</p>
                        ';
                // HEADERS
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type:text/html;charset=UTF-8\r\n";
                // ADDITIONAL HEADER
                $headers .= "From: " . $name . " <" . $email . ">\r\n";
                
                if (mail($toEmail, $subject, $body, $headers)) {
                    // email sent
                    $msg = 'Your mail has been sent successfully';
                    $msgClass = 'alert-success';
                } else {
                    $msg = 'Your mail was not sent';
                    $msgClass = 'alert-danger';
                }
            }
        } else {
            // FAILED
            $msg = 'Please fill in all fields';
            $msgClass = 'alert-danger';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <title>Contact us</title>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">My Website</a>
        </div>
    </nav>

    <!-- FORM -->
    <div class="container">
        <?php if($msg != ''): ?> 
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control">
                    <?php echo isset($_POST['message']) ? $message : ''; ?>
                </textarea>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
