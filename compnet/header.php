<?php
/**
 * @package WordPress
 * @subpackage CompNet
 * @since 3.0.0
 */

    include('functions-head.php');

?><!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="icon" type="image/x-icon" href="/favicon.png" />

    <title><?php echo (isset($uri) && count($uri) > 0 ) ? create_page_title($uri) : 'CompNet'; ?></title>

    <!-- Start WP Head -->
    <?php //wp_head(); ?>
    <!-- End WP Head -->

    <?php if( RESPONSIVE === TRUE ): ?>
    <link rel="stylesheet" href="/wp-content/themes/compnet/css/init-responsive.css" media="all"/>
    <!-- Internet Explorer support for media queries -->
    <!--[if lt IE 9]>
        <script src="/wp-content/themes/compnet/js/respond.js"></script>
    <![endif]-->
    <?php else: ?>
    <link rel="stylesheet" href="/wp-content/themes/compnet/css/init-fixed.css" media="all"/>
    <?php endif; ?>

    <script type="text/javascript" src="/wp-content/themes/compnet/js/library.js"></script>
    <script type="text/javascript" src="/wp-content/themes/compnet/js/common.js"></script>

    <?php if(isset($uri) && empty($uri)): ?>

        <?php

            $homepage_images = return_files(HOMEPAGE_IMAGES_DIR, FALSE);
            echo '<style type="text/css">'."\n\t\t\t";
            foreach($homepage_images as $image){
                $class = substr($image, 0, strpos($image, '.'));
                echo "ul.banner_section_01 li.banner_".$class."{ background:#000 url('".HOMEPAGE_IMAGES_DIR.$image."') 0px 0px no-repeat; }\n\t\t\t";
                echo "ul.banner_section_02 li.banner_".$class."{ background:#000 url('".HOMEPAGE_IMAGES_DIR.$image."') -301px 0px no-repeat; }\n\t\t\t";
                echo "ul.banner_section_03 li.banner_".$class."{ background:#000 url('".HOMEPAGE_IMAGES_DIR.$image."') -602px 0px no-repeat; }\n\t\t\t";
            }
            echo '</style>';

        ?>

    <?php endif; ?>

    <!-- Page content generated on <?php echo date("F j, Y, g:i:s a", @mktime()); ?> -->

</head>

<body <?php body_class(' page-'.implode(' page-', $uri)); ?>>

<div class="wrapper wrapper_header">

    <!-- Start Header -->

    <div class="header">

        <a class="logo-left" href="/">CompNet, Boston University Center for Computational Neuroscience and Neural Technology</a>

        <a class="logo-right" href="/">CompNet, Boston University Center for Computational Neuroscience and Neural Technology</a>

    </div>

    <!-- End Header -->

</div>

<div class="wrapper wrapper_banner">

    <!-- Start Banner -->

    <div class="banner">

        <ul class="nav">
            <li class="first nav_pulldown">
                <a class="nav_pulldown" href="#">Navigation</a>
                <div class="sub_nav_container">
                    <ul id="menu-about" class="sub_nav">
                        <li class="menu-item menu-item-type-post_type">
                            <a href="/">Home</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type">
                            <a href="/about">About</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type">
                            <a href="/services">Services</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type">
                            <a href="/research">Research</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type">
                            <a href="/people">People</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type">
                            <a href="/affiliates">Affiliates</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type">
                            <a href="/events">Events</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type">
                            <a href="/news">News</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type">
                            <a href="/contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="first nav_home <?php if(!isset($uri[0]) || $uri[0] == '/'){ echo 'selected'; } ?>">
                <a class="nav_home" href="<?php echo home_url('/'); ?>">Home</a>
            </li>
            <li class="nav_about <?php if(isset($uri[0]) && $uri[0] == 'about'){ echo 'selected'; } ?>">
                <a class="nav_about" href="<?php echo home_url('/about'); ?>">About</a>
                <?php
                    $main_nav = wp_nav_menu( array('menu' => 'about', 'echo' => FALSE, 'sort_column' => 'menu_order', 'menu_class' => 'sub_nav', 'container' => 'div', 'container_class' => 'sub_nav_container') );
                    $main_nav = str_replace(' target="_self"', '', $main_nav);
                    echo $main_nav;
                ?>
            </li>
            <li class="nav_services <?php if(isset($uri[0]) && $uri[0] == 'services'){ echo 'selected'; } ?>">
                <a class="nav_services" href="<?php echo home_url('/services'); ?>">Services</a>
                <?php
                    $main_nav = wp_nav_menu( array('menu' => 'services', 'echo' => FALSE, 'sort_column' => 'menu_order', 'menu_class' => 'sub_nav', 'container' => 'div', 'container_class' => 'sub_nav_container') );
                    $main_nav = str_replace(' target="_self"', '', $main_nav);
                    echo $main_nav;
                ?>
            </li>
            <li class="nav_research <?php if(isset($uri[0]) && $uri[0] == 'research'){ echo 'selected'; } ?>">
                <a class="nav_research" href="<?php echo home_url('/research'); ?>">Research</a>
                <?php
                    $main_nav = wp_nav_menu( array('menu' => 'research', 'echo' => FALSE, 'sort_column' => 'menu_order', 'menu_class' => 'sub_nav', 'container' => 'div', 'container_class' => 'sub_nav_container') );
                    $main_nav = str_replace(' target="_self"', '', $main_nav);
                    echo $main_nav;
                ?>
            </li>
            <li class="nav_people <?php if(isset($uri[0]) && $uri[0] == 'people'){ echo 'selected'; } ?>">
                <a class="nav_people" href="<?php echo home_url('/people'); ?>">People</a>
                <?php
                    $main_nav = wp_nav_menu( array('menu' => 'people', 'echo' => FALSE, 'sort_column' => 'menu_order', 'menu_class' => 'sub_nav', 'container' => 'div', 'container_class' => 'sub_nav_container') );
                    $main_nav = str_replace(' target="_self"', '', $main_nav);
                    echo $main_nav;
                ?>
            </li>
            <li class="nav_affiliates <?php if(isset($uri[0]) && $uri[0] == 'affiliates'){ echo 'selected'; } ?>">
                <a class="nav_affiliates" href="<?php echo home_url('/affiliates'); ?>">Affiliates</a>
                <?php
                    $main_nav = wp_nav_menu( array('menu' => 'affiliates', 'echo' => FALSE, 'sort_column' => 'menu_order', 'menu_class' => 'sub_nav', 'container' => 'div', 'container_class' => 'sub_nav_container') );
                    $main_nav = str_replace(' target="_self"', '', $main_nav);
                    echo $main_nav;
                ?>
            </li>
            <li class="nav_events <?php if(isset($uri[0]) && $uri[0] == 'events'){ echo 'selected'; } ?>">
                <a class="nav_events" href="<?php echo home_url('/events'); ?>">Events</a>
                <?php
                    $main_nav = wp_nav_menu( array('menu' => 'events', 'echo' => FALSE, 'sort_column' => 'menu_order', 'menu_class' => 'sub_nav', 'container' => 'div', 'container_class' => 'sub_nav_container') );
                    $main_nav = str_replace(' target="_self"', '', $main_nav);
                    echo $main_nav;
                ?>
            </li>
            <li class="nav_news <?php if(isset($uri[0]) && $uri[0] == 'news'){ echo 'selected'; } ?>">
                <a class="nav_news" href="<?php echo home_url('/news'); ?>">News</a>
                <?php
                    $main_nav = wp_nav_menu( array('menu' => 'news', 'echo' => FALSE, 'sort_column' => 'menu_order', 'menu_class' => 'sub_nav', 'container' => 'div', 'container_class' => 'sub_nav_container') );
                    $main_nav = str_replace(' target="_self"', '', $main_nav);
                    echo $main_nav;
                ?>
            </li>
            <li class="nav_contact <?php if(isset($uri[0]) && $uri[0] == 'contact'){ echo 'selected'; } ?>">
                <a class="nav_contact" href="<?php echo home_url('/contact'); ?>">Contact</a>
                <?php
                    $main_nav = wp_nav_menu( array('menu' => 'contact', 'echo' => FALSE, 'sort_column' => 'menu_order', 'menu_class' => 'sub_nav', 'container' => 'div', 'container_class' => 'sub_nav_container') );
                    $main_nav = str_replace(' target="_self"', '', $main_nav);
                    echo $main_nav;
                ?>
            </li>
            <li class="nav_search">
                <?php get_search_form(); ?>
            </li>
        </ul>

        <h3><?php echo ( isset($uri[0]) ) ? $uri[0] : 'CompNet'; ?></h3>

    </div>

    <!-- End Banner -->

</div>

<div class="wrapper wrapper_main">

    <!-- Start Main -->

    <div class="main">

        <!-- Start Content -->

