<?php
/**
 * The Search Form
 *
 * Optional file that allows displaying a custom search form
 * when the get_search_form() template tag is used.
 *
 * @package WordPress
 * @subpackage CompNet
 * @since 3.0.0
 */
?>

    <!-- Start Search Form -->
    
    <script type="text/javascript">
        
        jQuery(function(){
            
            jQuery('form.searchform').each(function(e){
                jQuery(this)
                    .find('input.input')
                    .each(function(ee){
                        searchBlur(jQuery(this))
                    })
                    .unbind('focus')
                    .bind('focus', function(){
                        searchFocus(jQuery(this));
                    })
                    .unbind('blur')
                    .bind('blur', function(){
                        searchBlur(jQuery(this));
                    });
            });
            
        });
        
        function searchFocus(input){
            var value = input.val();
            if( value == 'Search this site...' ){ input.val(''); }
        }
        
        function searchBlur(input){
            var value = input.val();
            if( value == '' ){ input.val('Search this site...'); }
        }
        
    </script>
    
    <form class="searchform" method="get" action="<?php echo home_url(); ?>">
        <div>
            <input class="input" type="text" name="s"/>
            <input class="submit" type="submit" name="searchsubmit" value="Search"/>
        </div>
    </form>
    
    <!-- End Search Form -->
    
