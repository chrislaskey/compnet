<?php
/**
 * The template used to display Category Archive pages
 *
 * @package WordPress
 * @subpackage CompNet
 * @since 3.0.0
 */
?><?php include(TEMPLATEPATH.'/header.php'); ?>

        <div class="content">

            <div class="page">

                <?php echo breadcrumbs(); ?>

                <h1 class="header_title"><?php single_cat_title(''); ?></h1>

                <?php if( $description = category_description() ){ echo $description; } ?>

                <?php get_template_part( 'loop', 'category' ); ?>

            </div>

        </div>

<?php include(TEMPLATEPATH.'/footer.php'); ?>
