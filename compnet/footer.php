<?php
/**
 * @package WordPress
 * @subpackage CompNet
 * @since 3.0.0
 */
?>

        <!-- End Content -->

        <!-- Start Sidebar -->

        <?php include(TEMPLATEPATH.'/sidebar.php'); ?>

        <!-- End Sidebar -->

        <div class="clear"></div>

    </div>

    <!-- End Main -->

</div>

<div class="wrapper wrapper_footer">

    <!-- Start Footer -->

    <div class="footer">

        <div id="footer_links_container">
            <div id="footer_bu_logo">
                <a href="http://bu.edu"><img alt="Boston University" src="/wp-content/themes/compnet/images/site/bu.gif" /></a>
            </div>
            <h5 id="footer_title">Boston University<br/>Center for Computational Neuroscience & Neural Technology</h5>
            <ul id="footer_bu_links">
                <li>
                    <a class="external" href="http://www.bu.edu/copyright/">&copy; Copyright</a><?php divider(); ?>
                </li>
                <li>
                    <a class="external" href="http://www.bu.edu/">Boston University</a><?php divider(); ?>
                </li>
                <li>
                    <a class="external" href="http://www.bu.edu/search/">Search</a><?php divider(); ?>
                </li>
                <li>
                    <a class="external" href="http://www.bu.edu/directory/">Directory</a><?php divider(); ?>
                </li>
                <li>
                    <a class="external" href="http://www.bu.edu/maps/">Maps</a>
                </li>
            </ul>

            <ul id="footer_links">
                <li>
                    <a class="responsive" href="#">Mobile <?php echo RESPONSIVE ? 'on' : 'off'; ?></a><?php divider(); ?>
                </li>
                <li>
                    <a class="help" href="/help">Help</a><?php divider(); ?>
                </li>
                <li>
                    <a class="login" href="/wp-admin">Login</a>
                </li>
            </ul>
        </div>

        <div class="clear"></div>

    </div>

</div>

<!-- End Footer -->

</body>
</html>
