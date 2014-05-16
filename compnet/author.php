<?php
/**
 * The template used to display Author Archive pages
 *
 * @package WordPress
 * @subpackage CompNet
 * @since 3.0.0
 */
?><?php include(TEMPLATEPATH.'/header.php'); ?>

        <div class="content">

            <div class="page">

                <?php echo breadcrumbs(); ?>

                <?php the_post(); ?>

                <div <?php post_class(); ?>>

                    <h1 class="title page_title"><?php the_author(); ?></h1>

                    <?php if( get_the_author_meta('description') ) : // If a user has filled out their decscription show a bio on their entries  ?>

                    <div class="author_description">
                        <?php echo '<span class="alignleft author_image">'.get_avatar( get_the_author_meta('user_email') ).'</span>'; ?>
                        <?php the_author_meta('description'); ?>
                        <div class="clear_left"></div>
                    </div>

                    <?php endif; ?>

                    <?php rewind_posts(); ?>

                    <?php get_template_part('loop', 'author'); ?>

                </div>

            </div>

        </div>

<?php include(TEMPLATEPATH.'/footer.php'); ?>
