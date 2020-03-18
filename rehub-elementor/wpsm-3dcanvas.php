<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit('Restricted Access');
} // Exit if accessed directly

/**
 * Info box Widget class.
 *
 * 'wpsm_box' shortcode
 *
 * @since 1.0.0
 */
class WPSM_TCanvas_A_Widget extends Widget_Base {

    /* Widget Name */
    public function get_name() {
        return 'rh_t_canvas';
    }

    /* Widget Title */
    public function get_title() {
        return __('3d canvas', 'rehub-theme');
    }

        /**
     * Get widget icon.
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-youtube';
    }

    public function get_script_depends() {
        return ['threejs', 'orbitcontrol', 'gltfloader', 'shaderfrog', 'gsap'];
    }

    /**
     * category name in which this widget will be shown
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'helpler-modules' ];
    }

    protected function _register_controls() {
        $this->start_controls_section( 'general_section', [
            'label' => esc_html__( 'General', 'rehub-theme' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control( 'gltf_url', [
            'label' => esc_html__( 'Url on gltf scene', 'rehub-theme' ),
            'label_block'  => true,
            'type' => \Elementor\Controls_Manager::TEXT,
        ]); 

        $this->add_control(
            'gltf_scale',
            array(
                'label'   => esc_html__( 'Model Resize', 'rehub-theme' ),
                'description' => 'If you don\'t see model, maybe you need to resize it, try 0.0001 value or 10000',
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 0,
                'max'     => 10000,
                'step'    => 0.0001,
            )
        ); 
        $this->add_control(
            'camerax',
            [
                'label' => __( 'Camera X offset', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
            ]
        );
        $this->add_control(
            'cameray',
            [
                'label' => __( 'Camera Y offset', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
            ]
        );
        $this->add_control(
            'cameraz',
            [
                'label' => __( 'Camera z offset', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
            ]
        );
        $this->add_control(
            'modelx',
            [
                'label' => __( 'Model X offset', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
            ]
        );
        $this->add_control(
            'modely',
            [
                'label' => __( 'Model Y offset', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
            ]
        );
        $this->add_control(
            'modelz',
            [
                'label' => __( 'Model z offset', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
            ]
        );


        $this->add_control(
            'gltf_rotation',
            [
                'label' => __( 'Rotation type', 'rehub-theme' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'image',
                'separator' => 'before',
                'options' => [
                    'inf' => __( 'Infinite', 'rehub-theme' ),
                    'mouse' => __( 'Mouse move', 'rehub-theme' ),
                ],
            ]
        );
        $this->add_control(
            'gltf_zoom',
            array(
                'label'        => esc_html__( 'Disable zoom?', 'rehub-theme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'rehub-theme' ),
                'label_off'    => esc_html__( 'No', 'rehub-theme' ),
                'return_value' => 'true',
                'default' => 'true'
            )
        );

        $this->add_control(
            'gltf_rx',
            array(
                'label'   => esc_html__( 'Rotation X strength', 'rehub-theme' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 0,
                'max'     => 100,
                'step'    => 1,
                'condition' => array(
                    'gltf_rotation' => 'inf'
                ),
            )
        ); 

        $this->add_control(
            'gltf_ry',
            array(
                'label'   => esc_html__( 'Rotation Y strength', 'rehub-theme' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 0,
                'max'     => 100,
                'step'    => 1,
                'condition' => array(
                    'gltf_rotation' => 'inf'
                ),
            )
        ); 

        $this->add_control(
            'gltf_rz',
            array(
                'label'   => esc_html__( 'Rotation Z strength', 'rehub-theme' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 0,
                'max'     => 100,
                'step'    => 1,
                'condition' => array(
                    'gltf_rotation' => 'inf'
                ),
            )
        ); 

        $this->add_control(
            'gltf_move',
            array(
                'label'   => esc_html__( 'Move Strength', 'rehub-theme' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 0,
                'max'     => 100,
                'step'    => 0.1,
                'default' => 1,
                'condition' => array(
                    'gltf_rotation' => 'mouse'
                ),
            )
        ); 

        $this->add_control(
            'gltf_p_light',
            array(
                'label'        => esc_html__( 'Enable point light?', 'rehub-theme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'rehub-theme' ),
                'label_off'    => esc_html__( 'No', 'rehub-theme' ),
                'return_value' => 'true',
                'separator' => 'before',
                'default' => 'true'
            )
        );
        $this->add_control(
            'gltf_p_light_s',
            [
                'label' => __( 'Strength', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 1,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'condition' => [
                    'gltf_p_light' => 'true',
                ],
            ]
        );
        $this->add_control(
            'gltf_p_light_d',
            [
                'label' => __( 'Diffuse', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
                'condition' => [
                    'gltf_p_light' => 'true',
                ],
            ]
        );
        $this->add_control( 'gltf_p_light_c', [
            'label' => esc_html__( 'Color', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default'     => '#ffffff', 
            'condition' => [
                'gltf_p_light' => 'true',
            ],           
        ]);
        $this->add_control(
            'lightx',
            [
                'label' => __( 'Light X offset', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
                'condition' => [
                    'gltf_p_light' => 'true',
                ],
            ]
        );
        $this->add_control(
            'lighty',
            [
                'label' => __( 'Light Y offset', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
                'condition' => [
                    'gltf_p_light' => 'true',
                ],
            ]
        );
        $this->add_control(
            'lightz',
            [
                'label' => __( 'Light z offset', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
                'condition' => [
                    'gltf_p_light' => 'true',
                ],
            ]
        );

        $this->add_control(
            'gltf_d_light',
            array(
                'label'        => esc_html__( 'Enable directional light?', 'rehub-theme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'rehub-theme' ),
                'label_off'    => esc_html__( 'No', 'rehub-theme' ),
                'separator' => 'before',
                'return_value' => 'true',
            )
        );
        $this->add_control(
            'gltf_d_light_s',
            [
                'label' => __( 'Strength', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 1,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'condition' => [
                    'gltf_d_light' => 'true',
                ],
            ]
        );

        $this->add_control( 'gltf_d_light_c', [
            'label' => esc_html__( 'Color', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default'     => '#ffffff', 
            'condition' => [
                'gltf_d_light' => 'true',
            ],           
        ]);
        $this->add_control(
            'lightdx',
            [
                'label' => __( 'Light X offset', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
                'condition' => [
                    'gltf_d_light' => 'true',
                ],
            ]
        );
        $this->add_control(
            'lightdy',
            [
                'label' => __( 'Light Y offset', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
                'condition' => [
                    'gltf_d_light' => 'true',
                ],
            ]
        );
        $this->add_control(
            'lightdz',
            [
                'label' => __( 'Light z offset', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.1,
                    ],
                ],
                'condition' => [
                    'gltf_d_light' => 'true',
                ],
            ]
        );

        $this->add_control(
            'gltf_a_light',
            array(
                'label'        => esc_html__( 'Enable Ambient light?', 'rehub-theme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'rehub-theme' ),
                'label_off'    => esc_html__( 'No', 'rehub-theme' ),
                'separator' => 'before',
                'return_value' => 'true',
            )
        );
        $this->add_control(
            'gltf_a_light_s',
            [
                'label' => __( 'Strength', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 1,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'condition' => [
                    'gltf_a_light' => 'true',
                ],
            ]
        );
        $this->add_control( 'gltf_a_light_c', [
            'label' => esc_html__( 'Color', 'rehub-theme' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default'     => '#ffffff', 
            'condition' => [
                'gltf_a_light' => 'true',
            ],           
        ]);
        $this->add_control(
            'gltf_env',
            array(
                'label'        => esc_html__( 'Enable environment image?', 'rehub-theme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'rehub-theme' ),
                'label_off'    => esc_html__( 'No', 'rehub-theme' ),
                'separator' => 'before',
                'return_value' => 'true',
            )
        );
        $this->add_control(
            'gltf_env_s',
            [
                'label' => __( 'Strength', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 1,
                ],
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 20,
                        'step' => 0.1,
                    ],
                ],
                'condition' => [
                    'gltf_env' => 'true',
                ],
            ]
        );
        $this->add_control( 'gltf_px', [
            'label' => esc_html__( 'Custom right image (px)', 'rehub-theme' ),
            'label_block'  => true,
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'condition' => array(
                'gltf_env' => 'true'
            ),
        ]);
        $this->add_control( 'gltf_nx', [
            'label' => esc_html__( 'Custom left image (nx)', 'rehub-theme' ),
            'label_block'  => true,
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'condition' => array(
                'gltf_env' => 'true'
            ),
        ]);
        $this->add_control( 'gltf_py', [
            'label' => esc_html__( 'Custom top image (py)', 'rehub-theme' ),
            'label_block'  => true,
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'condition' => array(
                'gltf_env' => 'true'
            ),
        ]);
        $this->add_control( 'gltf_ny', [
            'label' => esc_html__( 'Custom bottom image (ny)', 'rehub-theme' ),
            'label_block'  => true,
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'condition' => array(
                'gltf_env' => 'true'
            ),
        ]);
        $this->add_control( 'gltf_pz', [
            'label' => esc_html__( 'Custom front image (pz)', 'rehub-theme' ),
            'label_block'  => true,
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'condition' => array(
                'gltf_env' => 'true'
            ),
        ]);
        $this->add_control( 'gltf_nz', [
            'label' => esc_html__( 'Custom back image (nz)', 'rehub-theme' ),
            'label_block'  => true,
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            'condition' => array(
                'gltf_env' => 'true'
            ),
        ]);

        $this->add_control( 'shader_url', [
            'label' => esc_html__( 'Url on shaderfrog json', 'rehub-theme' ),
            'separator' => 'before',
            'label_block'  => true,
            'type' => \Elementor\Controls_Manager::TEXT,
        ]); 

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'mesh_name',
            [
                'label' => __( 'Get by mesh name', 'rehub-theme' ),
                'description'=> 'Leave blank to get by number',
                'type' => Controls_Manager::TEXT,
                'separator' => 'before',
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'model_rx',
            [
                'label' => __( 'Rotation X', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 0.1,
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'model_ry',
            [
                'label' => __( 'Rotation Y', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 0.1,
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'model_rz',
            [
                'label' => __( 'Rotation Z', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 0.1,
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'model_px',
            [
                'label' => __( 'Position X', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.01,
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'model_py',
            [
                'label' => __( 'Position Y', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.01,
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'model_pz',
            [
                'label' => __( 'Position Z', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.01,
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'model_scale',
            [
                'label' => __( 'Scale', 'rehub-theme' ),
                'type' => Controls_Manager::SLIDER,
                'label_block' => true,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                        'step' => 0.01,
                    ],
                ],
            ]
        );
        $repeater->add_control(
            'model_opacity',
            array(
                'label'   => esc_html__( 'Opacity', 'rehub-theme' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            )
        );
        $repeater->add_control(
            'model_duration',
            array(
                'label'   => esc_html__( 'Duration (s)', 'rehub-theme' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 0.1,
                'max'     => 20,
                'step'    => 0.1,
                'default' => 1,
            )
        ); 

        $repeater->add_control(
            'model_delay',
            array(
                'label'   => esc_html__( 'Delay (s)', 'rehub-theme' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 0.1,
                'max'     => 20,
                'step'    => 0.1,
            )
        );

        $repeater->add_control( 'model_ease', [
            'type'        => \Elementor\Controls_Manager::SELECT,
            'label'       => esc_html__( 'Ease type', 'rehub-theme' ),
            'options'     => [
                'power0-none'   =>  esc_html__('Linear', 'rehub-theme'),
                'power1-in'   =>  esc_html__('Power 1 in', 'rehub-theme'),
                'power1-out'   =>  esc_html__('Power 1 out', 'rehub-theme'),
                'power1-inOut'   =>  esc_html__('Power 1 inOut', 'rehub-theme'),
                'power2-in'   =>  esc_html__('Power 2 in', 'rehub-theme'),
                'power2-out'   =>  esc_html__('Power 2 out', 'rehub-theme'),
                'power2-inOut'   =>  esc_html__('Power 2 inOut', 'rehub-theme'),
                'power3-in'   =>  esc_html__('Power 3 in', 'rehub-theme'),
                'power3-out'   =>  esc_html__('Power 3 out', 'rehub-theme'),
                'power3-inOut'   =>  esc_html__('Power 3 inOut', 'rehub-theme'),
                'power4-in'   =>  esc_html__('Power 4 in', 'rehub-theme'),
                'power4-out'   =>  esc_html__('Power 4 out', 'rehub-theme'),
                'power4-inOut'   =>  esc_html__('Power 4 inOut', 'rehub-theme'),
                'back-in'   =>  esc_html__('Back in', 'rehub-theme'),
                'back-out'   =>  esc_html__('Back out', 'rehub-theme'),
                'back-inOut'   =>  esc_html__('Back inOut', 'rehub-theme'),
                'elastic-in'   =>  esc_html__('elastic in', 'rehub-theme'),
                'elastic-out'   =>  esc_html__('elastic out', 'rehub-theme'),
                'elastic-inOut'   =>  esc_html__('elastic inOut', 'rehub-theme'),
                'circ-in'   =>  esc_html__('circ in', 'rehub-theme'),
                'circ-out'   =>  esc_html__('circ out', 'rehub-theme'),
                'circ-inOut'   =>  esc_html__('circ inOut', 'rehub-theme'),
                'expo-in'   =>  esc_html__('expo in', 'rehub-theme'),
                'expo-out'   =>  esc_html__('expo out', 'rehub-theme'),
                'expo-inOut'   =>  esc_html__('expo inOut', 'rehub-theme'),
                'cine-in'   =>  esc_html__('cine in', 'rehub-theme'),
                'cine-out'   =>  esc_html__('cine out', 'rehub-theme'),
                'cine-inOut'   =>  esc_html__('cine inOut', 'rehub-theme'),
            ],
        ]);

        $repeater->add_control(
            'model_infinite',
            array(
                'label'        => esc_html__( 'Enable infinite', 'rehub-theme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'rehub-theme' ),
                'label_off'    => esc_html__( 'No', 'rehub-theme' ),
                'return_value' => 'yes',
            )
        );
        $repeater->add_control(
            'model_yoyo',
            array(
                'label'        => esc_html__( 'Enable Yoyo style', 'rehub-theme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'rehub-theme' ),
                'label_off'    => esc_html__( 'No', 'rehub-theme' ),
                'return_value' => 'yes',
            )
        );

        $repeater->add_control(
            'model_from',
            array(
                'label'        => esc_html__( 'Set direction as FROM', 'rehub-theme' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'rehub-theme' ),
                'label_off'    => esc_html__( 'No', 'rehub-theme' ),
                'return_value' => 'yes',
                'default' => 'yes',
            )
        ); 
                                                 
        $this->add_control( 'meshanimations', [
            'label'    => esc_html__( 'Mesh Animations', 'rehub-theme' ),
            'type'     => \Elementor\Controls_Manager::REPEATER,
            'fields'   => $repeater->get_controls(),
            'title_field' => '{{{ mesh_name }}}',
            'prevent_empty' => false,
        ]);

        $this->add_responsive_control(
            'threecanvwidth', [
                'label' => __('Area width', 'rehub-theme'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '100',
                    'unit' => '%',
                ],
                'size_units' => [ '%', 'px'],
                'separator' => 'before',
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                    'px' => [
                        'min' => 100,
                        'max' => 2500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rh_and_canvas' => 'width: {{SIZE}}{{UNIT}};',
                ],
                
            ]
        );
        $this->add_responsive_control(
            'threecanvheight', [
                'label' => __('Area height', 'rehub-theme'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '100',
                    'unit' => '%',
                ],
                'size_units' => [ '%', 'px'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                    'px' => [
                        'min' => 100,
                        'max' => 2500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rh_and_canvas' => 'height: {{SIZE}}{{UNIT}};',
                ],
                
            ]
        );

        $this->end_controls_section();
    }

    /* Widget output Rendering */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute( 'rh_gltfdata', 'data-rotationtype', $settings['gltf_rotation'] );
        if ( ! empty( $settings['gltf_url'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-url', urlencode($settings['gltf_url']) );
        }
        if ( ! empty( $settings['shader_url'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-shaderurl', urlencode($settings['shader_url']) );
        }
        if ( ! empty( $settings['gltf_scale'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-scale', $settings['gltf_scale'] );
        }
        if ( ! empty( $settings['gltf_rx'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-rx', $settings['gltf_rx'] );
        }
        if ( ! empty( $settings['gltf_ry'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-ry', $settings['gltf_ry'] );
        }
        if ( ! empty( $settings['gltf_rz'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-rz', $settings['gltf_rz'] );
        }
        if ( ! empty( $settings['camerax'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-camerax', $settings['camerax']['size'] );
        }
        if ( ! empty( $settings['cameray'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-cameray', $settings['cameray']['size'] );
        }
        if ( ! empty( $settings['cameraz'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-cameraz', $settings['cameraz']['size'] );
        }
        if ( ! empty( $settings['modelx'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-modelx', $settings['modelx']['size'] );
        }
        if ( ! empty( $settings['modely'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-modely', $settings['modely']['size'] );
        }
        if ( ! empty( $settings['modelz'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-modelz', $settings['modelz']['size'] );
        }
        if ( ! empty( $settings['lightx'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-lightx', $settings['lightx']['size'] );
        }
        if ( ! empty( $settings['lighty'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-lighty', $settings['lighty']['size'] );
        }
        if ( ! empty( $settings['lightz'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-lightz', $settings['lightz']['size'] );
        }
        if ( ! empty( $settings['gltf_move'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-mousemove', $settings['gltf_move'] );
        }
        if ( ! empty( $settings['gltf_p_light_s'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-lightstrength', $settings['gltf_p_light_s']['size'] );
        }
        if ( ! empty( $settings['gltf_p_light_d'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-lightdiffuse', $settings['gltf_p_light_d']['size'] );
        }
        if ( ! empty( $settings['gltf_p_light_c'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-lightcolor', $settings['gltf_p_light_c'] );
        }
        if ( ! empty( $settings['gltf_p_light'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-lights', $settings['gltf_p_light'] );
        }
        if ( ! empty( $settings['gltf_zoom'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-zoom', $settings['gltf_zoom'] );
        }
        if ( ! empty( $settings['gltf_d_light_s'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-lightdstrength', $settings['gltf_d_light_s']['size'] );
        }
        if ( ! empty( $settings['gltf_d_light_c'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-lightdcolor', $settings['gltf_d_light_c'] );
        }
        if ( ! empty( $settings['gltf_d_light'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-lightds', $settings['gltf_d_light'] );
        }

        if ( ! empty( $settings['lightdx'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-lightdx', $settings['lightdx']['size'] );
        }
        if ( ! empty( $settings['lightdy'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-lightdy', $settings['lightdy']['size'] );
        }
        if ( ! empty( $settings['lightdz'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-lightdz', $settings['lightdz']['size'] );
        }

        if ( ! empty( $settings['gltf_a_light_s'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-alightstrength', $settings['gltf_a_light_s']['size'] );
        }
        if ( ! empty( $settings['gltf_a_light_c'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-alightcolor', $settings['gltf_a_light_c'] );
        }
        if ( ! empty( $settings['gltf_a_light'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-alights', $settings['gltf_a_light'] );
        }
        if ( ! empty( $settings['gltf_env'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-env', $settings['gltf_env'] );
        }
        if ( ! empty( $settings['gltf_env_s'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-envstrength', $settings['gltf_env_s']['size'] );
        }
        if ( ! empty( $settings['gltf_px'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-envpx', $settings['gltf_px']['url'] );
        }
        if ( ! empty( $settings['gltf_nx'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-envnx', $settings['gltf_nx']['url']  );
        }
        if ( ! empty( $settings['gltf_py'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-envpy', $settings['gltf_py']['url']  );
        }
        if ( ! empty( $settings['gltf_ny'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-envny', $settings['gltf_ny']['url']  );
        }
        if ( ! empty( $settings['gltf_pz'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-envpz', $settings['gltf_pz']['url']  );
        }
        if ( ! empty( $settings['gltf_nz'] )) {
            $this->add_render_attribute( 'rh_gltfdata', 'data-envnz', $settings['gltf_nz']['url']  );
        }
        $settings['mesh'] = array();
        if ( ! empty( $settings['meshanimations'] )) {
            foreach ($settings['meshanimations'] as $index => $item) {
                foreach ($item as $key => $value) {
                    if(!empty($value)){
                        if(is_array($value)) $value = $value['size'];
                        if($value) $settings['mesh'][$index][$key] = $value;
                    }
                }        
            }
            $this->add_render_attribute( 'rh_gltfdata', 'data-meshanimations', json_encode($settings['mesh']) );
        }
        echo '<div class="rh-gltf-canvas rh_and_canvas" '.$this->get_render_attribute_string( 'rh_gltfdata' ).'> </div>';
        wp_enqueue_script('threejs');wp_enqueue_script('orbitcontrol');wp_enqueue_script('gltfloader');
        if ( ! empty( $settings['shader_url'] )) {wp_enqueue_script('shaderfrog');}
        if ( ! empty( $settings['mesh'] )) {wp_enqueue_script('gsap');}
        wp_enqueue_script('gltfinit');  
    }

  

}

Plugin::instance()->widgets_manager->register_widget_type( new WPSM_TCanvas_A_Widget );
