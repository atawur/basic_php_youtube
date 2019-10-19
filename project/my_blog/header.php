<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Blog Details</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/fonts/flat-icon/flaticon.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->


    <!-- Header Area Starts -->
    <header>
        <div class="blog-top">
            <div class="top_menu row m-0">
                <div class="container">
                    <div class="float-left">
                        <ul class="list header_social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                    <div class="float-right">
                        <a class="dn_btn" href="tel:+4400123654896">+440 012 3654 896</a>
                        <a class="dn_btn" href="mailto:support@colorlib.com">support@colorlib.com</a>
                    </div>
                </div>	
            </div>
        </div>
        <div class="header-area blog-menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo-area">
                            <a href="index.html"><img src="assets/images/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="custom-navbar">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>  
                        <div class="main-menu">
                            <ul>
                                <li class="active"><a href="index.html">home</a></li>
                                <li><a href="about.html">about us</a></li>
                                <li><a href="job-category.html">category</a></li>
                                <li><a href="#">blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-home.html">Blog Home</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">contact</a></li>
                                <li><a href="#">pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="job-search.html">Job Search</a></li>
                                        <li><a href="job-single.html">Job Single</a></li>
                                        <li><a href="pricing-plan.html">Pricing Plan</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                    </ul>
                                </li>
                                <li class="menu-btn">    
                                <?php if(!isset($_SESSION['users_id'])){?>       
                                    <a href="login.php" class="login">log in</a>
                                    <a href="registration.php" class="template-btn">sign up</a>
                                <?php } else{?>
                                    <a href="profile.php" >Profile</a>
                                    <a href="logout.php" class="template-btn">Logout</a>
                                <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->