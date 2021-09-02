<?php
namespace ElementorHelloWorld\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Product Summary
 *
 * Widget for woocommerce product infos summary
 *
 * @since 1.0.0
 */
class ProductAddToCart extends Widget_Base {

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
		return 'mgn-product-add-to-cart';
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
		return __( 'MGN Product Add To Cart', 'mgn-best-widgets-for-elementor' );
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
        //wc_get_template( 'single-product/price.php' );

        //Continuar Daqui
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Button', 'mgn-best-widgets-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __( 'Typography', 'mgn-best-widgets-for-elementor' ),
				'scheme' => '',
                'separator' => 'after',
				'selector' => '{{WRAPPER}} .mgn-product-add-to-cart form button.single_add_to_cart_button.button.alt',
			]
        );

		$this->start_controls_tabs(
			'style_tabs'
		);

			$this->start_controls_tab(
				'style_normal_tab',
				[
					'label' => __( 'Normal', 'mgn-best-widgets-for-elementor' ),
				]
			);

				$this->add_control(
					'button_text_color', 
					[
						'label' => __('Button Text Color', 'mgn-best-widgets-for-elementor'), 
						'type' => Controls_Manager::COLOR, 
						'scheme' => 
						[
							'type' => Scheme_Color::get_type(), 
							'value' => Scheme_Color::COLOR_3
						], 
						'default' => '', 
						'selectors' => 
						[
							'{{WRAPPER}} .mgn-product-add-to-cart form button.single_add_to_cart_button.button.alt' => 'color: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'button_background_color', 
					[
						'label' => __('Button Background', 'mgn-best-widgets-for-elementor'), 
						'type' => Controls_Manager::COLOR, 
						'scheme' => 
						[
							'type' => Scheme_Color::get_type(), 
							'value' => Scheme_Color::COLOR_3
						], 
						'default' => '', 
						'selectors' => 
						[
							'{{WRAPPER}} .mgn-product-add-to-cart form button.single_add_to_cart_button.button.alt' => 'background-color: {{VALUE}} !important;'
						]
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'style_hover_tab',
				[
					'label' => __( 'Hover', 'mgn-best-widgets-for-elementor' ),
				]
			);

				$this->add_control(
					'button_text_color_hover', 
					[
						'label' => __('Button Text Color', 'mgn-best-widgets-for-elementor'), 
						'type' => Controls_Manager::COLOR, 
						'scheme' => 
						[
							'type' => Scheme_Color::get_type(), 
							'value' => Scheme_Color::COLOR_3
						], 
						'default' => '', 
						'selectors' => 
						[
							'{{WRAPPER}} .mgn-product-add-to-cart form button.single_add_to_cart_button.button.alt:hover' => 'color: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'button_background_color_hover', 
					[
						'label' => __('Button Background', 'mgn-best-widgets-for-elementor'), 
						'type' => Controls_Manager::COLOR, 
						'scheme' => 
						[
							'type' => Scheme_Color::get_type(), 
							'value' => Scheme_Color::COLOR_3
						], 
						'default' => '', 
						'selectors' => 
						[
							'{{WRAPPER}} .mgn-product-add-to-cart form button.single_add_to_cart_button.button.alt:hover' => 'background-color: {{VALUE}} !important; background-image: none;'
						]
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'mgn-best-widgets-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .mgn-product-add-to-cart form button.single_add_to_cart_button.button.alt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'mgn-best-widgets-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .mgn-product-add-to-cart form button.single_add_to_cart_button.button.alt' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'quantity_style',
			[
				'label' => __( 'Quantity', 'mgn-best-widgets-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        /*$this->add_control(
			'space_price_input', 
			[
				'label' => __('Height', 'mgn-best-widgets-for-elementor'), 
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 35,
				'selectors' => 
				[
					'{{WRAPPER}} div.mgn-product-add-to-cart form.cart .quantity input[type=number]' => 'height: {{VALUE}}px;'
				]
			]
		);*/

		$this->add_control(
			'quantity_border_radius',
			[
				'label' => __( 'Border Radius', 'mgn-best-widgets-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} div.mgn-product-add-to-cart form.cart .quantity input[type=number]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		global $product;
        if(!$product)
            return;
		?>
			<style>
				.mgn-product-add-to-cart form .quantity{
					display: inline-block;
				}
				.mgn-product-add-to-cart .buyOnWhatsapp{
					display: none;
				}
				.mgn-product-add-to-cart form.cart{
					display: flex;
				}
				.mgn-product-add-to-cart form.cart .quantity input[type=number]{
					height: 100%;
					outline: 0;
				}
				.mgn-product-add-to-cart form button.single_add_to_cart_button.button.alt{
					outline: 0;
				}
			</style>
			<div class="mgn-product-add-to-cart">
		<?php
			do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' );
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
            .mgn-product-add-to-cart form .quantity{
                display: inline-block;
            }
            .mgn-product-add-to-cart .buyOnWhatsapp{
                display: none;
            }
			.mgn-product-add-to-cart form.cart{
				display: flex;
			}
			.mgn-product-add-to-cart form.cart .quantity input[type=number]{
				height: 100%;
				outline: 0;
			}
			.mgn-product-add-to-cart form button.single_add_to_cart_button.button.alt{
				outline: 0;
			}
        </style>
		<div class="mgn-product-add-to-cart">
		<?php
			do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' );
		?>
		</div>
		<?php
    }
}