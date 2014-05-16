<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package WordPress
 * @subpackage CompNet
 * @since 3.0.0
 */
?><?php include(TEMPLATEPATH.'/header.php'); ?>

        <div class="content">

            <div class="page">

                <?php echo breadcrumbs(); ?>

                <h1 class="header_title"><?php printf('tag: %s', '<span>'.single_tag_title('', false).'</span>'); ?></h1>

                <?php the_post(); ?>

                <?php rewind_posts(); ?>

                <?php get_template_part('loop', 'tag'); ?>

            </div>

        </div>

<?php include(TEMPLATEPATH.'/footer.php'); ?>
