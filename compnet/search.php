<?php
/**
 * The Search Results template
 *
 * @package WordPress
 * @subpackage CompNet
 * @since 3.0.0
 */
?><?php include(TEMPLATEPATH.'/header.php'); ?>

        <div class="content">

            <div class="page">

                <?php echo breadcrumbs(); ?>

                <?php if( have_posts() ): ?>

                    <h1 class="title page_title"><?php printf('Search Results for: %s', '<span>'.get_search_query().'</span>'); ?></h1>
                    <?php get_template_part( 'loop', 'search' ); ?>

                <?php else: ?>

                    <div class="page no_search_results">

                        <h1 class="title page_title">No Results Found</h1>

                        <div class="post_content">
                            <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
                            <?php get_search_form(); ?>
                        </div>

                    </div>

                <?php endif; ?>

            </div>

        </div>

<?php include(TEMPLATEPATH.'/footer.php'); ?>
