<?php
/**
 * The Sidebar containing the primary and secondary widget areas
 *
 * @package WordPress
 * @subpackage CompNet
 * @since 3.0.0
 */

?>

    <div class="sidebar">

        <?php if( ! preg_match('/^\?s/', $uri[0]) ): //If not search ?>

        <div class="navigation">

            <h4 class="section"><?php echo ucwords($uri[0]); ?></h4>

            <?php

                if( isset($uri[0]) ){

                    if( $uri[0] == 'about' ){

                        wp_nav_menu( array(
                            'container' => 'false',
                            'fallback_cb' => 'false',
                            'menu_class' => 'sidenav menu_sidenav sidenav menu_sidenav_about',
                            'theme_location' => 'sidenav_about'
                        ));

                    }elseif( $uri[0] == 'services' ){

                        wp_nav_menu( array(
                            'container' => 'false',
                            'fallback_cb' => 'false',
                            'menu_class' => 'sidenav menu_sidenav sidenav menu_sidenav_services',
                            'theme_location' => 'sidenav_services'
                        ));

                    }elseif( $uri[0] == 'research' ){

                        wp_nav_menu( array(
                            'container' => 'false',
                            'fallback_cb' => 'false',
                            'menu_class' => 'sidenav menu_sidenav sidenav menu_sidenav_research',
                            'theme_location' => 'sidenav_research'
                        ));

                    }elseif( $uri[0] == 'people' ){

                        wp_nav_menu( array(
                            'container' => 'false',
                            'fallback_cb' => 'false',
                            'menu_class' => 'sidenav menu_sidenav sidenav menu_sidenav_people',
                            'theme_location' => 'sidenav_people'
                        ));

                    }elseif( $uri[0] == 'affiliates' ){

                        wp_nav_menu( array(
                            'container' => 'false',
                            'fallback_cb' => 'false',
                            'menu_class' => 'sidenav menu_sidenav sidenav menu_sidenav_affiliates',
                            'theme_location' => 'sidenav_affiliates'
                        ));

                    }elseif( $uri[0] == 'events' ){

                        wp_nav_menu( array(
                            'container' => 'false',
                            'fallback_cb' => 'false',
                            'menu_class' => 'sidenav menu_sidenav sidenav menu_sidenav_events',
                            'theme_location' => 'sidenav_events'
                        ));

                    }elseif( $uri[0] == 'news' ){

                        wp_nav_menu( array(
                            'container' => 'false',
                            'fallback_cb' => 'false',
                            'menu_class' => 'sidenav menu_sidenav sidenav menu_sidenav_news',
                            'theme_location' => 'sidenav_news'
                        ));

                    }elseif( $uri[0] == 'contact' ){

                        wp_nav_menu( array(
                            'container' => 'false',
                            'fallback_cb' => 'false',
                            'menu_class' => 'sidenav menu_sidenav sidenav menu_sidenav_contact',
                            'theme_location' => 'sidenav_contact'
                        ));

                    }elseif( $uri[0] == 'links' ){

                        wp_nav_menu( array(
                            'container' => 'false',
                            'fallback_cb' => 'false',
                            'menu_class' => 'sidenav menu_sidenav sidenav menu_sidenav_links',
                            'theme_location' => 'sidenav_links'
                        ));

                    }elseif( $uri[0] == 'help' ){

                        wp_nav_menu( array(
                            'container' => 'false',
                            'fallback_cb' => 'false',
                            'menu_class' => 'sidenav menu_sidenav sidenav menu_sidenav_help',
                            'theme_location' => 'sidenav_help'
                        ));

                    }

                }

                /*
                <!-- Search -->
                <?php //get_search_form(); ?>
                */

            ?>

        </div>

        <?php endif; ?>

        <?php if( is_active_sidebar('sidebar-widget-area') ): ?>

            <ul class="widget-area">
                <?php dynamic_sidebar('sidebar-widget-area'); ?>
            </ul>

        <?php endif; ?>

    </div>
