<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php
if(defined( 'WCFMmp_TOKEN' )){
	return array(
		'title' => esc_html__('Additional links for Vendor panel', 'rehub-framework'),
		'name' => 'menu_wcfm',
		'icon' => 'font-awesome:fa-microchip',
		'controls' => array(
			array(
				'type' => 'section',
				'title' => esc_html__('Additional options', 'rehub-framework'),
				'fields' => array(
					array(
						'type' => 'textbox',
						'name' => 'url_for_add_one',
						'label' => esc_html__('Add url of first menu item', 'rehub-framework'),				
					),
					array(
						'type' => 'textbox',
						'name' => 'label_for_add_one',
						'label' => esc_html__('Add label of first menu item', 'rehub-framework'),					
					),
					array(
						'type' => 'textbox',
						'name' => 'url_for_add_two',
						'label' => esc_html__('Add url of second menu item', 'rehub-framework'),				
					),	
					array(
						'type' => 'textbox',
						'name' => 'label_for_add_two',
						'label' => esc_html__('Add label of second menu item', 'rehub-framework'),					
					),
					array(
						'type' => 'textbox',
						'name' => 'url_for_add_three',
						'label' => esc_html__('Add url of third menu item', 'rehub-framework'),				
					),
					array(
						'type' => 'textbox',
						'name' => 'label_for_add_three',
						'label' => esc_html__('Add label of third menu item', 'rehub-framework'),					
					),	
					array(
						'type' => 'textbox',
						'name' => 'url_for_add_four',
						'label' => esc_html__('Add url of fourth menu item', 'rehub-framework'),				
					),
					array(
						'type' => 'textbox',
						'name' => 'label_for_add_four',
						'label' => esc_html__('Add label of fourth menu item', 'rehub-framework'),					
					),											
				),
			),	
		),
	);
}else{
	return array(	
	);
}

/**
 *EOF
 */