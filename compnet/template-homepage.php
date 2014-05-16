<?php
/**
 *
 * Template Name: Homepage
 * @package WordPress
 * @subpackage CompNet
 * @since 3.0.0
 */

?><?php include(TEMPLATEPATH.'/header.php'); ?>

        <div class="content">

            <!-- Start Banner Script -->

            <script type="text/javascript">

            var banner_time;
            var banner_total;
            var banner_height;

            jQuery(function(){

                banner_time = 6000;
                banner_total = jQuery('ul.banner_section').eq(0).children('li').length;
                banner_height = jQuery('#banner_container').height();
                setTimeout(function(){next_banner(0)}, 3000);

                setTimeout(open_banner_text, 350);
                jQuery('#banner_teaser').hide();
                jQuery('#banner_teaser')
                    .unbind('click')
                    .bind('click', function(){
                        open_banner_text();
                        return false;
                    });
                jQuery('.close_banner_text')
                    .unbind('click')
                    .bind('click', function(){
                        close_banner_text();
                        return false;
                    });
            });

            function open_banner_text(){

                jQuery('#banner_teaser').hide(100, function(){
                    jQuery('#banner_text').animate({'bottom':'0px'}, 500, 'easeOutSine');
                });

            }

            function close_banner_text(){

                jQuery('#banner_text').animate({'bottom':'-' + banner_height + 'px'}, 500, 'easeInSine', function(){
                    jQuery('#banner_teaser').fadeIn(100);
                });

            }

            function next_banner(i){

                i = ( i == (banner_total-1) ) ? 0 : i+1;
                setTimeout(function(){next_banner(i)}, banner_time);

                var banner_sections = jQuery('ul.banner_section');

                banner_sections.each(function(e){

                    var banners = jQuery(this).children('li.banner');
                    var banner = banners.eq(i);

                    if( !banner.hasClass('selected') ){

                        //Remove Selected State
                        banners.each(function(){
                            if( jQuery(this).hasClass('selected') ){
                                jQuery(this)
                                    .removeClass('selected')
                                    .addClass('bottom');
                            }else{
                                if( jQuery(this).hasClass('bottom') ){
                                    jQuery(this).removeClass('bottom');
                                }
                                jQuery(this).css('top', '-400px');
                            }
                        });

                        //Add Selected Class
                        banner.addClass('selected');

                        //Call Banner Down
                        if( e == 1 ){
                            banner.css('top', '400px');
                        }
                        //230
                        banner.delay(0).animate({'top':'0px'}, 500, 'easeOutSine');
                    }

                });

            }

            </script>

            <!-- End Banner Script -->

            <div id="banner_container">
                <?php

                    $homepage_images = return_files(HOMEPAGE_IMAGES_DIR, FALSE);
                    shuffle($homepage_images);
                    if( count($homepage_images) > 5 ){
                        $homepage_images = array_slice($homepage_images, 0, 5);
                    }
                    $homepage_image_items = array();
                    foreach($homepage_images as $image){
                        $class = substr($image, 0, strpos($image, '.'));
                        if( ! isset($attributes) ){
                            $attributes = 'class="banner banner_'.$class.' '.$selected.'" style="top:0px;"';
                        }else{
                            $attributes = 'class="banner banner_'.$class.'"';
                        }
                        $homepage_image_items[] = '<li '.$attributes.'>&nbsp;</li>';
                    }
                    $homepage_image_item_list = implode("\n\t\t", $homepage_image_items);

                ?>
                <ul class="banner_section banner_section_01">
                    <?php echo $homepage_image_item_list; ?>
                </ul>
                <ul class="banner_section banner_section_02">
                    <?php echo $homepage_image_item_list; ?>
                </ul>
                <ul class="banner_section banner_section_03">
                    <?php echo $homepage_image_item_list; ?>
                </ul>
                <div id="banner_text">

                    <p>The <strong>Center for Computational Neuroscience and Neural Technology (CompNet)</strong> is an interdisciplinary research center at Boston University that fosters <strong>collaborative research and education on mechanisms of neural computation and their applications</strong>.</p>

                    <a class="learn_more" href="/about">Learn More</a>
                    <a class="close_banner_text" href="#">Close Window</a>

                </div>
                <a href="#" id="banner_teaser">
                    Learn More
                </a>
            </div>

            <?php //the_post(); ?>

            <div class="clear"></div>

            <ul class="buckets">

                <?php

                    display_buckets(3);

                ?>

                <?php

                    function display_buckets($total = 3){
                        // Display n number of buckets.
                        // For a given bucket:
                        //  - Check if a valid user defined callout box exists in position n
                        //  - If not, display a news item.
                        $per_row = 3;
                        for($i = 1; $i <= $total; $i++){
                            if( return_user_callout($i) ){
                                $bucket_content = return_user_callout($i);
                            }else{
                                $bucket_content = return_news_callout();
                            }

                            $class = 'bucket-'.$i;
                            if( $i % $per_row  === 0 ){ $class .= ' last_in_row'; }
                            print_bucket($bucket_content, $class);
                        }
                    }

                    function return_user_callout($index){
                        $custom_fields = get_post_custom();
                        $callout_position = 'callout_position_' . $index;

                        if( ! isset($custom_fields[$callout_position]) ){
                            return NULL;    
                        }

                        $user_callout = $custom_fields[$callout_position][0];
                        if( ! verify_user_callout($user_callout) ){
                            return NULL;
                        }

                        return $user_callout;
                    }

                        function verify_user_callout($callout_to_test){
                            // Verify a callout box contains all required elements using a simple
                            // strpos check. Returns boolean.
                            $required_elements = array(
                                '<h5', '</h5>',
                                '<h3', '</h3>',
                                '<p', '</p>'
                            );
                            foreach( $required_elements as $element ){
                                if( strpos($callout_to_test, $element) === FALSE ){ return FALSE; }
                            }
                            return TRUE;
                        }

                    function return_news_callout(){
                        static $call_count;
                        if( ! $call_count ){ $call_count = 0; }

                        $args = array(
                            'numberposts' => 1,
                            'offset' => $call_count
                        );
                        $posts = wp_get_recent_posts($args);
                        // wp_get_recent_posts is supposed to return an array
                        // of objects. But sometimes it returns an array of
                        // arrays. We don't need an object and it's easier to
                        // cast down to an array in PHP.
                        $post = (array) $posts[0];
                        $call_count++;

                        return format_news_callout($post);
                    }

                        function format_news_callout($post){
                            $href = '/news/'.$post['ID'];
                            $title = esc_attr($post['post_title']);
                            $title = '<a href="'.$href.'">'.$title.'</a>';
                            $link = '... <a href="'.$href.'">Learn More</a>';
                            $char_limit = 215 - strlen($title);
                            //Remove wordpress pseudo-tags like [caption id=...]
                            $content = preg_replace('/\[.*\]/', '', $post['post_content']);
                            $content = strip_tags($content);
                            $content = break_at_next_word($char_limit, $content, $link);

                            $callout = '<h5>Recent News</h5>';
                            $callout .= '<h3>'.$title.'</h3>';
                            $callout .= '<p>'.$content.'</p>';

                            return $callout;
                        }

                    function print_bucket($bucket_content, $class = ''){
                        echo '<li class="'.$class.'">'.$bucket_content.'</li>'."\n";
                    }

                ?>

            </ul>

        </div>

<?php include(TEMPLATEPATH.'/footer.php'); ?>
