<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rm_widgets_init() {

	// Homepage sections
	register_sidebar( array(
		'name'          => __( 'Homepage sections', 'rm' ),
		'id'            => 'rm-homepage-sections',
		'description'	=> '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_widget( 'Rm_Latest_News' );
}

add_action( 'widgets_init', 'rm_widgets_init' );

class Rm_Latest_News extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'news', 'description' => __( 'Display the latest news', 'dynamic' ) );
		parent::__construct( 'news', __('Latest News','rm' ), $widget_ops );
	}

	function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$latest_news = rm_get_latest_posts(get_field( 'latest_news_to_show', 'option' ));

		echo $args['before_widget'];

		$markup = '<section id="latest-news" class="latest-news band">';
		$markup.= '<div class="container">';
		$markup.= '<div class="slider">';
		echo $markup;

		while( $latest_news->have_posts() ) : $latest_news->the_post();
			get_template_part( 'template-parts/content', 'entry' );
		endwhile;

		wp_reset_postdata();

		$markup = '</div><!-- slider -->';
		$markup.= '</div><!-- container -->';
		$markup.= '</section><!-- latest-news -->';
		echo $markup;

		echo $args['after_widget'];
	}
}
