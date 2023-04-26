<?php


// Path: myTheme\functions.php

// Menus

add_theme_support( 'menus' );

// Register Menus

function register_theme_menus() {

  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );

}

add_action( 'init', 'register_theme_menus' );

// enable featured images

add_theme_support( 'post-thumbnails' );

// add tailwind cdn



// add css and js files

function add_theme_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'tailwind', get_template_directory_uri() . '/dist/output.css', array(), '1.0.0', 'all');
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array(), '1.0.0', 'all');

    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.1, true);
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

// register sidebars

function my_sidebars() {

  register_sidebar(
    array(
      'name' => __( 'Sidebar' ),
      'id' => 'sidebar',
      'description' => __( 'Sidebar' ),
    )
  );

	register_sidebar(
    array(
      'name' => __( 'Home Page Widget Area' ),
      'id' => 'home-page-widget-area',
      'description' => __( 'Home Page Widget Area' ),
    )
  );

}

add_action( 'widgets_init', 'my_sidebars' );


class Foo_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			'Foo_Widget', // Name
			array( 'description' => __( 'A Foo Widget', 'text_domain' ) ) // Args
		);
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
    // The 1st Query
    $args = [
      'post_type'  => 'roms',
      'post_status' => 'publish',
      'posts_per_page' => 5,
      'orderby' => 'post_date',
      'order' => 'DESC',
    ];
    $most_recent = new WP_Query( $args );
    if ( $most_recent->have_posts() ) {
      // The Loop
      while ( $most_recent->have_posts() ) { $most_recent->the_post();

          echo '<article class="widget-post">
                  '. get_the_post_thumbnail(get_the_ID(), array(64, 64)) .'
                  <div>
                  <h3>
                    <a href="' . get_the_permalink() . '">' . get_the_title() . '</a>
                  </h3>
                  <span> <svg width="16" height="16" class="fill-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path></svg>' . get_post_meta( get_the_ID(), 'downloads', true) . '</span>
                  </div>
                </article>';

      
      }
      // Restore original Post Data
      wp_reset_postdata();
    }
		
		echo $after_widget;
	}
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		 </p>
		<?php
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // class Foo_Widget
// Register Foo_Widget widget
add_action( 'widgets_init', 'register_foo' );
function register_foo() {
	register_widget( 'Foo_Widget' );
}


class Taxonomy_widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'taxonomy_widget', // Base ID
			'Taxonomies', // Name
			array( 'description' => __( 'List a Taxonomy', 'text_domain' ) ) // Args
		);
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
    // The 1st Query
    $args = [
      'taxonomy'   => 'console',
      'hide_empty' => false,
    ];

		$terms = get_terms( $args );
    
		if ( ! empty( $terms ) && is_array( $terms ) ) {
			// Run a loop and print them all
			foreach ( $terms as $term ) {
				

			}
		}
		
		echo $after_widget;
	}
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		 </p>
		<?php
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // class Foo_Widget
// Register Foo_Widget widget
add_action( 'widgets_init', 'register_taxonomy_widget' );
function register_taxonomy_widget() {
	register_widget( 'Taxonomy_widget' );
}