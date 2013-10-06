<?php

session_start();
include '../config.php';

$confirmation_code = mysql_real_escape_string($_GET['code']);
$sql = "SELECT * FROM users WHERE confirmation_code='$confirmation_code'";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_assoc($query);
if ($result && $confirmation_code) {
    if ($result['is_active']) {
        $_SESSION['msg'] = '
            <div class="alert alert-info fade in" align="center">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Hey!</strong> your account is already active, please sign-in.
            </div>
            ';
        header("Location: /scope/users/");
    } else {
        $sql = "UPDATE users SET is_active=1 WHERE confirmation_code='$confirmation_code'";
        $query = mysqli_query($con, $sql);
        if ($query) {
            $_SESSION['msg'] = '
            <div class="alert alert-success fade in" align="center">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Congrats!</strong> successfully activated the account.
            </div>
            ';
            header("Location: /scope/users/");
        } else {
            print "Something went wrong";
        }
    }
} else {
    $_SESSION['msg'] = '
            <div class="alert alert-error fade in" align="center">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Error!</strong> wrong varification code.
            </div>
            ';
    header("Location: /scope/users/");
}
?>