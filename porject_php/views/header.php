
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Industries - Industrial Category Bootstrap Responsive Website Template - Home : W3Layouts</title>
    <!-- google-fonts -->
    <link
        href="//fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Teko:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Font-Awesome-Icons-CSS -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg stroke">
                <h1>
                    <a class="navbar-brand d-flex align-items-center" href="home">
                        <i class="fas fa-tools mr-1" aria-hidden="true"></i>Bhargav</a>
                </h1>
                <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item <?php if ($_SERVER['PATH_INFO'] == '/home') {
                            echo "active";} ?>">
                            <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item <?php if ($_SERVER['PATH_INFO'] == '/about') {
                            echo "active";} ?>">
                            <a class="nav-link" href="about">About Us</a>
                        </li>
                        <li class="nav-item <?php if ($_SERVER['PATH_INFO'] == '/services') {
                            echo "active";} ?>">
                            <a class="nav-link" href="services">Services</a>
                        </li>
                        <li class="nav-item <?php if ($_SERVER['PATH_INFO'] == '/contact') {
                            echo "active";} ?>">
                            <a class="nav-link" href="contact">Contact Us</a>
                        </li>
                        <?php
                            if (isset($_SESSION['UserData'])) {?>
                                <li class="nav-item <?php if ($_SERVER['PATH_INFO'] == '/logout') {
                            echo "active";} ?>">
                                <a class="nav-link" href="logout ">Logout</a>
                                </li>
                            <?php }
                                else { ?>
                                <li class="nav-item <?php if ($_SERVER['PATH_INFO'] == '/login') {
                            echo "active";} ?>">
                                <a class="nav-link" href="login">Login</a>
                                </li>
                        <?php } ?>
                        <!-- search button -->
                        <div class="search-right ml-lg-3">
                            <form action="#search" method="GET" class="search-box position-relative">
                                <div class="input-search">
                                    <input type="search" placeholder="Enter Keyword" name="search" required="required"
                                        autofocus="" class="search-popup">
                                </div>
                                <button type="submit" class="btn search-btn"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <!-- //search button -->
                    </ul>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!--//header-->