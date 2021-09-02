<?php
namespace ElementorHelloWorld\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Product Price
 *
 * Widget for woocommerce product infos price
 *
 * @since 1.0.0
 */
class ProductPrice extends Widget_Base {

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
		return 'mgn-product-price';
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
		return __( 'MGN Product Price', 'mgn-best-widgets-for-elementor' );
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
		return 'eicon-product-description';
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
		return [ 'woocommerce-elements' ];
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
		//return [ 'elementor-hello-world' ]; 
	}

    /**
     * Styles dependencies
     */
    public function get_style_depends() {
		//return [ 'mgn-best-widget-for-elementor' ];
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
			'content_section',
			[
				'label' => __( 'Button', 'mgn-best-widgets-for-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


			$this->add_control(
				'text_align',
				[
					'label' => __( 'Alignment', 'mgn-best-widgets-for-elementor' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'mgn-best-widgets-for-elementor' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'mgn-best-widgets-for-elementor' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'mgn-best-widgets-for-elementor' ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'left',
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .mgn-product-price-box' => 'text-align: {{VALUE}};'
					]
				]
			);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Price', 'mgn-best-widgets-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'currency_typography',
				'label' => __( 'Currency Typography', 'mgn-best-widgets-for-elementor' ),
				'scheme' => '',
				'selector' => '{{WRAPPER}} .mgn-product-price-box p.price .woocommerce-Price-amount.amount .woocommerce-Price-currencySymbol',
			]
        );

		$this->add_control(
			'currency_color', 
			[
				'label' => __('Currency Color', 'elementor'), 
				'type' => Controls_Manager::COLOR, 
				'separator' => 'after',
				'scheme' => 
				[
					'type' => Scheme_Color::get_type(), 
					'value' => Scheme_Color::COLOR_3
				], 
				'default' => '', 
				'selectors' => 
				[
					'{{WRAPPER}} .mgn-product-price-box p.price .woocommerce-Price-amount.amount .woocommerce-Price-currencySymbol' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'label' => __( 'Price Typography', 'mgn-best-widgets-for-elementor' ),
				'scheme' => '',
				'selector' => '{{WRAPPER}} .mgn-product-price-box p.price .woocommerce-Price-amount.amount bdi',
			]
        );

		$this->add_control(
			'content_content_color', 
			[
				'label' => __('Price Color', 'mgn-best-widgets-for-elementor'), 
				'type' => Controls_Manager::COLOR, 
				'scheme' => 
				[
					'type' => Scheme_Color::get_type(), 
					'value' => Scheme_Color::COLOR_3
				], 
				'default' => '', 
				'separator' => 'after',
				'selectors' => 
				[
					'{{WRAPPER}} .mgn-product-price-box p.price .woocommerce-Price-amount.amount bdi' => 'color: {{VALUE}} !important;'
				]
			]
		);

		$this->add_control(
			'space_price', 
			[
				'label' => __('Space', 'mgn-best-widgets-for-elementor'), 
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 10,
				'selectors' => 
				[
					'{{WRAPPER}} .mgn-product-price-box p.price .woocommerce-Price-amount.amount bdi .woocommerce-Price-currencySymbol' => 'margin-right: {{VALUE}}px;'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_old_price',
			[
				'label' => __( 'Old Price', 'mgn-best-widgets-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'old_price_typography',
				'label' => __( 'Old Price Typography', 'mgn-best-widgets-for-elementor' ),
				'scheme' => '',
				'selector' => '{{WRAPPER}} .mgn-product-price-box p.price .woocommerce-Price-amount.amountaa bdi',
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
		global $product;
        if(!$product)
            return;
		?>
			<style>
				.mgn-product-price-box .price-socio{
					display: none;
				}
			</style>
			<div class="mgn-product-price-box">
		<?php
			wc_get_template( 'single-product/price.php' );
		?>
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
		global $product;
        if(!$product)
            return;
		?>
		<style>
			.mgn-product-price-box .price-socio{
				display: none;
			}
		</style>
		<div class="mgn-product-price-box">
		<?php
			wc_get_template( 'single-product/price.php' );
		?>
		</div>
		<?php
    }
}