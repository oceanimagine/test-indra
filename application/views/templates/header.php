<!doctype html>
<html lang="en">

<head>
    <title>COVID-19 JAKARTA PUSAT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>fonts/flaticon-covid/font/flaticon.css">

    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/aos.css">

    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>


    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <header class="site-navbar light js-sticky-header site-navbar-target" role="banner">

            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-xl-2">
                        <div class="mb-0 site-logo"><a href="index.html" class="mb-0">Covid<span class="text-primary">.</span> </a></div>
                    </div>

                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">

                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li class="<?= isset($is_home) ? "active" : "" ?>"><a href="<?= site_url('Home') ?>" class="nav-link">Home</a></li>
                                <!-- <li class="has-children">
                                    <a href="prevention.html" class="nav-link">Prevention</a>
                                    <ul class="dropdown">
                                        <li><a href="#" class="nav-link">Stay at home</a></li>
                                        <li><a href="#" class="nav-link">Keep social distancing</a></li>
                                        <li><a href="#" class="nav-link">Wear facemasl</a></li>
                                        <li><a href="#" class="nav-link">Wash your hands</a></li>
                                        <li class="has-children">
                                            <a href="#">More Links</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Menu One</a></li>
                                                <li><a href="#">Menu Two</a></li>
                                                <li><a href="#">Menu Three</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li> -->
                                <!-- <li><a href="symptoms.html" class="nav-link">Symptoms</a></li> -->
                                <li class="<?= isset($is_about) ? "active" : "" ?>"><a href="<?= site_url('Home/about') ?>" class="nav-link">About</a></li>


                                <!-- <li class="<?= isset($is_blog) ? "active" : "" ?>"><a href="<?= site_url('Home/blog') ?>" class="nav-link">Blog</a></li> -->
                                <li class="<?= isset($is_contact) ? "active" : "" ?>"><a href="<?= site_url('Home/contact') ?>" class="nav-link">Contact</a></li>
                                <li><a href="<?= site_url('Login') ?>" class="nav-link"><i class="fas fa-sign-in-alt"></i> Sign In</a></li>
                            </ul>
                        </nav>
                    </div>


                    <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3 text-black"></span></a></div>

                </div>
            </div>

        </header>