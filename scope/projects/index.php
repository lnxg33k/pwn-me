<?php
error_reporting(1);
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

    </head>

    <body>

        <div class="container">

            <?php include '../includes/header.php'; ?>

            <!-- Jumbotron -->
            <div class="jumbotron">
                <?php
                $sql = "SELECT * FROM projects";
                $result = mysqli_query($con, $sql);
                $c = 0;
                ?>
                <ul class="nav nav-tabs" id="myTab">

                    <?php while ($row = mysqli_fetch_array($result)): ?>
                        <?php if ($c == 0): ?>
                            <li class="tab-pane active"><a href="<?php echo '#' . $row['name']; ?>" data-toggle="tab"><?php echo $row['name']; ?></a></li>
                        <?php else: ?>
                            <li><a href="<?php echo '#' . $row['name']; ?>" data-toggle="tab"><?php echo $row['name']; ?></a></li>
                        <?php endif ?>
                        <?php $c++; ?>
                    <?php endwhile; ?>
                </ul>
                <?php
                $result = mysqli_query($con, $sql);
                $c = 0;
                ?>
                <div class="tab-content">
                    <?php while ($row = mysqli_fetch_array($result)): ?>
                        <?php if ($c == 0): ?>
                            <div class="tab-pane fade in active" id="<?php echo $row['name']; ?>">
                            <?php else: ?>
                                <div class="tab-pane fade in" id="<?php echo $row['name']; ?>">
                                <?php endif; ?>
                                    <pre><p class="text-success" style="font-size: 15px">Project Github Page <a href="<?php echo $row['url'] ?>">Here</a></p><?php echo htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8', false); ?></pre>
                            </div>
                            <?php $c++; ?>
                        <?php endwhile; ?>
                    </div>

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
            <script src="/scope/static/js/bootstrap-transition.js"></script>
            <script src="/scope/static/js/bootstrap.min.js"></script>
    </body>
</html>
