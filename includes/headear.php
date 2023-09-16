<?php
$base_url = "http://localhost/Gallery-app/";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog-Z Bootstrap 5.0 HTML Template</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/templatemo-style.css">
<!--
    
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->
</head>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $base_url ?>">
                <i class="fas fa-film mr-2"></i>
               Gallery           </a>
 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['user_idd'])) { ?>
                        <!-- User is logged in -->
                        <li class="nav-item">
                            <a class="nav-link nav-link-1 active" href="<?php echo $base_url; ?>">Photos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-1 active"  href="<?php echo $base_url.'media/addmedia.php'; ?>">Add media </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link nav-link-1 active"  href="<?php echo $base_url.'categories'; ?>">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-1" href="<?php echo $base_url.'subcategories'; ?>">Subcategories</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link nav-link-1 active"  href="<?php echo $base_url.'Auth/logout.php'; ?>">logout</a>
                        </li>
                    <?php } else { ?>
                        <!-- User is not logged in -->
                        <li class="nav-item">
                        <a class="nav-link nav-link-1 active"  href="<?php echo $base_url.'Auth/register.php'; ?>">register</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link nav-link-1 active"  href="<?php echo $base_url.'Auth/login.php'; ?>">login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>                </ul>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
