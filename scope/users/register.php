<?php
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

        <link href="/scope/static/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="/scope/static/css/app.css" rel="stylesheet">
        <style>
            .jumbotron{
                text-align: justify;
                margin-top: 20px;
            }
            .help-inline{
                color: red;
                font-weight: bolder;
            }
            .jumbotron .btn{
                font-size: 100%;
                margin-left: 80px;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <?php include '../includes/header.php'; ?>

            <!-- Jumbotron -->
            <div class="jumbotron">
                <?php
                echo $_SESSION['reg_msg'];
                ?>
                <form action="" method="POST" class="form-horizontal" style="padding-left: 15%">
                    <div class="control-group">
                        <label class="control-label" for="name">Full name</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" id="name" placeholder="Full name" name="name" class="span4" required>
                                <span class="add-on"><i class="icon-pencil"></i></span>
                            </div>
                            <span class="help-inline">*</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="username">Username</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="text" id="username" placeholder="Username" name="username" class="span4" required>
                                <span class="add-on"><i class="icon-user"></i></span>
                            </div>
                            <span class="help-inline">*</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email">E-mail</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="email" id="email" placeholder="E-mail" name="email" class="span4" required>
                                <span class="add-on"><i class="icon-envelope"></i></span>
                            </div>
                            <span class="help-inline">*</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="password" id="password" placeholder="Password" name="password" class="span4" required>
                                <span class="add-on"><i class="icon-asterisk"></i></span>
                            </div>
                            <span class="help-inline">*</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="repassword">Re-password</label>
                        <div class="controls">
                            <div class="input-append">
                                <input type="password" id="repassword" placeholder="Password again" name="repassword" class="span4" required>
                                <span class="add-on"><i class="icon-asterisk"></i></span>
                            </div>
                            <span class="help-inline">*</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-primary span2" name="submit">Sign up</button>
                        </div>
                    </div>
                </form>
                <hr>

                <div class="footer">
                    <p>Welcome to Change your mind - Demo by <a href="http://ruinedsec.wordpress.com">ruined-sec</a> | <a href="https://www.twitter.com/lnxg33k">@lnxg33k</a>.</p>
                </div>

            </div> <!-- /container -->

            <!-- Le javascript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="/scope/static/js/jquery.js"></script>
            <script src="/scope/static/js/bootstrap-transition.js"></script>
            <script src="/scope/static/js/bootstrap.min.js"></script>
    </body>
</html>
<?php
$header_hint = '
        <div class="alert alert-error alert-block fade in span6 offset2" align="center">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4><strong>Hello Guest!</strong></h4> All fields are required to complete the registration.
            </div>';
$fields_error = '
        <div class="alert alert-info fade in span6 offset2" align="center">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4><strong>Hello Guest!</strong></h4> Check the fields again.
            </div>';
if (isset($_POST['submit'])) {
    if (
            !empty($_POST['name']) && !empty($_POST['username']) &&
            !empty($_POST['password']) && !empty($_POST['repassword']) &&
            !empty($_POST['email'])
    ) {

        function clean($data, $flags = ENT_QUOTES, $encoding = 'UTF-8') {
            $data = htmlspecialchars($data, $flags, $encoding);
            return mysql_real_escape_string($data);
        }

        $name = clean($_POST['name']);
        $username = clean($_POST['username']);
        $email = clean($_POST['email']);
        $password = clean($_POST['password']);
        $repassword = clean($_POST['repassword']);

        $user_sql = "SELECT * FROM users WHERE username='$username'";
        $mail_sql = "SELECT * FROM users WHERE email='$email'";

        $username_result = mysqli_fetch_assoc(mysqli_query($con, $user_sql));
        $email_result = mysqli_fetch_assoc(mysqli_query($con, $mail_sql));

        if ($username_result['username'] == $username) {
            $reg_msg = '<div class="alert alert-error fade in span6 offset2" align="center">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Sorry!</strong> Username is already taken, choose another one.
                    </div>';
            $_SESSION['reg_msg'] = $reg_msg;
            header("Location: register.php");
        } elseif ($email_result['email'] == $email) {
            $reg_msg = '<div class="alert alert-error fade in span6 offset2" align="center">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Sorry!</strong> E-mail is already taken, choose another one.
                    </div>';
            $_SESSION['reg_msg'] = $reg_msg;
            header("Location: register.php");
        } elseif ($password != $repassword) {
            $reg_msg = '<div class="alert alert-error fade in span6 offset2" align="center">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Sorry!</strong> Passwords don\'t match.
                    </div>';
            $_SESSION['reg_msg'] = $reg_msg;
            header("Location: register.php");
        } else {
            $password = md5($password);
            $confirmation_code = $username . $password . $email;
            $confirmation_code = md5(substr(str_shuffle($confirmation_code), 0, 32));
            $sql = "INSERT INTO users 
                (name, username, email, password, role, confirmation_code) VALUES 
                ('$name', '$username', '$email', '$password', 0, '$confirmation_code')";
            if (!mysqli_query($con, $sql)) {
                $_SESSION['reg_msg'] = '<div class="alert alert-error fade in span6 offset2" align="center">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Sorry!</strong> Something went wrong, try again.
                    </div>';
                header("Location: register.php");
            } else {    // Valid inputs, save the info
                $activation_link = "http://176.9.193.0";
                $activation_link .= "/scope/users/confirmation.php?code=";
                $activation_link .= "$confirmation_code";
                $to = $email;
                $subject = "Complete your PWN-ME registration";
                $headers = "From:  info@pwn-me.org\r\n";
                $headers .= "Reply-To: info@pwn-me.org\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $message = '<html><body>';
                $message .= "<h3>Hello, $username</h3>";
                $message .= "Verify your e-mail address to complete your registration by clicking the link:<br />
$activation_link";
                $message .= "<br />";
                $message .= "After verification you will be able to play some levels on the system e.g. <strong>CSRF</strong>";
                $message .= "<br /><br />";
                $message .= "The <strong>PWN-ME</strong> Team.<hr />";
                $message .= "<small>
If you didn't sign up for a PWN-ME account, just ignore this e-mail or you can delete the account.
This is an automated e-mail message, please do not reply directly. You can contact us by sending an e-mail to info@pwn-me.org.</small>";
                $message .= '</body></html>';
                mail($to, $subject, $message, $headers);
                $_SESSION['msg'] = '<div class="alert alert-success fade in" align="center">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Congrats!</strong> Check you\'re mail inbox to complete registration.
                        </div>';
                header("Location: /scope/users/");
            }
        }
    } else {
        $_SESSION['reg_msg'] = $fields_error;
        session_destroy();
        header("Location: register.php");
    }
} else {
    $_SESSION['reg_msg'] = $header_hint;
}
?>
