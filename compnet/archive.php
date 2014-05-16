<?php
/**
 * Generic template for Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage CompNet
 * @since 3.0.0
 */

?><?php include(TEMPLATEPATH.'/header.php'); ?>

        <div class="content">

            <div class="page">

                <?php echo breadcrumbs(); ?>

                <?php if ( is_day() ) : ?>

                    <h1 class="header_title"><?php printf( 'daily archives: <span>%s</span>', get_the_date() ); ?></h1>

                <?php elseif ( is_month() ) : ?>

                    <h1 class="header_title"><?php printf( 'monthly archives: <span>%s</span>', get_the_date('F Y') ); ?></h1>

                <?php elseif ( is_year() ) : ?>

                    <h1 class="header_title"><?php printf( 'yearly archives: <span>%s</span>', get_the_date('Y') ); ?></h1>

                <?php else : ?>

                    <h1 class="header_title">blog archives</h1>

                <?php endif; ?>

                <?php the_post(); ?>

                <?php rewind_posts(); ?>

                <?php get_template_part( 'loop', 'archive' ); ?>

            </div>

        </div>

<?php include(TEMPLATEPATH.'/footer.php'); ?>
