<?php
/**
 * Rehub Framework Shortcodes array( 'shortcod_name', 'shortcode_function' )
 *
 * @package ReHub\Arrays
 * @version 1.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return array(
	'wpsm_inline_list' => 'wpsm_inline_list_shortcode',
	'wpsm_stickypanel' => 'wpsm_stickypanel_shortcode',
	'rehub_get_social_links' => 'rehub_get_social_links',
	'getHotThumb' => 'rh_hot_shortcode',
	'RH_wishlist' => 'rh_wishlist_shortcode',
	'rh_get_user_favorites' => 'RhGetUserFavorites',
	'rh_get_favorite_shops' => 'RhGetUserFavoriteShops',
	'wpsm_woofeatured' => 'wpsm_woofeatured_function',
	'wpsm_woogrid' => 'wpsm_woogrid_shortcode',
	'wpsm_woocolumns' => 'wpsm_woocolumns_shortcode',
	'wpsm_woolist' => 'wpsm_woolist_shortcode',
	'wpsm_woorows' => 'wpsm_woorows_shortcode',
	'compactgrid_loop_mod' => 'wpsm_compactgrid_loop_shortcode',
	'columngrid_loop' => 'wpsm_columngrid_loop_shortcode',
	'small_thumb_loop' => 'wpsm_small_thumb_loop_shortcode',
	'wpsm_offer_list' => 'wpsm_offer_list_loop_shortcode',
	'regular_blog_loop' => 'wpsm_regular_blog_loop_shortcode',
	'grid_loop_mod' => 'wpsm_grid_loop_mod_shortcode',
	'wpsm_news_ticker' => 'wpsm_news_ticker_shortcode',
	'news_with_thumbs_mod' => 'wpsm_news_with_thumbs_mod_shortcode',
	'tab_mod' => 'tab_mod_shortcode',
	'title_mod' => 'title_mod_shortcode',
	'two_col_news' => 'two_col_news_shortcode',
	'post_carousel_mod' => 'deal_carousel_shortcode',
	'full_carousel' => 'deal_carousel_shortcode',
	'woo_mod' => 'woo_mod_shortcode',
	'wpsm_recent_posts_list' => 'recent_posts_function',
	'wpsm_three_col_posts' => 'wpsm_three_col_posts_function',
	'wpsm_offerbox' => 'wpsm_offerbox_shortcode',
	'video_mod' => 'video_mod_function',
	'wpsm_featured' => 'wpsm_featured_function',
	'wpsm_searchbox' => 'wpsm_searchbox_function',
	'wpsm_woo_versus' => 'wpsm_woo_versus_function',
	'wpsm_button' => 'wpsm_shortcode_button',
	'wpsm_column' => 'wpsm_column_shortcode',
	'wpsm_highlight' => 'wpsm_highlight_shortcode',
	'wpsm_colortable' => 'wpsm_colortable_shortcode',
	'wpsm_quote' => 'wpsm_quote_shortcode',
	'wpsm_dropcap' => 'wpsm_dropcap_shortcode',  
	'wpsm_video' => 'wpsm_shortcode_AddVideo',
	'wpsm_lightbox' => 'wpsm_shortcode_lightbox',
	'wpsm_box' => 'wpsm_shortcode_box',
	'wpsm_promobox' => 'wpsm_promobox_shortcode',
	'wpsm_numbox' => 'wpsm_numbox_shortcode',
	'wpsm_numhead' => 'wpsm_numhead_shortcode',
	'wpsm_titlebox' => 'wpsm_titlebox_shortcode',
	'wpsm_codebox' => 'wpsm_code_shortcode',
	'wpsm_accordion' => 'wpsm_accordion_main_shortcode' ,
	'wpsm_accordion_section' => 'wpsm_accordion_section_shortcode' ,
	'wpsm_testimonial' => 'wpsm_testimonial_shortcode' ,
	'wpsm_quick_slider' => 'wpsm_shortcode_quick_slider',
	'wpsm_post_images_slider' => 'wpsm_post_slide',
	'wpsm_googlemap' => 'wpsm_shortcode_googlemaps',
	'wpsm_divider' => 'wpsm_divider_shortcode' ,
	'wpsm_price_table' => 'wpsm_price_shortcode' ,
	'wpsm_price_column' => 'wpsm_price_column_shortcode' ,
	'wpsm_tabgroup' => 'wpsm_tabgroup_shortcode' ,
	'wpsm_tab' => 'wpsm_tab_shortcode' ,
	'wpsm_toggle' => 'wpsm_toggle_shortcode',
	'wpsm_feed' => 'wpsm_shortcode_feeds',
	'wpsm_bar' => 'wpsm_bar_shortcode' ,
	'wpsm_list' => 'wpsm_list_shortcode',
	'wpsm_pros' => 'wpsm_pros_shortcode',
	'wpsm_cons' => 'wpsm_cons_shortcode',
	'wpsm_tooltip' => 'wpsm_shortcode_tooltip',
	'wpsm_member' => 'wpsm_member_shortcode',
	'wpsm_is_user' => 'wpsm_shortcode_is_logged_in',
	'wpsm_is_guest' => 'wpsm_shortcode_is_guest',
	'wpsm_is_vendor' => 'wpsm_shortcode_is_vendor',
	'wpsm_is_pending_vendor' => 'wpsm_shortcode_is_pending_vendor',
	'wpsm_not_vendor_logged' => 'wpsm_shortcode_not_vendor_logged',
	'wpsm_customer_user' => 'wpsm_shortcode_customer_user',
	'wpsm_minigallery' => 'wpsm_gallery_carousel',
	'wpsm_woobox' => 'wpsm_woobox_shortcode',
	'wpsm_woocompare' => 'wpsm_woocompare_shortcode',
	'wpsm_button_popup' => 'wpsm_button_popup_funtion',
	'wpsm_countdown' => 'wpsm_countdown',
	'rehub_title' => 'rehub_title_function',
	'rehub_affbtn' => 'rehub_affbtn_function',
	'rehub_exerpt' => 'rehub_exerpt_function',
	'review' => 'rehub_shortcode_review',
	'woo_offer_product' => 'rehub_shortcode_woo_offer',
	'woo_offer_list' => 'rehub_shortcode_woolist_offer',
	'quick_offer' => 'rehub_shortcode_quick_offer',
	'wpsm_ads1' => 'wpsm_shortcode_boxad',
	'wpsm_ads2' => 'wpsm_shortcode_boxad2',
	'wpsm_specification' => 'wpsm_specification_shortcode',
	'wpsm_top' => 'wpsm_toprating_shortcode',
	'wpsm_toptable' => 'wpsm_toptable_shortcode',
	'wpsm_charts' => 'wpsm_topcharts_shortcode',
	'wpsm_woocharts' => 'wpsm_woocharts_shortcode',
	'wpsm_categorizator' => 'wpsm_categorizator_shortcode',
	'wpsm_cartbox' => 'wpsm_cartbox_shortcode',
	'wpsm_scorebox' => 'wpsm_scorebox_shortcode',
	'wpsm_reveal' => 'wpsm_reveal_shortcode',
	'wpsm_user_modal' => 'wpsm_user_modal_shortcode',
	'wpsm_searchform' => 'wpsm_searchform_shortcode',
	'wpsm_hidelink' => 'wpsm_hidelink_shortcode',
	'wpsm_compare_button' => 'wpsm_comparison_button',
	'wpsm_custom_meta' => 'wpsm_get_custom_value',
	'wpsm_tax_archive' => 'wpsm_tax_archive_shortcode' ,
	'wpsm_user_rating_stars' => 're_user_rating_shortcode',
	'wpsm_update' => 'wpsm_update_shortcode',
	'wpsm_specification_builder' => 'wpsm_spec_builders_shortcode' ,
	'wpsm_catbox' => 'wpsm_catbox_shortcode',
	'wpsm_vendorlist' => 'rh_wcv_vendorslist_flat',
	'rh_add_map_gmw' => 'rh_add_map_gmw',
	'rh_compare_icon' => 'rh_compare_icon',
	'wpsm_bigoffer' => 'wpsm_get_bigoffer',
	'wpsm_add_deal_popup' => 'wpsm_get_add_deal_popup',
	'rh_get_post_thumbnails' => 'rh_get_post_thumbnails',
	'rh_get_post_videos' => 'rh_get_post_videos',
	'rh_get_profile_data' => 'rh_get_profile_data',
	'rh_is_bpmember_type' => 'rh_is_bpmember_type',
	'rh_bpmember_type' => 'rh_bpmember_type',
	'rh_is_bpmember_role' => 'rh_is_bpmember_role',
	'rh_is_bpmember_profile' => 'rh_is_bpmember_profile',
	'rh_get_group_admins' => 'rh_get_group_admins',
	'rh_permalink' => 'rh_get_permalink',
	'rh_ce_search_form' => 'rh_ce_search_form',
	'rh_is_singular' => 'rh_is_singular',
	'rh_is_category' => 'rh_is_category',
	'rh_mailchimp' => 'rh_mailchimp_shortcode' ,
	'wpsm_reviewbox' => 'wpsm_reviewbox',
	'rh_latest_comments' => 'rh_latest_comments',
	'wpsm_hover_banner' => 'wpsm_banner_shortcode' ,
	'wpsm_itinerary' => 'wpsm_itinerary_shortcode' ,
	'wpsm_itinerary_item' => 'wpsm_itinerary_item_shortcode' ,
	'wpsm_versus' => 'wpsm_versus_shortcode',
	'wpsm_compare_bar' => 'wpsm_compare_bar_shortcode',
	'rh_list_constructor' => 'wpsm_list_constructor',
	'RH_ELEMENTOR' => 'wpsm_rh_elementor_box',
	'rh_is_wcfm_role' => 'rh_is_wcfm_role',
	'rh_is_not_wcfm_role' => 'rh_is_not_wcfm_role',
	'rh_side_contents' => 'wpsm_contents_shortcode',
);

/**
 * EOF
 */