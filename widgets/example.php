<?php

namespace Elementor;

class MYEW_Example_Widget extends  Widget_Base{

    public function get_name(){
      return 'myew-example-widget-id';
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
        return esc_html__( 'Example Widget', 'my-elementor-widget' );
    }

     /**
     * Script
     * 
     * @since 1.0.0
     * @access public
     */

     public function get_script_depends(){
        'myew-script';
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
		//return [ 'myew-for-elementor' ];

    return [ 'basic' ];
	}



    public function _register_controls() {
      //Controls

      $this->start_controls_section(
        'content_section',
        [
            'label' => esc_html__( 'Content', 'elementor-oembed-widget' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    // $this->add_control(
    //     'url',
    //     [
    //         'label' => esc_html__( 'URL to embed', 'elementor-oembed-widget' ),
    //         'type' => \Elementor\Controls_Manager::TEXT,
    //         'input_type' => 'url',
    //         'placeholder' => esc_html__( 'https://your-link.com', 'elementor-oembed-widget' ),
    //     ]
    // );

    $this->end_controls_section();

      //Style tab
      $this->style_tab();

    }

    private function style_tab(){

    }

    protected function render(){
      $myew_value = $this->get_settings_for_display();

      ?>
		    <p> Hello World </p>
		 <?php
    }
    
    protected function content_template(){
        
    }


}
Plugin::instance()->widgets_manager->register_widget_type( new MYEW_Example_Widget() );