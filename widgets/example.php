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

    // public function get_script_depends(){
        //'myew-script';
     //}


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

    //return [ 'basic' ];
	}



    public function register_controls() {
      //Controls

      $this->start_controls_section(
        'section_title',
        [
          'label' => esc_html__( 'Title', 'elementor-addon' ),
          'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
      );
  
      $this->add_control(
        'title',
        [
          'label' => esc_html__( 'Title', 'elementor-addon' ),
          'type' => \Elementor\Controls_Manager::TEXTAREA,
          'default' => esc_html__( 'Hello world', 'elementor-addon' ),
        ]
      );
  
      $this->end_controls_section();
  
      // Content Tab End
  
  
      // Style Tab Start
  
      $this->start_controls_section(
        'section_title_style',
        [
          'label' => esc_html__( 'Title', 'elementor-addon' ),
          'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
      );
  
      $this->add_control(
        'title_color',
        [
          'label' => esc_html__( 'Text Color', 'elementor-addon' ),
          'type' => \Elementor\Controls_Manager::COLOR,
          'selectors' => [
            '{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
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
    	$settings = $this->get_settings_for_display();

		if ( empty( $settings['title'] ) ) {
			return;
		}
		?>
		<p class="hello-world">
			<?php echo $settings['title']; ?>
		</p>
		<?php
    }
    
    protected function content_template(){
      ?>
      <#
      if ( '' === settings.title ) {
        return;
      }
      #>
      <p class="hello-world">
        {{ settings.title }}
      </p>
      <?php
    }


}
Plugin::instance()->widgets_manager->register_widget_type( new MYEW_Example_Widget() );