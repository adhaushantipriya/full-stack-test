<?php
/**
 * wpoettest functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpoettest
 */

if ( ! function_exists( 'wpoettest_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wpoettest_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wpoettest, use a find and replace
		 * to change 'wpoettest' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wpoettest', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wpoettest' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wpoettest_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wpoettest_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpoettest_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wpoettest_content_width', 640 );
}
add_action( 'after_setup_theme', 'wpoettest_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wpoettest_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wpoettest' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wpoettest' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wpoettest_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wpoettest_scripts() {
	wp_enqueue_style( 'wpoettest-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'wpoettest-slick-css', get_template_directory_uri() . '/css/slick.css' );
	wp_enqueue_style( 'wpoettest-custom-css', get_template_directory_uri() . '/css/custom.css' );

	wp_enqueue_script( 'wpoettest-jquery', get_template_directory_uri() . '/js/jquery.js');
	wp_enqueue_script( 'wpoettest-navigation', get_template_directory_uri() . '/js/navigation.js');
	wp_enqueue_script( 'wpoettest-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js');
	wp_enqueue_script( 'wpoettest-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.js');
	wp_enqueue_script( 'wpoettest-slick-js', get_template_directory_uri() . '/js/slick.min.js');
	wp_enqueue_script( 'wpoettest-custom-js', get_template_directory_uri() . '/js/custom.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Remove admin login header.
 */
add_action( 'wp_enqueue_scripts', 'wpoettest_scripts' );

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Services post type.
 */
function services_cpt() {
	$labels = array(
		'name'                => __( 'Services' ),
		'singular_name'       => __( 'Service'),
		'menu_name'           => __( 'Services'),
		'parent_item_colon'   => __( 'Parent Service'),
		'all_items'           => __( 'All Services'),
		'view_item'           => __( 'View Service'),
		'add_new_item'        => __( 'Add New Service'),
		'add_new'             => __( 'Add New'),
		'edit_item'           => __( 'Edit Service'),
		'update_item'         => __( 'Update Service'),
		'search_items'        => __( 'Search Service'),
		'not_found'           => __( 'Not Found'),
		'not_found_in_trash'  => __( 'Not found in Trash')
	);
	$args = array(
		'label'               => __( 'services'),
		'description'         => __( 'Best Services'),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
		'public'              => true,
		'hierarchical'        => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'has_archive'         => true,
		'can_export'          => true,
		'exclude_from_search' => false,
		'menu_icon'           => 'dashicons-admin-tools',
	        'yarpp_support'       => true,
		'taxonomies' 	      => array('post_tag'),
		'publicly_queryable'  => true,
		'capability_type'     => 'page'
);
	register_post_type( 'services', $args );
}
add_action( 'init', 'services_cpt', 0 );

/**
 * Services type taxonomy.
 */
add_action( 'init', 'services_type_taxonomy', 0 );
function services_type_taxonomy() {

  $labels = array(
    'name' => _x( 'Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Type' ),
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Types' ),
  );

  register_taxonomy('service_type',array('services'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'service_type' ),
  ));
}

/**
 * Services type taxonomy image field.
 */
if( ! class_exists( 'Services_Taxonomy_Images' ) ) {
	class Services_Taxonomy_Images {

	  public function __construct() {
	   //
	  }

	  /**
	   * Initialize the class and start calling our hooks and filters
	   */
	   public function init() {
	   // Image actions
	   add_action( 'service_type_add_form_fields', array( $this, 'add_category_image' ), 10, 2 );
	   add_action( 'created_service_type', array( $this, 'save_category_image' ), 10, 2 );
	   add_action( 'service_type_edit_form_fields', array( $this, 'update_category_image' ), 10, 2 );
	   add_action( 'edited_service_type', array( $this, 'updated_category_image' ), 10, 2 );
	   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
	   add_action( 'admin_footer', array( $this, 'add_script' ) );
	 }

	 public function load_media() {
	   if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'service_type' ) {
		 return;
	   }
	   wp_enqueue_media();
	 }

	 /**
	  * Add a form field in the new category page
	  * @since 1.0.0
	  */

	 public function add_category_image( $taxonomy ) { ?>
	   <div class="form-field term-group">
		 <label for="showcase-taxonomy-image-id"><?php _e( 'Image', 'showcase' ); ?></label>
		 <input type="hidden" id="showcase-taxonomy-image-id" name="showcase-taxonomy-image-id" class="custom_media_url" value="">
		 <div id="category-image-wrapper"></div>
		 <p>
		   <input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php _e( 'Add Image', 'showcase' ); ?>" />
		   <input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php _e( 'Remove Image', 'showcase' ); ?>" />
		 </p>
	   </div>
	 <?php }

	 /**
	  * Save the form field
	  * @since 1.0.0
	  */
	 public function save_category_image( $term_id, $tt_id ) {
	   if( isset( $_POST['showcase-taxonomy-image-id'] ) && '' !== $_POST['showcase-taxonomy-image-id'] ){
		 add_term_meta( $term_id, 'showcase-taxonomy-image-id', absint( $_POST['showcase-taxonomy-image-id'] ), true );
	   }
	  }

	  /**
	   * Edit the form field
	   * @since 1.0.0
	   */
	  public function update_category_image( $term, $taxonomy ) { ?>
		<tr class="form-field term-group-wrap">
		  <th scope="row">
			<label for="showcase-taxonomy-image-id"><?php _e( 'Image', 'showcase' ); ?></label>
		  </th>
		  <td>
			<?php $image_id = get_term_meta( $term->term_id, 'showcase-taxonomy-image-id', true ); ?>
			<input type="hidden" id="showcase-taxonomy-image-id" name="showcase-taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
			<div id="category-image-wrapper">
				<style>
					#category-image-wrapper img {
						width: auto;
						height: auto;
					}
				</style>
			  <?php if( $image_id ) { ?>
				<?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
			  <?php } ?>
			</div>
			<p>
			  <input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php _e( 'Add Image', 'showcase' ); ?>" />
			  <input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php _e( 'Remove Image', 'showcase' ); ?>" />
			</p>
		  </td>
		</tr>
	 <?php }

	 /**
	  * Update the form field value
	  * @since 1.0.0
	  */
	 public function updated_category_image( $term_id, $tt_id ) {
	   if( isset( $_POST['showcase-taxonomy-image-id'] ) && '' !== $_POST['showcase-taxonomy-image-id'] ){
		 update_term_meta( $term_id, 'showcase-taxonomy-image-id', absint( $_POST['showcase-taxonomy-image-id'] ) );
	   } else {
		 update_term_meta( $term_id, 'showcase-taxonomy-image-id', '' );
	   }
	 }

	 /**
	  * Enqueue styles and scripts
	  * @since 1.0.0
	  */
	 public function add_script() {
	   if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'service_type' ) {
		 return;
	   } ?>
	   <script> jQuery(document).ready( function($) {
		 _wpMediaViewsL10n.insertIntoPost = '<?php _e( "Insert", "showcase" ); ?>';
		 function ct_media_upload(button_class) {
		   var _custom_media = true, _orig_send_attachment = wp.media.editor.send.attachment;
		   $('body').on('click', button_class, function(e) {
			 var button_id = '#'+$(this).attr('id');
			 var send_attachment_bkp = wp.media.editor.send.attachment;
			 var button = $(button_id);
			 _custom_media = true;
			 wp.media.editor.send.attachment = function(props, attachment){
			   if( _custom_media ) {
				 $('#showcase-taxonomy-image-id').val(attachment.id);
				 $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
				 $( '#category-image-wrapper .custom_media_image' ).attr( 'src',attachment.url ).css( 'display','block' );
			   } else {
				 return _orig_send_attachment.apply( button_id, [props, attachment] );
			   }
			 }
			 wp.media.editor.open(button); return false;
		   });
		 }
		 ct_media_upload('.showcase_tax_media_button.button');
		 $('body').on('click','.showcase_tax_media_remove',function(){
		   $('#showcase-taxonomy-image-id').val('');
		   $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
		 });
		 $(document).ajaxComplete(function(event, xhr, settings) {
		   var queryStringArr = settings.data.split('&');
		   if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
			 var xml = xhr.responseXML;
			 $response = $(xml).find('term_id').text();
			 if($response!=""){
			   // Clear the thumb image
			   $('#category-image-wrapper').html('');
			 }
			}
		  });
		});
	  </script>
	 <?php }
	}
  $Services_Taxonomy_Images = new Services_Taxonomy_Images();
  $Services_Taxonomy_Images->init(); }

/**
 * Enable SVG upload.
 */
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');