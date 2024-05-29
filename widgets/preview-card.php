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


    $this->end_controls_section();

   

      //Style tab
      $this->style_tab();

    }

    private function style_tab(){

    }

    protected function render(){
             ?>
              <!-- Image Card Starts -->
              <div class="image-card">
                    <div class="image" style="background-image: url(hanging-lamp.jpg);">
                        <span class="top-price-badge badge-blue">$19.99</span>
                    </div>
                    <div class="content">
                        <div class="title">
                            <h2>Hanging lamp with a tiny wire!</h2>
                        </div>
                        <div class="divider"></div>
                        <div class="excerpt">
                            <p>Choose your room light carefully. It can enlight your workspace or can cause you disaster!</p>
                        </div>
                        <div class="readmore">
                            <a href="" class="button button-readmore">Buy Now</a>
                        </div>
                    </div>
                </div>
             <?php
    }
    
    protected function content_template(){
    
    }


}
Plugin::instance()->widgets_manager->register_widget_type( new MYEW_Preview_Card_Widget() );