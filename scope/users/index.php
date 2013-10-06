<?php
error_reporting(1);
ob_start();
session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['role']) {
        header('Location: admin.php');
    } else {
        header('Location: /scope/');
    }
}
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
                margin-top: 10px;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <?php include '../includes/header.php'; ?>

            <!-- Jumbotron -->
            <div class="jumbotron">
                <!--<h2>Send us a message</h2>-->
                <?php print $_SESSION['msg']; ?>
                <form action="" method="POST">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" class="span3" required />
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" class="span3" required />
                    <br />
                    <input type="submit" name="login" value="Sign in" class="btn btn-primary" />
                </form>
                <span><strong>Have no account!</strong> <a href="register.php">Sign up</a> for free.</span>
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
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_fetch_assoc(mysqli_query($con, $sql));
    if ($result) {
        if ($result['is_active']) {
            $_SESSION['username'] = $result['username'];
            $_SESSION['role'] = $result['role'];
            if ($_SESSION['role']) {
                header('Location: admin.php');
            } else {
                header('Location: /scope/');
            }
        } else {
            $msg = "
                <div class='alert alert-info fade in'>
                    <button type='button' class='close' data-dismiss='alert'>×</button>
                    <strong>Sorry,</strong> Please check your email to activate.
                    For further issues, send us an email info@pwn-me.org
                </div>";
            $_SESSION['msg'] = $msg;
            header("Location: index.php");
        }
    } else {
        $msg = "<div class='alert'><strong>Invalid Username/Password</strong></div>";
        $_SESSION['msg'] = $msg;
        header("Location: index.php");
    }
} else {
    $_SESSION['msg'] = NULL;
}
?>
