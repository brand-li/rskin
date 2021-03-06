<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $post;
$limit = 6;
?>
<?php $related = wc_get_related_products($product->get_id(), $limit);
    if ( sizeof( $related ) == 0 ){
    }else{
        echo '<div class="related-woo-area clearbox flowhidden" id="related-section-woo-area"><div class="rh-container mt25 mb15">';
        $related = implode(',',$related);
        $related_array = array('ids'=>$related, 'columns'=>'6_col', 'data_source'=>'ids', 'show'=> 6);       
        echo '<div class="clearfix"></div><h3>'.__( 'Related Products', 'rehub-theme' ).'</h3>';
        if (rehub_option('woo_design') == 'grid') { 
            echo wpsm_woogrid_shortcode($related_array);                  
        }
        elseif (rehub_option('woo_design') == 'gridtwo') { 
            $related_array['gridtype'] = 'compact';
            echo wpsm_woogrid_shortcode($related_array);                  
        } 
        elseif (rehub_option('woo_design') == 'gridrev') { 
            $related_array['gridtype'] = 'review';
            echo wpsm_woogrid_shortcode($related_array);                  
        }                 
        else{
            echo wpsm_woocolumns_shortcode($related_array);           
        }
        echo '</div></div>';           
    }          
?> 