<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.opushive.com
 * @since      1.0.0
 *
 * @package    Infinite_scroll_hotmagazine
 * @subpackage Infinite_scroll_hotmagazine/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Infinite_scroll_hotmagazine
 * @subpackage Infinite_scroll_hotmagazine/public
 * @author     Opus Hive <info@opushive.com>
 */
class Infinite_scroll_hotmagazine_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Infinite_scroll_hotmagazine_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Infinite_scroll_hotmagazine_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/infinite_scroll_hotmagazine-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Infinite_scroll_hotmagazine_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Infinite_scroll_hotmagazine_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/infinite_scroll_hotmagazine-public.js', array( 'jquery' ), $this->version, false );

	}

	public function hotmagazine_load_postsl() {
		global $hotmagazine_options;
		$response = '';
		$cat = $_POST['cat'];
		$order = $_POST['order'];
		$thumb = $_POST['thumb'];
		$offset = $_POST['offset'];
		$args = array(
			'post_type' => 'post',
			'posts_per_page' =>$order,
			'post_status' => 'publish',
			'offset' =>$offset,
		    'cat' => $cat,
		);
		$portfolio = new WP_Query($args);
	?>	

	<?php 
	      if($portfolio->have_posts()) :
	             $i=1; while($portfolio->have_posts()) : $portfolio->the_post(); 
	    ?>
		

		<div class="news-post article-post">
			
			<div class="row">
				<div class="col-sm-<?php echo esc_attr($thumb); ?>">
				<div class="post-content">
          			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h1>
				</div> 
					<div class="post-gallery">
						<?php if(has_post_thumbnail()){ ?>
						<?php the_post_thumbnail(''); ?>
						<?php }else{ ?>
						<img src="http://placehold.it/270x200" />
						<?php } ?>
					<?php if($hotmagazine_options['body_style']!='' and $hotmagazine_options['body_style']=='fashion' ){ ?>
						<div class="hover-box">
							<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
						</div>
					<?php } ?>
					</div>
				</div>
				<div class="col-sm-<?php echo esc_attr(12-$thumb); ?>">
					<div class="post-content">
						<?php 
							
							if($hotmagazine_options['body_style']!='' and $hotmagazine_options['body_style']=='fashion' ){ ?>
								<?php 
								$category_detail=get_the_category($id);//$post->ID
								foreach($category_detail as $cd){ ?>
								<a class="category-post <?php echo esc_html($cd->slug); ?>" href="<?php echo get_category_link( $cd->term_id ); ?>"><?php echo esc_html($cd->cat_name); ?></a> 

								
								<?php } ?>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h2>
								<ul class="post-tags">
									<li><i class="fa fa-clock-o"></i><?php the_time(get_option( 'date_format' )); ?></li>
									<li><i class="fa fa-user"></i><?php esc_html_e('by','hotmagazine'); ?> <?php the_author_posts_link(); ?></li>
									<li> <?php comments_popup_link('<i class="fa fa-comments-o"></i><span>0</span> ','<i class="fa fa-comments-o"></i><span>1</span>','<i class="fa fa-comments-o"></i><span>%</span>','comm'); ?></li>
									<li><i class="fa fa-eye"></i><?php echo hotmagazine_getPostViews(get_the_ID()); ?></li>
								</ul>
						<?php	}else{ ?>
						
						<!-- <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h2> -->
						
						<ul class="post-tags">
							<li><i class="fa fa-clock-o"></i><?php the_time(get_option( 'date_format' )); ?></li>
							<li><i class="fa fa-user"></i><?php esc_html_e('by','hotmagazine'); ?> <?php the_author_posts_link(); ?></li>
							<li> <?php comments_popup_link('<i class="fa fa-comments-o"></i><span>0</span> ','<i class="fa fa-comments-o"></i><span>1</span>','<i class="fa fa-comments-o"></i><span>%</span>','comm'); ?></li>
							<li><i class="fa fa-eye"></i><?php echo hotmagazine_getPostViews(get_the_ID()); ?></li>
						</ul>
						<?php  if(function_exists('rw_the_post_rating')){rw_the_post_rating($postID = false, $class = 'blog-post', $schema = false);} ?>
						<p><?php the_excerpt(); ?></p>
							<?php if($rate!='yes' and $custom['body_style']!='politics'){ ?>
							<div class="clear"></div>
							<a href="<?php the_permalink(); ?>" class="read-more-button"><i class="fa fa-arrow-circle-right"></i><span><?php esc_html_e('Read More','hotmagazine'); ?></span></a>
							<?php } ?>
						
						<?php } ?>
					</div>
				</div>
			</div>

		</div>

		

		<?php $i++; endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>

		<?php	
			echo $response;
			die();
	}
// add_action('wp_ajax_hotmagazine_load_postsl', 'hotmagazine_load_postsl');
// add_action('wp_ajax_nopriv_hotmagazine_load_postsl', 'hotmagazine_load_postsl');

}
