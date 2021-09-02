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
		return 'mgn-collapse';
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
		return __( 'MGN Collapse', 'mgn-best-widgets-for-elementor' );
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
		return 'eicon-posts-ticker';
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
		return [ 'mgn-best-widget-for-elementor' ];
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
				'label' => __( 'Content', 'elementor-hello-world' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Title here', 'elementor-hello-world' )
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => __( 'Subtitle', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Subtitle here', 'elementor-hello-world' )
			]
		);


		$this->add_control(
			'title_span',
			[
				'label' => __( 'Title Span', 'elementor-hello-world' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '(Ex)', 'elementor-hello-world' )
			]
		);


		$this->add_control(
			'tabs',
			[
				'label' => __( 'Items', 'mgn-best-widgets-for-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title' => __( 'Toggle #1', 'mgn-best-widgets-for-elementor' ),
						'tab_content' => __( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'mgn-best-widgets-for-elementor' ),
					],
					[
						'tab_title' => __( 'Toggle #2', 'mgn-best-widgets-for-elementor' ),
						'tab_content' => __( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'mgn-best-widgets-for-elementor' ),
					],
				],
				'fields' => [
					[
						'name' => 'tab_title',
						'label' => __( 'Title & Content', 'mgn-best-widgets-for-elementor' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => __( 'Toggle Title' , 'mgn-best-widgets-for-elementor' ),
					],
					[
						'name' => 'tab_description',
						'label' => __( 'Description', 'mgn-best-widgets-for-elementor' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => __( '100' , 'mgn-best-widgets-for-elementor' ),
					],
					[
						'name' => 'tab_image',
						'label' => __( 'Image', 'mgn-best-widgets-for-elementor' ),
						'type' => Controls_Manager::MEDIA,
						'label_block' => true,
						'default' => ''
					],
					[
						'name' => 'tab_content',
						'label' => __( 'Content', 'mgn-best-widgets-for-elementor' ),
						'type' => Controls_Manager::WYSIWYG,
						'default' => __( 'Toggle Content', 'mgn-best-widgets-for-elementor' ),
						'show_label' => false,
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->end_controls_section();
		

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'elementor-hello-world' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);



		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'elementor-hello-world' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'elementor-hello-world' ),
					'uppercase' => __( 'UPPERCASE', 'elementor-hello-world' ),
					'lowercase' => __( 'lowercase', 'elementor-hello-world' ),
					'capitalize' => __( 'Capitalize', 'elementor-hello-world' ),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
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
		$tabs = $this->get_settings( 'tabs' );
		?>
		<div class="mgn-collapse">
			<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-row">
					<div class="elementor-column elementor-col-50 elementor-inner-column">
						<div class="elementor-widget-wrap">
							<div class="tab-title mgn-row">
								<h3 class="text-left mgn-col"><?php echo $settings['title']; ?></h3>
								<h4 class="text-right mgn-col"><span><?php echo $settings['subtitle']; ?></span> <span class="small"><?php echo $settings['title_span']; ?></span></h4>
							</div>
							<ul class="mgn-collapse-list" role="tablist">
							<?php $counter = 1; ?>
							<?php foreach ( $tabs as $item ) : ?>
								<li role="presentation" class="mgn-collapse-title<?php echo $counter == 1 ?' active' : ''; ?>" data-tab="<?php echo $counter; ?>">
									<a aria-controls="f<?php echo $counter; ?>" role="tab" aria-expanded="<?php echo $counter == 1 ?'true' : 'false'; ?>" href="#f<?php echo $counter; ?>" role="tab" data-toggle="tab">
									<span class="mgn-collapse-icon">
										<i class="fa"></i>
										<?php echo $item['tab_title']; ?>
									</span>
									<span class="pull-right"><?php echo $item['tab_description']; ?></span>
									</a>
								</li>
								<!--<div class="mgn-collapse-content elementor-clearfix" data-tab="<?php echo $counter; ?>"><?php echo $this->parse_text_editor( $item['tab_content'] ); ?></div>-->
							<?php
								$counter++;
							endforeach;
							?>
							</ul>
						</div>
					</div>
					<div class="elementor-column elementor-col-50 elementor-inner-column">
						<div class="elementor-widget-wrap">
							<div class="tab-content">
								<?php 
								$counter = 1;
								foreach ( $tabs as $item ) : 
								?>
								<div role="tabpanel" id="f<?php echo $counter; ?>" class="tab-panel fade<?php echo $counter == 1 ?' active' : ''; ?>">
									<div class="image-part">
										<div class="content-image">
											<div>
												<div class="image" style="background-image: url(<?php echo empty( $item['tab_image']['url'] )? '' : $item['tab_image']['url']; ?>);" alt=""></div>
											</div>
										</div>
									</div>
									<div class="title">
										<h4><?php echo $item['tab_title']; ?> <span class="small"><?php echo $item['tab_description']; ?></span></h4>
									</div>		
									<p>
									<?php echo $item['tab_content']; ?>
									</p>
								</div>
								<?php 
								$counter++;
								endforeach; 
								?>
							</div>
						</div>
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
		<div class="mgn-collapse">
			<div class="elementor-container elementor-column-gap-default">
				<div class="elementor-row">
					<div class="elementor-column elementor-col-50 elementor-inner-column">
						<div class="elementor-widget-wrap">
							<div class="tab-title mgn-row">
								<h3 class="text-left mgn-col">{{{ settings.title }}}</h3>
								<h4 class="text-right mgn-col"><span>{{{ settings.subtitle }}}</span> <span class="small">{{{ settings.title_span }}}</span></h4>
							</div>
							<ul class="mgn-collapse-list" role="tablist">
								<#
								if ( settings.tabs ) {
									var counter = 1;
									_.each(settings.tabs, function( item ) { #>
								<li role="presentation" class="mgn-collapse-title {{{ counter == 1? 'active' : '' }}}" data-tab="{{{ counter }}}">
									<a aria-controls="f{{{ counter }}}" role="tab" aria-expanded="{{{ counter == 1? 'true' : 'false' }}}" href="#f{{{ counter }}}" role="tab" data-toggle="tab">
									<span class="mgn-collapse-icon">
										<i class="fa"></i>
										{{{ item.tab_title }}}
									</span>
									<span class="pull-right">{{{ item.tab_description }}}</span>
									</a>
								</li>
								
								<#
										counter++;
									} );
								} #>
							</ul>
						</div>
					</div>
					<div class="elementor-column elementor-col-50 elementor-inner-column">
						<div class="elementor-widget-wrap">
							<div class="tab-content">
								<#
								if ( settings.tabs ) {
									
									var counter = 1;
									_.each(settings.tabs, function( item ) { 
								#>
								<div role="tabpanel" id="f{{{counter}}}" class="tab-panel fade{{{ counter == 1 ? ' active' : '' }}}">
									<div class="image-part">
										<div class="content-image">
											<div>
												<div class="image" style="background-image: url({{{ item.tab_image.url }}});" alt="image"></div>
											</div>
										</div>
									</div>
									<div class="title">
										<h4>{{{ item.tab_title }}} <span class="small">{{{ item.tab_description }}}</span></h4>
									</div>		
									<p>
									{{{ item.tab_content }}}
									</p>
								</div>
								<#
										counter++;
									} );
								} #>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
