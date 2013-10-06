<?php
error_reporting(1);
session_start();
$URI = $_SERVER['REQUEST_URI'];
?>
<div class="masthead">
    <h3 class="muted">
        PWN-ME SYSTEM!
        <span class="pull-right">
            <a href="https://www.twitter.com/ruinedsec"><img src="/scope/static/img/twitter.ico" style="height: 33px;" /></a>
            <a href="https://ruinedsec.wordpress.com"><img src="/scope/static/img/wordpress.ico" style="height: 33px; padding-right: 5px;" /></a>
    </span>
    </h3>
    <!--<h3 class="muted pull-right">Test</h3>-->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav">
                    <?php
                    if ($URI == '/scope/') {
                        echo '<li class="active">';
                    } else {
                        echo '<li>';
                    }
                    ?>
                    <a href="/scope/">Home</a></li>
                    <?php
                    if (preg_match("/\/scope\/exploits\//", $URI)) {
                        echo '<li class="active">';
                    } else {
                        echo '<li>';
                    }
                    ?>    
                    <a href="/scope/exploits/">Exploits</a></li>
                    <?php
                    if (preg_match("/\/scope\/projects\//", $URI)) {
                        echo '<li class="active">';
                    } else {
                        echo '<li>';
                    }
                    ?>    
                    <a href="/scope/projects/" class="<?php echo $class; ?>">Projects</a></li>
                    <?php
                    if (preg_match("/\/scope\/articles\//", $URI)) {
                        echo '<li class="active">';
                    } else {
                        echo '<li>';
                    }
                    ?>      
                    <a href="/scope/articles/">Articles</a></li>
                    <?php
                    if (preg_match("/\/scope\/about\//", $URI)) {
                        echo '<li class="active">';
                    } else {
                        echo '<li>';
                    }
                    ?>     
                    <a href="/scope/about/">About</a></li>
                    <li>
                        <a href="#myModal" data-toggle="modal" data-target="#myModal">Search</a>
                        <!-- Modal -->
                        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Search for an exploit or an article</h3>
                            </div>
                            <form action="/scope/search.php" method="GET" class="form-horizontal">
                                <div class="modal-body">
                                    <div class="control-group">
                                        <label class="control-label" for="q">Search For</label>
                                        <div class="controls">
                                            <input type="text" name="q" required />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="q">Search Type</label>
                                        <div class="controls">
                                            <select name="search_type">
                                                <option selected>-----------</option>
                                                <option value="like">Like Search</option>
                                                <option value="exact">Exact Search</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </li>
                    <?php
                    if ($URI == '/scope/guestbook/') {
                        echo '<li class="active">';
                    } else {
                        echo '<li>';
                    }
                    ?>   
                    <a href="/scope/guestbook/">Contact</a></li>
                </ul>
                <ul class="nav">
                    <li class="dropdown">
                        <!--<li class="divider-vertical"></li>-->
                        <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
                            <?php if ($_SESSION['username']): ?>
                                <i class="icon-user icon-white"></i> <?php echo $_SESSION['username']; ?>
                            <?php else: ?>
                                <i class="icon-user icon-white"></i> Guest !
                            <?php endif; ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php if ($_SESSION['username']): ?>
                                    <a href="/scope/users/logout.php"><i class="icon-off"></i> Logout</a>
                                <?php else: ?>
                                    <a href="/scope/users/"><i class="icon-off"></i> Sign-In</a>
                                    <a href="/scope/users/register.php"><i class="icon-edit"></i> Sign-up</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </div><!-- /.navbar -->
</div>
