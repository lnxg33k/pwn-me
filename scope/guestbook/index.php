<?php
error_reporting(1);
ob_start();
session_start();
include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Template &middot; Bootstrap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="/scope/static/css/bootstrap.min.css" rel="stylesheet">
        <link href="/scope/static/css/app.css" rel="stylesheet">
        <link href="/scope/static/css/bootstrap-responsive.min.css" rel="stylesheet">
        <style>
            .jumbotron{
                margin-top: 20px;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <?php include '../includes/header.php'; ?>

            <!-- Jumbotron -->
            <div class="jumbotron">
                <h2>Send us a message</h2>
                <?php print $_SESSION['msg']; ?>
                <form action="" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="name">Name</label>
                        <div class="controls">
                            <input type="text" id="name" name="name" class="span5" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="title">Title</label>
                        <div class="controls">
                            <input type="text" id="title" name="title" class="span5" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="message">Message</label>
                        <div class="controls">
                            <textarea rows="10" class="span5" id="message" name="message" required></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

            <hr>


            <div class="footer">
                <p>Welcome to Change your mind - Demo by <a href="http://ruinedsec.wordpress.com">ruined-sec</a> | <a href="https://www.twitter.com/lnxg33k">@lnxg33k</a>.</p>
            </div>

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="/scope/static/js/jquery.js"></script>
        <script src="/scope/static/js/bootstrap.min.js"></script>
    </body>
</html>


<?php
if (isset($_POST['name']) && isset($_POST['title']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $message = $_POST['message'];

    $sql = "INSERT INTO guestbook (name, title, body, approved) VALUES ('$name', '$title', '$message', 0)";
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    } else {
        $msg = "
        <div class='alert'>
        <strong>Hey $name: </strong> Thanks for your message.
        </div>";
        $_SESSION['msg'] = $msg;
        header('Location: index.php');
    }
    mysqli_close($con);
} else {
    $_SESSION['msg'] = NULL;
}
?>
