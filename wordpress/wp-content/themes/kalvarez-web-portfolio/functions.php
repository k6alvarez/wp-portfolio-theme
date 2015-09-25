<?php
/**
 * K.Alvarez Web Portfolio functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package K.Alvarez Web Portfolio
 */

if ( ! function_exists( 'kalvarez_web_portfolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kalvarez_web_portfolio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on K.Alvarez Web Portfolio, use a find and replace
	 * to change 'kalvarez-web-portfolio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kalvarez-web-portfolio', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'kalvarez-web-portfolio' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kalvarez_web_portfolio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // kalvarez_web_portfolio_setup
add_action( 'after_setup_theme', 'kalvarez_web_portfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kalvarez_web_portfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kalvarez_web_portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'kalvarez_web_portfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kalvarez_web_portfolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kalvarez-web-portfolio' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'kalvarez_web_portfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kalvarez_web_portfolio_scripts() {
	wp_enqueue_style( 'kalvarez-web-portfolio-style', get_stylesheet_uri() );

	wp_enqueue_style( 'kalvarez-web-portfolio-site-style', get_template_directory_uri() . '/css/style.css' );

	wp_enqueue_script( 'kalvarez-web-portfolio-navigation', get_template_directory_uri() . '/js/site.js', array('jquery'), '20150902', true );

	wp_enqueue_script( 'kalvarez-web-portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'kalvarez-web-portfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kalvarez_web_portfolio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Create Tables
 */
add_action("after_switch_theme", "create_tables_function");

function create_tables_function()
{
	global $wpdb;

	//create a table to hold skills cards
	$tablename = $wpdb->prefix.'skills_cards';
	$cSQL = "
		CREATE TABLE $tablename (
			id mediumint(10) NOT NULL AUTO_INCREMENT,
			title text,
			caption text,
			image text,
			hoverColor text,
			linkUrl text,				
			UNIQUE KEY id (id)
		)	
	";
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	dbDelta($cSQL);
}

/**
 * Skills Cards
 */
add_action( 'admin_menu', 'register_skills_cards' );

function register_skills_cards(){
	add_menu_page( 'skills cards', 'Skills Cards', 'manage_options', 'skillsCards', 'skills_cards', null, 6 ); 
}

function skills_cards(){

	global $wpdb;
	$tablename = $wpdb->prefix.'skills_cards';
	
	$skillsData = $wpdb->get_results(
		"
		SELECT *
		FROM $tablename		
		"
	);

?>
	<h1>My Skillz</h1>
	<form method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
		<div>				
			<label for="title">Title</label><br />
			<input id="title" name="title" type="text">
		</div>
		<div>				
			<label for="caption">Caption</label><br />
			<input id="caption" name="caption" type="text">
		</div>
		<div>				
			<label for="image">Image</label><br />
			<input id="image" name="image" type="text">
		</div>
		<div>				
			<label for="hoverColor">Hover Color</label><br />
			<input id="hoverColor" name="hoverColor" type="text">
		</div>
		<div>				
			<label for="linkUrl">Page Link</label><br />
			<input id="linkUrl" name="linkUrl" type="text">
		</div>
		<div>
			<br />
			<input type="submit" class="button-primary" name="add-card" value="Add Card">
		</div>
	</form>
	<hr />
	<?php if($skillsData):?>
		<h1>Current Skillz</h1>
		<?php foreach($skillsData as $skill):?>
		<p><?php echo $skill->title; ?></p>
		<p><img src="<?php echo $skill->image; ?>" alt=""></p>
		<p><?php echo $skill->caption; ?></p>		
		<p><?php echo $skill->hoverColor; ?></p>
		<p><?php echo $skill->linkUrl; ?></p>		
		<?php endforeach;?>
	<?php else : ?>
		<h1>No Skillz Added</h1>		
	<?php endif; ?>	
<?php
}

if(isset($_POST['add-card'])){
	global $wpdb;
	
	$tablename = $wpdb->prefix.'skills_cards';
	
	$wpdb->insert(
		$tablename,
		array(
			'title' => $_POST['title'],
			'caption' => $_POST['caption'],
			'image' => $_POST['image'],
			'hoverColor' => $_POST['hoverColor'],
			'linkUrl' => $_POST['linkUrl']				
		)
	);
	
	header("location: ".$_SERVER['PHP_SELF']."?page=skillsCards");
	exit;
}


function skills_shortcode_output() {

    global $wpdb;
    
    $tablename = $wpdb->prefix.'skills_cards';
	$skillsData = $wpdb->get_results(
		"
		SELECT *
		FROM $tablename			
		"
	);		
	ob_start();
	
	?>
	
		<div class="skills">
			<?php foreach($skillsData as $skill):?>
				<div class="card">
				<!-- <div class="card" onMouseOver="this.style.background='<?php echo $skill->hoverColor; ?>'" onMouseOut="this.style.background='#fff'"> -->
					<p class="logo"><img src="<?php echo $skill->image; ?>" alt=""></p>
					<p class="title"><?php echo $skill->title; ?></p>					
					<p class="caption"><?php echo $skill->caption; ?></p>							
					<!-- <p><?php echo $skill->linkUrl; ?></p>	 -->
				</div>	
			<?php endforeach;?>
		</div>
	
	<?php
	return ob_get_clean();
}

add_shortcode('skillCards', 'skills_shortcode_output');


function portfolio_theme_widgets_init() {
 
    // First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'First Footer Widget Area', 'kalvarezPortfolio' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The first footer widget area', 'kalvarezPortfolio' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
    // // Second Footer Widget Area, located in the footer. Empty by default.
    // register_sidebar( array(
    //     'name' => __( 'Second Footer Widget Area', 'kalvarezPortfolio' ),
    //     'id' => 'second-footer-widget-area',
    //     'description' => __( 'The second footer widget area', 'kalvarezPortfolio' ),
    //     'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    //     'after_widget' => '</div>',
    //     'before_title' => '<h3 class="widget-title">',
    //     'after_title' => '</h3>',
    // ) );
 
    // // Third Footer Widget Area, located in the footer. Empty by default.
    // register_sidebar( array(
    //     'name' => __( 'Third Footer Widget Area', 'kalvarezPortfolio' ),
    //     'id' => 'third-footer-widget-area',
    //     'description' => __( 'The third footer widget area', 'kalvarezPortfolio' ),
    //     'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    //     'after_widget' => '</div>',
    //     'before_title' => '<h3 class="widget-title">',
    //     'after_title' => '</h3>',
    // ) );
 
    // // Fourth Footer Widget Area, located in the footer. Empty by default.
    // register_sidebar( array(
    //     'name' => __( 'Fourth Footer Widget Area', 'kalvarezPortfolio' ),
    //     'id' => 'fourth-footer-widget-area',
    //     'description' => __( 'The fourth footer widget area', 'kalvarezPortfolio' ),
    //     'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
    //     'after_widget' => '</div>',
    //     'before_title' => '<h3 class="widget-title">',
    //     'after_title' => '</h3>',
    // ) );
         
}
 
// Register sidebars by running portfolio_theme_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'portfolio_theme_widgets_init' );

































