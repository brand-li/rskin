<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<!DOCTYPE html>
<!--[if IE 8]>    <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)] <?php language_attributes(); ?>><![endif]-->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width" />
<!-- feeds & pingback -->
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />    
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if(function_exists('wp_body_open')){wp_body_open();}?>
<div class="rh-outer-wrap">
<div id="top_ankor"></div>
<!-- CONTENT -->
<div class="rh-container full_post_area"> 
    <div class="rh-content-wrap clearfix">
        <!-- Main Side -->
        <div class="main-side single full_width clearfix">                  
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
            <h1 class="text-center mt30"><?php the_title_attribute(); ?></h1>
            <?php the_content(''); ?>                        
        <?php endwhile; endif; ?>
        </div>  
        <!-- /Main Side -->  
    </div>
</div>
<!-- /CONTENT -->     
<!-- FOOTER -->
</div>
<span class="rehub_scroll" id="topcontrol" data-scrollto="#top_ankor"><i class="far fa-chevron-up"></i></span>
<?php wp_footer(); ?>
</body>
</html>