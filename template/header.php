<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <div class="col-sm-7">
            <h1>
                <a href="index.php" style="text-decoration: none;color:whitesmoke;">Student Management System</a>
            </h1>
        </div>
        <div class="collapse navbar-collapse col-sm-6">
            <div class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['student']) || isset($_SESSION['teacher'])) { ?>
                <a class="nav-item btn btn-danger" href="userprofile.php" style="margin-right: 7px;">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    &nbsp;Profile
                </a>
                <a class="nav-item btn btn-danger" href="template/logout.php">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    &nbsp;Logout
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>
<br>