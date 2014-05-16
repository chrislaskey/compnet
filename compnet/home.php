<?php
/**
 * @package WordPress
 * @subpackage CompNet
 * @since 3.0.0
 */
    
?><?php include(TEMPLATEPATH.'/header.php'); ?>

        <div class="content">

            <div class="page">

                <?php echo breadcrumbs(); ?>

                <h1 class="title post_title">CompNet News</h1>

                <?php get_template_part( 'loop', 'index' ); ?>

            </div>

        </div>

<?php include(TEMPLATEPATH.'/footer.php'); ?>
