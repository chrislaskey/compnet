<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage CompNet
 * @since 3.0.0
 */
?><?php include(TEMPLATEPATH.'/header.php'); ?>

        <div class="content">

            <div class="page">

                <?php echo breadcrumbs(); ?>

                <h1 class="title page_title">Page Not Found</h1>
                <p>The page you requested could not be found. From here you can return to the <a href="<?php echo home_url('/'); ?>">homepage</a> or try using the search form below.</p>
                <?php get_search_form(); ?>

                <script type="text/javascript">

                    //focus on search field after it has loaded
                    document.getElementById('s') && document.getElementById('s').focus();

                </script>

            </div>

        </div>

<?php include(TEMPLATEPATH.'/footer.php'); ?>
