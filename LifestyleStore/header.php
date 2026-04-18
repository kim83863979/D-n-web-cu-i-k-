<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

        <!-- LOGO -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="index.php" class="navbar-brand" style="display:flex; align-items:center;">
                <img src="img/logo.png" style="height:30px; margin-right:8px;">
                Lifestyle Store
            </a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">

            <!-- SEARCH -->
            <form class="navbar-form navbar-left" action="search.php" method="GET" style="margin-left:20px;">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Tìm sản phẩm...">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-danger">Tìm</button>
                    </span>
                </div>
            </form>

            <!-- MENU -->
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['email'])){ ?>
                    <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                    <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php } else { ?>
                    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } ?>
            </ul>

        </div>
    </div>
</nav>