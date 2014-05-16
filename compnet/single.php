<?php
/**
 * The Template used to display all single posts
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

                <h1 class="title post_title"><?php the_title(); ?></h1>

                <div class="post_header">
                    <!--<span class="author">By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>&nbsp;|&nbsp;--><span class="date"><?php echo get_the_date(); ?></span>
                </div>

                <div class="post_content">
                    <?php the_content(); ?>
                    <?php wp_link_pages( array( 'before' => '<div class="page_link">Pages:', 'after' => '</div>' ) ); ?>
                </div>

                <?php if( get_the_author_meta('description') != NULL ): // If a user has filled out their decscription show a bio on their entries  ?>

                    <div class="author_description author_description_post">
                        <div class="author_description">
                            <h4>About <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php the_author(); ?></a></h4>
                            <?php echo '<span class="alignleft author_image">'.get_avatar( get_the_author_meta('user_email') ).'</span>'; ?>
                            <?php the_author_meta('description'); ?>
                            <div class="clear_left"></div>
                        </div>
                    </div>

                <?php endif; ?>

                <div class="post_information">

                    <?php if( have_comments() || comments_open() ): ?>

                        <div class="comments_link">Comments: <?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?></div>

                    <?php endif; ?>

                    <?php if( $categories = cat_list() ): ?>

                        <!--<div class="categories_list"><?php echo $categories; ?></div>-->

                    <?php endif; unset($categories); ?>

                    <?php if( $tags = tag_list() ): ?>

                        <div class="tag_list"><?php echo $tags; ?></div>

                    <?php endif; unset($tags); ?>

                    <div class="clear_left"></div>

                </div>

                <div class="nav_below">
                    <div class="nav_previous"><?php previous_post_link('%link', '<span class="meta-nav">&laquo;</span> %title'); ?></div>
                    <div class="nav_next"><?php next_post_link('%link', '%title <span class="meta-nav">&raquo;</span>'); ?></div>
                </div>

                <?php comments_template( '', true ); ?>

            </div>

        </div>

<?php include(TEMPLATEPATH.'/footer.php'); ?>
