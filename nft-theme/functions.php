<?php
/**
 * NFT Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NFT_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nft_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on NFT Theme, use a find and replace
		* to change 'nft-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'nft-theme', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'nft-theme' ),
            'menu-header' => esc_html__( 'Header', 'nft-theme' ),
            'menu-footer' => esc_html__( 'Footer', 'nft-theme' )
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'nft_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'nft_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nft_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nft_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'nft_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
//function nft_theme_widgets_init() {
//	register_sidebar(
//		array(
//			'name'          => esc_html__( 'Sidebar', 'nft-theme' ),
//			'id'            => 'sidebar-1',
//			'description'   => esc_html__( 'Add widgets here.', 'nft-theme' ),
//			'before_widget' => '<section id="%1$s" class="widget %2$s">',
//			'after_widget'  => '</section>',
//			'before_title'  => '<h2 class="widget-title">',
//			'after_title'   => '</h2>',
//		)
//	);
//}
//add_action( 'widgets_init', 'nft_theme_widgets_init' );





add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/styles/normalize.css');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/styles/style.css');
    wp_enqueue_style( 'googleapis', 'https://fonts.googleapis.com');
    wp_enqueue_style( 'gstatic', 'https://fonts.gstatic.com');
    wp_enqueue_style( 'googleapis2', 'https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');
});

//add_theme_support( 'post-thumbnails' );
//add_theme_support('title-tag');
//add_theme_support('custom-logo');



function nft_theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'logo', 'vantage' ),
        'id' => 'logo_widget',
        'description' => __( 'Logo content.', 'vantage' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
//text widget
function nft_theme_text_content_widgets_init() {
    register_sidebar( array(
        'name' => __( 'text', 'vantage' ),
        'id' => 'text_widget',
        'description' => __( 'Text content.', 'vantage' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
//contacts widget
function nft_theme_contacts_content_widgets_init() {
    register_sidebar( array(
        'name' => __( 'contacts', 'vantage' ),
        'id' => 'contacts_content',
        'description' => __( 'Contacts content.', 'vantage' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'nft_theme_slug_widgets_init' );
add_action( 'widgets_init', 'nft_theme_text_content_widgets_init' );
add_action( 'widgets_init', 'nft_theme_contacts_content_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function nft_theme_scripts() {
	wp_enqueue_style( 'nft-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'nft-theme-style', 'rtl', 'replace' );

    wp_enqueue_style( 'nft-theme-features', get_template_directory_uri().'/assets/css/features.css', array(), _S_VERSION );
    wp_enqueue_style( 'nft-theme-headers', get_template_directory_uri().'/assets/css/headers.css', array(), _S_VERSION );
    wp_enqueue_style( 'nft-theme-footer', get_template_directory_uri().'/assets/css/footer.css', array(), _S_VERSION );
    wp_enqueue_style( 'nft-theme-pricing', get_template_directory_uri().'/assets/css/pricing.css' );
    wp_enqueue_style('bootstrap-css','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

    wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/assets/css/main.min.css', array(), _S_VERSION);
    wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/assets/css/vendor.min.css', array(), _S_VERSION);

    wp_enqueue_script('nft-theme-jquery','https://code.jquery.com/jquery-3.2.1.slim.min.js');
    wp_enqueue_script('bootstrap','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');
    wp_enqueue_script('cdnjs','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
    wp_enqueue_script('nft-theme-svg-sprite',get_template_directory_uri().'/assets/my_js/svg-sprite.js');
    wp_enqueue_script('nft-theme-svg-sprite',get_template_directory_uri().'/assets/my_js/vendor.min.js');


//	wp_enqueue_script( 'nft-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nft_theme_scripts' );


function nft_register_custom_post_type()
{

    register_post_type('catalog', array(
        'labels' => array(
            'name' => _x('Каталог', 'Post type general name', 'textdomain'),
            'singular_name' => _x('Catalog', 'Post type singular name', 'textdomain')
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'catalogs'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
    ));

        register_taxonomy(
            'catalog-type', 'catalog', array('label' => __('Category type'), 'rewrite' => array('slug' => 'catalog-type'), 'hierarchical' => true)
        );

}

add_action('init','nft_register_custom_post_type');






function nft_admin_scripts($hook) {

    if ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'page-new.php' || $hook == 'page.php' ) {
        wp_enqueue_script( 'aletheme_metaboxes', get_template_directory_uri() . '/assets/my_js/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox') );

    }
}
add_action( 'admin_enqueue_scripts', 'nft_admin_scripts', 10 );

function aletheme_metaboxes($meta_boxes){

    $meta_boxes=array();
    $prefix="ale_";

    $meta_boxes[]=array(
      'id'=>'contact_metaboxes',
       'title'=>'Данные',
       'pages'=>array('contact'),
        'context'=>'normal',
        'priority'=>'high',
        'show_names'=>true,

    );
}


function nft_get_attachment($attachment_id){
    $attachment=get_post($attachment_id);
    return array(
        'alt'=>get_post_meta($attachment->ID,'_wp_attachment_image_alt',true),
        'caption'=>$attachment->post_excerpt,
        'description'=>$attachment->post_content,
        'href'=>get_permalink($attachment->ID),
        'str'=>$attachment->guid,
        'title'=>$attachment->post_title
    );
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


//Подключаем хлебные крошки

require get_template_directory() .'/inc/breadcrumbs.php';


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

require get_template_directory() . '/inc/options-panel-redux.php';


require get_template_directory().'/inc/metaboxes.php';

//require get_template_direcrory().'/my_js/metaboxes.js';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
?>

<?php
/**
 * Adds Icons_Widget widget.
 */
class Icons_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'icons_widget', // Base ID
            esc_html__( 'Виджет социальных иконок', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'Социальные иконки в подвале сайта', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        $facebook = $instance['facebook'];
        $instagram = $instance['instagram'];
        $vk = $instance['vk'];
        $telegram = $instance['telegram'];
        $twitter = $instance['twitter'];

        // URL-ссылки социальных профилей
        $facebook_profile = '<div class="social facebook"><a class="facebook" href="' . $facebook . '"><i class="fa fa-facebook fa-2x"></i></a></div>';
        $instagram_profile = '<div class="social instagram"><a class="instagram" href="' . $instagram . '"><i class="fa fa-instagram fa-2x"></i></a></div>';
        $vk_profile = '<div class="social vk"><a class="vk" href="' . $vk . '"><i class="fa fa-vk fa-2x"></i></a></div>';
        $telegram_profile = '<div class="social telegram"><a class="telegram" href="' . $telegram . '"><i class="fa fa-paper-plane fa-2x"></i></a></div>';
        $twitter_profile = '<div class="social twitter"><a class="twitter" href="' . $twitter . '"><i class="fa fa-twitter fa-2x"></i></a></div>';

        echo $args['before_widget'];

        if ( !empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo '<div class="icons-footer">';
        echo ( !empty( $facebook ) ) ? $facebook_profile : null;
        echo ( !empty( $instagram ) ) ? $instagram_profile : null;
        echo ( !empty( $vk ) ) ? $vk_profile : null;
        echo ( !empty( $telegram ) ) ? $telegram_profile : null;
        echo ( !empty( $twitter ) ) ? $twitter_profile : null;
        echo '</div>';

        echo $args['after_widget'];
    }



    public function form( $instance ) {
        isset( $instance['facebook'] ) ? $facebook = $instance['facebook'] : null;
        isset( $instance['instagram'] ) ? $instagram = $instance['instagram'] : null;
        isset( $instance['vk'] ) ? $vk = $instance['vk'] : null;
        isset( $instance['telegram'] ) ? $telegram = $instance['telegram'] : null;
        isset( $instance['twitter'] ) ? $twitter = $instance['twitter'] : null;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Интстаграм:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'vk' ); ?>"><?php _e( 'Вконтакте:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'vk' ); ?>" name="<?php echo $this->get_field_name( 'vk' ); ?>" type="text" value="<?php echo esc_attr( $vk ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'telegram' ); ?>"><?php _e( 'Telegram:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'telegram' ); ?>" name="<?php echo $this->get_field_name( 'telegram' ); ?>" type="text" value="<?php echo esc_attr( $telegram ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>">
        </p>
        <?php
    }


} // class Icons_Widget

// register Icons_Widget

function register_icon_widget() {
    register_widget( 'Icons_Widget' );
}
add_action( 'widgets_init', 'register_icon_widget' );
?>
<?php
/**
 * Adds Text_Widget widget.
 */
class Text_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'text-widget', // Base ID
            esc_html__( 'Контактная информация', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'Контактная информация в подвале', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        // echo $args['before_widget'];
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['mobile'] ) . $args['after_title'];
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['adress'] ) . $args['after_title'];
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['index'] ) . $args['after_title'];
        // echo $args['after_widget'];

    }



    public function form( $instance ) {
        $mobile = ! empty( $instance['mobile'] ) ? $instance['mobile'] : esc_html__( 'mobile', 'text_domain' );
        $adress = ! empty( $instance['adress'] ) ? $instance['adress'] : esc_html__( 'adress', 'text_domain' );
        $index = ! empty( $instance['index'] ) ? $instance['index'] : esc_html__( 'index', 'text_domain' );

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'mobile' ); ?>"><?php _e( 'Номер телефона:' ); ?></label>
            <input class="mobile_text" id="<?php echo $this->get_field_id( 'mobile' ); ?>" name="<?php echo $this->get_field_name( 'mobile' ); ?>" type="text" value="<?php echo esc_attr( $mobile ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'adress' ); ?>"><?php _e( 'Адрес:' ); ?></label>
            <input class="adress_text" id="<?php echo $this->get_field_id( 'adress' ); ?>" name="<?php echo $this->get_field_name( 'adress' ); ?>" type="text" value="<?php echo esc_attr( $adress ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'index' ); ?>"><?php _e( 'Индекс:' ); ?></label>
            <input class="index_text" id="<?php echo $this->get_field_id( 'index' ); ?>" name="<?php echo $this->get_field_name( 'index' ); ?>" type="text" value="<?php echo esc_attr( $index ); ?>">
        </p>
        <?php
    }

} // class Text_Widget

// register Text_Widget
function register_text_widget() {
    register_widget( 'Text_Widget' );
}
add_action( 'widgets_init', 'register_text_widget' );
?>

