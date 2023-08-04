<!doctype html>
<html lang="en">

<head>
    <?php
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('homebtn');
    wp_enqueue_style('fonts');
    wp_enqueue_style('main');
    wp_enqueue_style('slick');
    wp_enqueue_style('slick-theme');
    wp_head();
    ?>
</head>

<body>
    <!-- Header Starts Here -->
    <header>
        <div class="container">
            <div class="bttn-container">
                <?php
                $user = wp_get_current_user()->roles[0];
                if (!is_user_logged_in()) {
                ?>

                    <a href="<?php echo site_url() . '/login/' ?>" id="login_bttn">Login</a>
                    <a href="<?php echo site_url() . '/create-new-account/' ?>" id="register_bttn">Register</a>
                <?php } else { ?>
                    <?php if ($user == 'blogger') { ?>
                        <a href="<?php echo admin_url() ?>" id="dashboard_bttn">Dashboard</a>
                    <?php } ?>
                    <a href="<?php echo wp_logout_url(home_url()); ?>" id="logout_bttn">Logout</a>
                <?php } ?>
            </div>
            <div class="header">
                <!-- Logo Starts Here -->
                <a href="index.html">
                    <img src="<?php echo get_template_directory_uri() . '/images/header-logo.svg' ?>" alt="logo">
                </a>
                <!-- Logo Ends Here -->

                <!-- Mobile Menu Starts Here -->
                <div class="menu-btn">
                    <div class="menu-btn-lines">

                    </div>
                </div>
                <!-- Mobile Menu Ends Here -->

                <!-- Menu Starts Here -->
                <div class="main-menu d-none d-lg-flex">
                    <?php
                    wp_nav_menu(array(
                        'Theme Location' => 'primary-menu',
                        'menu_class'     => 'main-menu-items list-unstyled'
                    ));
                    ?>
                    <form action="<?php echo site_url().'/searched-posts'; ?>" method="get" class="header-searchbar">
                        <input type="text" name="search" placeholder="Search here...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </form>
                </div>
                <!-- Menu Items Ends Here -->
            </div>
        </div>
    </header>
    <!-- Header Ends Here -->
    <?php
    if (is_home()) {
        $location = get_template_directory_uri() . '/images/';
    ?>
        <!-- Banner Starts Here -->
        <section class="banner" style="background-color: #F5F5F5; background-image: url(<?php echo $location . 'banner.jpg' ?>); background-position: right; background-repeat: no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner-slider">
                            <?php
                            $posts = get_post_type_data('slider-content', -1);
                            $i = 0;
                            foreach ($posts as $post) {
                                $tag_obj = get_the_tags($post['id']);
                                $tag_name = $tag_obj[0]->name;
                            ?>
                                <div class="banner-content slick-slide">
                                    <div class="banner-content-main">
                                        <span class="fs-6 has-line"><?php echo $tag_name ?></span>
                                        <h4><a href="<?php echo site_url().'/full-article'?>"><?php echo $post['title'] ?></a></h4>
                                        <div class="blog-date">
                                            <div class="blog-date-start">
                                                <span>March 25, 2021</span>
                                            </div>
                                            <div class="blog-date-end">
                                                <span>4 min read</span>
                                            </div>
                                        </div>
                                        <p>
                                            <?php echo $post['content'] ?>
                                        </p>
                                        <a href="<?php echo site_url().'/full-article'?>" class="btn btn-default">Read More</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Ends Here -->
    <?php } //if end 
    ?>