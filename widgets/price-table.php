<?php
namespace ElementorHelloWorld\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Hello_World extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'price table';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'price table', 'elements' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-pager';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'elementor-hello-world' ];
	}
	public function get_style_depends() {
		return [ 'core_css' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'Elements' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'elements' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'description',
			[
				'label' => __( 'Description', 'elements' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);
		$this->add_control(
			'services',
			[
				'label' => __( 'Services', 'elements' ),
				'type' => Controls_Manager::WYSIWYG,
			]
		);
		$this->add_control(
			'price_tag',
			[
				'label' => __( 'Price Tag', 'elements' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'elements' ),
				'type' => Controls_Manager::NUMBER,
			]
		);
		$this->add_control(
			'user_count',
			[
				'label' => __( 'User Count', 'elements' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'user_month',
			[
				'label' => __( 'User Month', 'elements' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Button Text', 'elements' ),
				'type' => Controls_Manager::TEXT,
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'Elements' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'font_family',
			[
				'label' => __( 'Font Family', 'elements' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .title' => 'font-family: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>

			<div class="container">
					<div class="first-list ">
				<div class="first-list-row-1">
					<h1><?php echo $settings['title']; ?></h1>
					<p><?php echo $settings['description']; ?></p>
				</div>
				<div class="first-list-row-2 ">
					<span>
						<?php echo $settings['services']; ?></span>
					
				</div>
				<div class="first-list-row-3">
						<hr>
					<p class="dollar"><?php echo $settings['price_tag']; ?></p>
					<h3 class="price"><?php echo $settings['price']; ?></h3>
					<div class="per">
						<p class="user"><?php echo $settings['user_count']; ?></p>
						<p class="month"><?php echo $settings['user_month']; ?></p>

					</div>
					<hr>
					<div class="btn">
						<a class="button1" href="#"><?php echo $settings['btn_text']; ?></a>
					</div>
				</div>
			</div>
			</div>

		<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		?>
		<div class="title">
			{{{ settings.title }}}
		</div>
		<?php
	}
}