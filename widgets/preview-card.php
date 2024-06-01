<?php

namespace Elementor;

class MYEW_Preview_Card_Widget extends  Widget_Base{

    public function get_name(){
      return 'myew-preview-card-widget-id';
    }
    /**
     * Get Widget Title
     * 
     * Retrieve Example Widget widget title
     * 
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title(){
        return esc_html__( 'Preview Card', 'my-elementor-widget' );
    }

     /**
     * Script
     * 
     * @since 1.0.0
     * @access public
     */

    // public function get_script_depends(){
        //'myew-script';
     //}
     public function get_script_depends() {
        return [
            'myew-style'
          //  'myew-script'
        ];
    }

    /**
	 * Get widget icon.
	 *
	 * Retrieve Example Widget widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-code';
	}

    	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Example Widget widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'myew-for-elementor-category' ];
	}



    public function register_controls() {
      //Controls
      $this->start_controls_section(
        'preview_card_image_section',
        [
            'label' => esc_html__( 'Image', 'elementor-currency-control' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'review_card_image',
        [
            'label' => esc_html__( 'Choose Image', 'elementor-currency-control' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );


    $this->add_control(
        'preview_card_img_link',
        [
            'label' => esc_html__( 'Show Link', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'textdomain' ),
            'label_off' => esc_html__( 'Hide', 'textdomain' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $this->add_control(
        'preview_img_link',
        [
            'label' => esc_html__( 'Link', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
            'show_external' => true,
            'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
            ],
            'condition' => [
                'preview_card_img_link' => 'yes'
            ]
        ]
    );
    $this->end_controls_section();

       // Content Settings
       $this->start_controls_section(
        'content_section',
        [
            'label' => __( 'Content', 'my-elementor-widget' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );
    $this->add_control(
        'card_title',
        [
            'label' => esc_html__( 'Title', 'my-elementor-widget' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Default title', 'my-elementor-widget' ),
            'label_block' => true,
            'placeholder' => esc_html__( 'Type your title here', 'my-elementor-widget' ),
        ]
    );

       // Divider
       $this->add_control(
        'show_divider',
        [
            'label'        => __( 'Show Divider', 'plugin-domain' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => __( 'Show', 'plugin-domain' ),
            'label_off'    => __( 'Hide', 'plugin-domain' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        ]
    );
    // Content
    $this->add_control(
        'item_description',
        [
            'label' => esc_html__( 'Description', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => esc_html__( 'Default description', 'textdomain' ),
            'placeholder' => esc_html__( 'Type your description here', 'textdomain' ),
        ]
    );

    $this->end_controls_section();
    //Badge Section
    $this->start_controls_section(
        'badge_section',
        [
            'label' => __( 'Badge', 'my-elementor-widget' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );
        //Show Top Badge 
    $this->add_control(
        'show_top_badge',
        [
            'label' => esc_html__( 'Show Top Badge', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'textdomain' ),
            'label_off' => esc_html__( 'Hide', 'textdomain' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

     // Top Badge Text
        $this->add_control(
            'top_badge_text',
            [
                'label' => __( 'Top Badge Text', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'On Sale!', 'plugin-domain' ),
                'label_block' => true,
                'placeholder' => __( 'Type your title here', 'plugin-domain' ),
                'condition' => [
                    'show_top_badge' => 'yes'
                ]
            ]
        );
    //Show Middle Badge 
    $this->add_control(
        'show_middle_badge',
        [
            'label' => esc_html__( 'Show Middle Badge', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'textdomain' ),
            'label_off' => esc_html__( 'Hide', 'textdomain' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

       // Middle Badge Text
       $this->add_control(
        'middle_badge_text',
        [
            'label' => __( 'Top Badge Text', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'On Sale!', 'plugin-domain' ),
            'label_block' => true,
            'placeholder' => __( 'Type your title here', 'plugin-domain' ),
            'condition' => [
                'show_middle_badge' => 'yes'
            ]
        ]
    );
     //Show Bottom Badge 
    $this->add_control(
        'show_bottom_badge',
        [
            'label' => esc_html__( 'Show Bottom Badge', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'textdomain' ),
            'label_off' => esc_html__( 'Hide', 'textdomain' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );
  // Bottom  Badge Text
           $this->add_control(
            'bottom_badge_text',
            [
                'label' => __( 'Bottom Badge Text', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'On Sale!', 'plugin-domain' ),
                'label_block' => true,
                'placeholder' => __( 'Type your title here', 'plugin-domain' ),
                'condition' => [
                    'show_bottom_badge' => 'yes'
                ]
            ]
        );
    $this->end_controls_section();
    //Button Section
    $this->start_controls_section(
        'preview_card_btn_section',
        [
            'label' => esc_html__( 'Button Section', 'elementor-currency-control' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );
         //Show Button
         $this->add_control(
            'show_card_btn_section',
            [
                'label' => esc_html__( 'Show Button', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'textdomain' ),
                'label_off' => esc_html__( 'Hide', 'textdomain' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        // Button Text
        $this->add_control(
			'preview_card_btn_text',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Buy Now', 'textdomain' ),
                'label_block' => true,
                'condition' => [
                    'show_card_btn_section' => 'yes'
                ]
			]
		);

           // Button Link
            $this->add_control(
                'preview_card_btn_url',
                [
                    'label' => __( 'Link', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                 'condition' => [
                    'show_card_btn_section' => 'yes'
                      ],
                ]
            );
    
    $this->end_controls_section();
      //Style tab
      $this->style_tab();

    }

    private function style_tab(){

    }

    protected function render(){
        $myew_values = $this->get_settings_for_display();
        $image_target = $myew_values[ 'preview_img_link' ][ 'is_external' ] ? ' target="_blank"' : '';
        $image_nofollow = $myew_values[ 'preview_img_link' ][ 'nofollow' ] ? ' rel="nofollow"' : '';

        $button_target = $myew_values[ 'preview_card_btn_url' ][ 'is_external' ] ? ' target="_blank"' : '';
        $button_nofollow = $myew_values[ 'preview_card_btn_url' ][ 'nofollow' ] ? ' rel="nofollow"' : '';
             ?>
              <!-- Image Card Starts -->
              <div class="image-card">
                    <div class="image" style="background-image: url(<?php echo esc_url( $myew_values['review_card_image']['url']); ?>);">
                    <?php if( 'yes' == $myew_values[ 'preview_card_img_link' ] ) : ?>
                        <a href="<?php echo esc_url( $myew_values[ 'preview_img_link' ][ 'url' ] ) ?>" <?php echo $image_target; ?> <?php echo $image_nofollow; ?>></a>
                    <?php endif; ?>
                       
                        <?php if( 'yes' == $myew_values[ 'show_top_badge' ] ) : ?>
                         <span class="top-price-badge badge-blue"><?php echo $myew_values[ 'top_badge_text' ]; ?></span>
                        <?php endif; ?>

                        <?php if( 'yes' == $myew_values[ 'show_middle_badge' ] ) : ?>
                         <span class="middle-price-badge badge-blue"><?php echo $myew_values[ 'middle_badge_text' ]; ?></span>
                        <?php endif; ?>
                       
                       
                    </div>
                    <div class="content">
                        <div class="title">
                            <h2><?php echo  $myew_values[ 'card_title' ] ?></h2>
                        </div>
                        <?php if( 'yes' == $myew_values[ 'show_divider' ] ) : ?>
                          <div class="divider"></div>
                        <?php endif; ?>
                        <div class="excerpt">
                        <?php echo $myew_values[ 'item_description' ]; ?>
                        </div>
                        <div class="readmore">
                            
                            <?php if( 'yes' == $myew_values[ 'show_card_btn_section' ] ) : ?>
                                <a href="<?php echo esc_url( $myew_values[ 'preview_card_btn_url' ][ 'url' ] ); ?>" <?php echo $button_target; ?> <?php echo $button_nofollow; ?> class="button button-readmore"><?php echo $myew_values[ 'preview_card_btn_text' ];  ?></a>
                        <?php endif; ?>
                            
                            <?php if( 'yes' == $myew_values[ 'show_bottom_badge' ] ) : ?>
                                <span class="bottom-price-badge badge-blue"><?php echo $myew_values[ 'bottom_badge_text' ]; ?></span>
                        <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            
             <?php
    }
    
    protected function content_template(){
    
    }


}
Plugin::instance()->widgets_manager->register_widget_type( new MYEW_Preview_Card_Widget() );