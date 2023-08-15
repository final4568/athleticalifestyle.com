<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 *  Static Tab Slider with dropdown.
 *
 * @since 1.0.0
 */
class athleticalifestyle_Main_Slider extends \Elementor\Widget_Base {

	/**
	 * The constructor.
	 *
	 * @param array $data The class data parsing through.
	 * @param array $args The arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );
	}

	/**
	 * Dependent Scripts.
	 *
	 * @return void
	 */
	public function get_script_depends() {
		return array( 'athleticalifestyle-main-slider-js' );
	}

	/**
	 * Dependent Styles.
	 *
	 * @return void
	 */
	public function get_style_depends() {
		return array( 'athleticalifestyle-main-slider-css' );
	}
    /**
     * Get widget name.
     *
     * Retrieve widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'athleticalifestyle-main-slider';
    }

    /**
     * Get widget title.
     *
     * Retrieve widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Main Hero Slider', 'athleticalifestyle' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-tabs';
    }

    /**
     * Get widget categories.
     *
     * Register the widget in our own custom category.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return array( 'athleticalifestyle_widgets' );
    }

    /**
     * Register widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            array(
                'label' => __( 'Content', 'athleticalifestyle' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            )
        );
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'athleticalifestyle_main_image',
				array(
					'label'       => esc_html__( 'Background Image', 'athleticalifestyle' ),
					'type'        => \Elementor\Controls_Manager::MEDIA,
					'default'     => array(
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					),
					'separator'   => 'before',
				)
		);

		$repeater->add_control(
			'athleticalifestyle_prd_image',
				array(
					'label'       => esc_html__( 'Product Image', 'athleticalifestyle' ),
					'type'        => \Elementor\Controls_Manager::MEDIA,
					'default'     => array(
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					),
					'separator'   => 'before',
				)
		);


		// Control for link text.
		$repeater->add_control(
			'athleticalifestyle_title1',
			array(
				'label'       => esc_html__( 'White Title', 'athleticalifestyle' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter Text', 'athleticalifestyle' ),
				'default'     => esc_html__( 'First Title', 'athleticalifestyle' ),
				'separator'   => 'before',
			)
		);
		$repeater->add_control(
			'athleticalifestyle_title2',
			array(
				'label'       => esc_html__( 'Yellow Title ', 'athleticalifestyle' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter  Text', 'athleticalifestyle' ),
				'default'     => esc_html__( 'Last Title', 'athleticalifestyle' ),
				'separator'   => 'before',
			)
		);
		

		$repeater->add_control(
			'athleticalifestyle_main_description',
			array(
				'label'       => esc_html__( 'Sub Heading', 'athleticalifestyle' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Default description', 'athleticalifestyle' ),
				'placeholder' => esc_html__( 'Type your description here', 'athleticalifestyle' ),
			)
		);

        $repeater->add_control(
			'button1',
			array(
				'label'       => esc_html__( 'First Button Text ', 'athleticalifestyle' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter Button', 'athleticalifestyle' ),
				'default'     => esc_html__( 'Button', 'athleticalifestyle' ),
				'separator'   => 'before',
			)
		);
		$repeater->add_control(
			'athleticalifestyle_url1',
			[
				'label' => esc_html__( 'Button 1 Link', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-oembed-widget' ),
			]
		);
       

		$this->add_control(
			'athleticalifestyle_main_items',
			array(
				'label'   => esc_html__( 'Slider List', 'athleticalifestyle' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
			)
		);

        $this->end_controls_section();

    }

    /**
     * Render course format widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
		$settings  = $this->get_settings_for_display();
		$lists     = isset( $settings['athleticalifestyle_main_items'] ) && ! empty( $settings['athleticalifestyle_main_items'] ) ? $settings['athleticalifestyle_main_items'] : false;
		if ( $lists ) { ?>
        <div class="hero-widget-wrapper">
    <div class="hero-widget-inner">
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">

            <?php							
            foreach ( $lists as $list ) {
            $title1        = isset( $list['athleticalifestyle_title1'] ) && ! empty( $list['athleticalifestyle_title1'] ) ? $list['athleticalifestyle_title1'] : '';
            $title2        = isset( $list['athleticalifestyle_title2'] ) && ! empty( $list['athleticalifestyle_title2'] ) ? $list['athleticalifestyle_title2'] : '';
            $image         = isset( $list['athleticalifestyle_main_image'] ) && ! empty( $list['athleticalifestyle_main_image'] ) ? $list['athleticalifestyle_main_image'] : array();
            $prdimage         = isset( $list['athleticalifestyle_prd_image'] ) && ! empty( $list['athleticalifestyle_prd_image'] ) ? $list['athleticalifestyle_prd_image'] : array();
            $description   = isset( $list['athleticalifestyle_main_description'] ) && ! empty( $list['athleticalifestyle_main_description'] ) ? $list['athleticalifestyle_main_description'] : '';
            $btn1_text     = isset( $list['button1'] ) && ! empty( $list['button1'] ) ? $list['button1'] : '';
            $link1         = isset( $list['athleticalifestyle_url1'] ) && ! empty( $list['athleticalifestyle_url1'] ) ? $list['athleticalifestyle_url1'] : '';
            $btn2_text     = isset( $list['button2'] ) && ! empty( $list['button2'] ) ? $list['button2'] : '';
            $link2         = isset( $list['athleticalifestyle_url2'] ) && ! empty( $list['athleticalifestyle_url2'] ) ? $list['athleticalifestyle_url2'] : '';
            ?>
              <!--slider 1-->
              <div class="swiper-slide">
                <div class="hero-slide-inner">
                    <div class="hero-bg">
                        <?php
							if ( isset( $image['id'] ) ) {
								echo wp_get_attachment_image( $image['id'], 'medium_large' );
							}
						?>
                    </div>
                    <div class="hero-container">
                        <div class="col hero-content">
                            <div class="content-container">
                                
                            <?php if ( $description ) { ?>
                                <h4 class="hero-sub-heading rajdhani-font"><?php echo wp_kses_post( $description ); ?></h4>
                                <?php } ?>

                                <?php if ( $title1 ) { ?>
                                    <h1 class="hero-main-heading"><span class="short-heading"><?php echo esc_html( $title1 ); ?></span><?php echo esc_html( $title2 ); ?> </h1>
                                <?php } ?>

                                <div class=" gredient-btn">
								<?php if ( $btn1_text ) { ?>
                                	<a href="<?php echo $link1 ?>" class="elementor-button"><?php echo esc_html( $btn1_text ); ?></a>
                            	<?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col hero-image">
                            <div class="hero-imgage-container">
								<?php
									if ( isset( $image['id'] ) ) {
										echo wp_get_attachment_image( $prdimage['id'], 'medium_large' );
									}
								?>
                                <!-- <img src="https://athleticalifestyle.com/wp-content/uploads/2023/08/hero-image-2.png " alt=""> -->
                            </div>
                        </div>
                    </div>
                </div>
              </div>             
              
              <?php } ?>	

            </div>
            
          </div>
          <div class="hero-controller">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
    </div>
</div>
			

            <?php
		}
    }
}

