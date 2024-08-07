<?php




// COMPOSER PACKAGAES
require_once(__DIR__ . "/vendor/autoload.php");



// ENVIRONMENTAL VARIABLES
include('env.php');




if (!isset($content_width)) {
    $content_width = 900;
}

if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 1600, '', true); // Large Thumbnail
    add_image_size('medium', 800, '', true); // Medium Thumbnail
    add_image_size('small', 400, '', true); // Small Thumbnail
    add_image_size('square', 200, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
    'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'			=> false,
    'default-text-color'		=> '000',
    'width'				=> 1000,
    'height'			=> 198,
    'random-default'		=> false,
    'wp-head-callback'		=> $wphead_cb,
    'admin-head-callback'		=> $adminhead_cb,
    'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('webfactor', get_template_directory() . '/languages');
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// HTML5 Blank navigationh
function webfactor_nav() {
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        )
    );
}

function wf_version() {
    return '1.4.3';
}

// Load HTML5 Blank scripts (header.php)
function webfactor_header_scripts() {
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_enqueue_script('jquery'); // Enqueue it!


        $tdu =  get_template_directory_uri();
        wp_register_script('modernizr', $tdu . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!


        wp_register_script('featherlight', $tdu . '/js/featherlight.min.js', array(), wf_version(), true);
        wp_enqueue_script('featherlight'); // Enqueue it!

        wp_register_script('featherlight_g', $tdu . '/js/featherlight.gallery.min.js', array(), wf_version(), true);
        wp_enqueue_script('featherlight_g'); // Enqueue it!

        wp_register_script('slick', $tdu . '/js/slick.min.js', array(), wf_version(), true);
        wp_enqueue_script('slick'); // Enqueue it!

        wp_register_script('matchHeight', $tdu . '/js/matchHeight.min.js', array('jquery'),  wf_version(), true);
        wp_enqueue_script('matchHeight'); // Enqueue it!


        wp_register_script('scripts', $tdu . '/js/scripts.js', array('jquery'), wf_version(), true);
        wp_enqueue_script('scripts'); // Enqueue it!

    }
}

// Load HTML5 Blank conditional scripts
function webfactor_conditional_scripts() {
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function webfactor_styles() {

    $tdu =  get_template_directory_uri();

    // remove gutenberg css
    wp_dequeue_style('wp-block-library');


    wp_register_style('featherlight', $tdu . '/js/featherlight.min.css', array(), wf_version(), 'all');
    wp_enqueue_style('featherlight'); // Enqueue it!
    wp_register_style('featherlight_g', $tdu . '/js/featherlight.gallery.min.css', array(), wf_version(), 'all');
    wp_enqueue_style('featherlight_g'); // Enqueue it!

    wp_register_style('wf_style', $tdu . '/css/global.css', array(), wf_version(), 'all');
    wp_enqueue_style('wf_style'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu() {
    register_nav_menus(array( // Using array to specify more menus if needed
        'primary-navigation' => __('Primary Menu', 'webfactor'),
        'sidebar-menu' => __('Sidebar Menu', 'webfactor'),
        'extra-menu' => __('Test Admin Menu', 'webfactor')
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '') {
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var) {
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist) {
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
function add_slug_to_body_class($classes) {
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    if (defined('ICL_LANGUAGE_CODE')) {
        // add 'class-name' to the $classes array
        if (ICL_LANGUAGE_CODE == 'en') {
            $classes[] = 'lang_en';
        } elseif (ICL_LANGUAGE_CODE == 'fr') {
            $classes[] = 'lang_fr';
        }
        // return the $classes array
        return $classes;
    }

    return $classes;
}




// If Dynamic Sidebar Exists
if (function_exists('register_sidebar')) {
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'webfactor'),
        'description' => __('Description for this widget-area...', 'webfactor'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'webfactor'),
        'description' => __('Description for this widget-area...', 'webfactor'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination($query = null) {
    global $wp_query;

    if (!$query) {
        $query = $wp_query;
    }
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length) {
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '') {
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}


// Custom View Article link to Post
function html5_blank_view_article($more) {
    // global $post;
    // return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'webfactor') . '</a>';
    return '';
}

// Remove Admin bar
function remove_admin_bar() {
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag) {
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html) {
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function webfactorgravatar($avatar_defaults) {
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments() {
    if (!is_admin()) {
        if (is_singular() and comments_open() and (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function webfactorcomments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ('div' == $args['style']) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    } ?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
            <?php endif; ?>
            <div class="comment-author vcard">

                <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
            </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
                <br />
            <?php endif; ?>

            <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>">
                    <?php
                    printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'), '  ', ''); ?>
            </div>

            <?php comment_text() ?>

            <div class="reply">
                <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
            <?php if ('div' != $args['style']) : ?>
            </div>
        <?php endif; ?>
    <?php
}

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'webfactor_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'webfactor_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'webfactor_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_types'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'webfactorgravatar'); // Custom Gravatar in Settings > Discussion

add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
// add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether



// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_types() {
    $que_news_cat = array(
        'name'                       => 'Catégories',
        'singular_name'              => 'Catégorie',
        'menu_name'                  => 'Catégorie',
        'all_items'                  => 'Toutes les Catégories',
        'parent_item'                => 'Catégorie parente',
        'parent_item_colon'          => 'Catégorie parente:',
        'new_item_name'              => 'Nom de la nouvelle categorie',
        'add_new_item'               => 'Ajouter une categorie',
        'edit_item'                  => 'Modifier categorie',
        'update_item'                => 'Mettre à jur la categorie',
        'separate_items_with_commas' => 'Separer les categories avec des virgules',
        'search_items'               => 'Chercher dans les categories',
        'add_or_remove_items'        => 'Ajouter ou supprimer des categories',
        'choose_from_most_used'      => 'Choisir parmi les categories les plus utilisées',
    );
    $args_ques_cat = array(
        'labels'                     => $que_news_cat,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy('question_cat', array('question'), $args_ques_cat);


    register_post_type(
        'question', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Question', 'webfactor'), // Rename these to suit
                'singular_name' => __('Question', 'webfactor'),
                'add_new' => __('Add New', 'webfactor'),
                'add_new_item' => __('Add New Question', 'webfactor'),
                'edit' => __('Edit', 'webfactor'),
                'edit_item' => __('Edit Question', 'webfactor'),
                'new_item' => __('New Question', 'webfactor'),
                'view' => __('View Question', 'webfactor'),
                'view_item' => __('View Question', 'webfactor'),
                'search_items' => __('Search Question', 'webfactor'),
                'not_found' => __('No Questions found', 'webfactor'),
                'not_found_in_trash' => __('No Questions found in Trash', 'webfactor')
            ),
            'public' => true,
            'publicly_queryable' => true, // dont allow to see on front end
            'exclude_from_search' => false, // dont show in search
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'question_cat',
                //    'category'
            ) // Add Category and Post Tags support
        )
    );


    $args_ques_cat = array(
        'labels'                     => $que_news_cat,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );



    register_taxonomy('question_parents_cat', array('question_parent'), $args_ques_cat);

    register_post_type(
        'question_parent', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Question Parents', 'webfactor'), // Rename these to suit
                'singular_name' => __('Question Parents', 'webfactor'),
                'add_new' => __('Ajouter', 'webfactor'),
                'add_new_item' => __('Ajouter Question Parents', 'webfactor'),
                'edit' => __('Modifier', 'webfactor'),
                'edit_item' => __('Modifier une Question Parents', 'webfactor'),
                'new_item' => __('Nouvelle Question Parents', 'webfactor'),
                'view' => __('Afficher Question Parents', 'webfactor'),
                'view_item' => __('Afficher Question Parents', 'webfactor'),
                'search_items' => __('Chercher Question', 'webfactor'),
                'not_found' => __('Aucune Question trouvée', 'webfactor'),
                'not_found_in_trash' => __('Aucune Question trouvée dans la corbeille', 'webfactor')
            ),
            'public' => true,
            'publicly_queryable' => true, // dont allow to see on front end
            'exclude_from_search' => false, // dont show in search
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'question_parents_cat'
                //    'category'
            ) // Add Category and Post Tags support
        )
    );


    register_taxonomy('question_enseignants_cat', array('question_enseignant'), $args_ques_cat);

    register_post_type(
        'question_enseignant', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Question Enseignants', 'webfactor'), // Rename these to suit
                'singular_name' => __('Question Enseignants', 'webfactor'),
                'add_new' => __('Ajouter', 'webfactor'),
                'add_new_item' => __('Ajouter Question Enseignants', 'webfactor'),
                'edit' => __('Modifier', 'webfactor'),
                'edit_item' => __('Modifier une Question Enseignants', 'webfactor'),
                'new_item' => __('Nouvelle Question Enseignants', 'webfactor'),
                'view' => __('Afficher Question Enseignants', 'webfactor'),
                'view_item' => __('Afficher Question Enseignants', 'webfactor'),
                'search_items' => __('Chercher Question', 'webfactor'),
                'not_found' => __('Aucune Question trouvée', 'webfactor'),
                'not_found_in_trash' => __('Aucune Question trouvée dans la corbeille', 'webfactor')
            ),
            'public' => true,
            'publicly_queryable' => true, // dont allow to see on front end
            'exclude_from_search' => false, // dont show in search
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'question_enseignants_cat'
                //    'category'
            ) // Add Category and Post Tags support
        )
    );


    register_taxonomy('question_ecoles_cat', array('question_ecole'), $args_ques_cat);

    register_post_type(
        'question_ecole', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Question Ecoles', 'webfactor'), // Rename these to suit
                'singular_name' => __('Question Ecoles', 'webfactor'),
                'add_new' => __('Ajouter', 'webfactor'),
                'add_new_item' => __('Ajouter Question Ecoles', 'webfactor'),
                'edit' => __('Modifier', 'webfactor'),
                'edit_item' => __('Modifier une Question Ecoles', 'webfactor'),
                'new_item' => __('Nouvelle Question Ecoles', 'webfactor'),
                'view' => __('Afficher Question Ecoles', 'webfactor'),
                'view_item' => __('Afficher Question Ecoles', 'webfactor'),
                'search_items' => __('Chercher Question', 'webfactor'),
                'not_found' => __('Aucune Question trouvée', 'webfactor'),
                'not_found_in_trash' => __('Aucune Question trouvée dans la corbeille', 'webfactor')
            ),
            'public' => true,
            'publicly_queryable' => true, // dont allow to see on front end
            'exclude_from_search' => false, // dont show in search
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'question_ecoles_cat'
                //    'category'
            ) // Add Category and Post Tags support
        )
    );




    register_post_type(
        'testimonial', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Témoignage', 'webfactor'), // Rename these to suit
                'singular_name' => __('Témoignage', 'webfactor'),
                'add_new' => __('Ajouter', 'webfactor'),
                'add_new_item' => __('Ajouter témoignage', 'webfactor'),
                'edit' => __('Modifier', 'webfactor'),
                'edit_item' => __('Modifier témoignage', 'webfactor'),
                'new_item' => __('Nouveau témoignage', 'webfactor'),
                'view' => __('Afficher témoignage', 'webfactor'),
                'view_item' => __('Afficher témoignage', 'webfactor'),
                'search_items' => __('Charcher un témoignage', 'webfactor'),
                'not_found' => __('Aucun témoignage trouvé', 'webfactor'),
                'not_found_in_trash' => __('Pas de témoignage dans la corbeille', 'webfactor')
            ),
            'public' => true,
            'publicly_queryable' => false, // dont allow to see on front end
            'exclude_from_search' => true, // dont show in search
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                //    'post_tag',
                //    'category'
            ) // Add Category and Post Tags support
        )
    );


    register_post_type(
        'secure_file', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __("Secure Files", 'webfactor'), // Rename these to suit
                'singular_name' => __("Secure File", 'webfactor'),
                'add_new' => __("Add Secure File", 'webfactor'),
                'add_new_item' => __("New Secure File", 'webfactor'),
                'edit' => __("Edit", 'webfactor'),
                'edit_item' => __("Edit Secure File", 'webfactor'),
                'new_item' => __("New Secure File", 'webfactor'),
                'view' => __("View Secure File", 'webfactor'),
                'view_item' => __("View Secure File", 'webfactor'),
                'search_items' => __("Search Secure Files", 'webfactor'),
                'not_found' => __("No Secure Files found", 'webfactor'),
                'not_found_in_trash' => __("No Secure Files found in the bin", 'webfactor')
            ),
            'public' => true,
            'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
            'show_ui' => true,
            'has_archive' => false,
            'exclude_from_search' => true, // remove from search engine
            'supports' => array(
                'title',
                // 'editor'
                // 'author',
            ), // Go to Dashboard Custom webfactor Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array() // Add Category and Post Tags support
        )
    );


    register_post_type(
        'secure_file_download', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __("Secure File Downloads", 'webfactor'), // Rename these to suit
                'singular_name' => __("Secure File Download", 'webfactor'),
                // 'add_new' => __("Add Secure File Download", 'webfactor'),
                // 'add_new_item' => __("New Secure File Download", 'webfactor'),
                'edit' => __("Edit", 'webfactor'),
                'edit_item' => __("Edit Secure File Download", 'webfactor'),
                // 'new_item' => __("New Secure File Download", 'webfactor'),
                'view' => __("View Secure File Download", 'webfactor'),
                'view_item' => __("View Secure File Download", 'webfactor'),
                'search_items' => __("Search Secure File Downloads", 'webfactor'),
                'not_found' => __("No Secure File Downloads found", 'webfactor'),
                'not_found_in_trash' => __("No Secure File Downloads found in the bin", 'webfactor')
            ),
            'public' => true,
            'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
            'show_ui' => true,
            'has_archive' => false,
            'exclude_from_search' => true, // remove from search engine
            'supports' => array(
                'title',
                // 'editor'
                // 'author',
            ), // Go to Dashboard Custom webfactor Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array() // Add Category and Post Tags support
        )
    );
}


/*------------------------------------*\
    ShortCode Functions
\*------------------------------------*/



// LOGIN FORM SHORTCODE
add_shortcode('secure_file_form', 'secure_file_form_shortcode');
function secure_file_form_shortcode($atts, $content = null) {

    $attributes = shortcode_atts(
        array(
            'id' =>  null,
        ),
        $atts
    );

    $secure_file = get_post($attributes['id']);

    if ($secure_file) {
        $show_form = get_field('show_form', $secure_file->ID);
        $file = get_field('file', $secure_file->ID);

        if ($file) {
            $ret = '<div>';

            if ($show_form == 'no') {
                $ret .= '<a target="_blank" class="button" href="' . $file['url'] . '">Download file</a>';
            } else {

                $ret .= '<div class="secure_file_form_outer">';
                $ret .= '<a target="_blank" class="button secure_file_form_start" href="#">Download file</a>';
                $ret .= '<form  action="' . api_url() . '?route=secure_files" method="post"  class="secure_file_form_container">';
                $ret .= '<h3>' . $secure_file->post_title . '</h3>';
                $ret .= '<div class="form_field"><input type="text"  placeholder="Email *"  name="email" /></div>';
                $ret .= '<div class="form_field"><input type="hidden" name="secure_file_id" value="' . $attributes['id'] . '" />';
                $ret .= '<button type="submit" name="submit_secure_file_form"  />Submit</button></div>';
                $ret .= '<a target="_blank" class="button" href="">Download file</a>';
                $ret .= '<div class="alert alert_danger">An error occurred.</div>';
                $ret .= '</form>';
                $ret .= '</div>';
            }
            $ret .= '</div>';
        }
    }



    return $ret;
}


function api_url() {
    return  get_template_directory_uri() . '/api/v1/';
}


add_action("admin_init", "securefile_shortcode_box_init");
function securefile_shortcode_box_init() {
    add_meta_box("securefile_details", "Shortcode to copy", "secure_file_shortcode_details",  'secure_file',  "normal", "default");
}
function secure_file_shortcode_details() {
    global $post_id;
    if ($post_id) {
        $ret = '';
        $ret .= '<p>Copy this shortcode into an editor to make a form</p>';
        $ret .= '<input type="text" readonly="" value="[secure_file_form id=' . $post_id . ']" />';

        echo $ret;
    }
}


add_action("admin_init", "securefile_downloads_box_init");
function securefile_downloads_box_init() {
    add_meta_box("securefile_downloads", "Downloads", "secure_file_downloads_details",  'secure_file',  "normal", "default");
}
function secure_file_downloads_details() {
    global $post_id;
    if ($post_id) {

        $downloads = get_posts(array(
            'post_type' => 'secure_file_download',
            'post_parent' => $post_id,
            'posts_per_page' => -1,
        ));
        $ret = '';
        $ret .= '<table class="widefat fixed striped" style="border:0"><thead><tr>
        <th>Email</th>
        <th>Date</th>
        </tr></thead><tbody>';
        foreach ($downloads as $download) {
            $email = get_field('email', $download->ID);
            $href = get_edit_post_link($download->ID);
            $ret .= '<tr>
            <td><a href="' . $href . '">' . $email . ' </a></td>
            <td> ' .  $download->post_date . '</td></tr>';
        }
        $tdu = get_template_directory_uri();  // get_home_url()
        $download_link = $tdu . '/api/v1/?route=secure_file_downloads&secure_file_id=' . $post_id;
        $ret .= '</tbody></table><a class="button button-primary " href="' . $download_link . '">Download</a>';

        echo $ret;
    }
}





add_shortcode('number_box_outer', 'number_box_outer');
add_shortcode('number_box', 'number_box');

add_shortcode('bingo_form', 'bingo_form');
function bingo_form($atts, $content = null) {
    $str = '<div class="bingo_outer">';
    $str .= '<form class="bingoform" method="get" action="?success" class="bingo_form"><input type="text" name="bingoemail" class="bingoemail" placeholder="Votre adresse email" /><button type="submit">Recevoir</button></form>';
    $str .= '<div class="bingo_success alert alert_success">Nous vous avons envoyé l\'imprimable Savio par email !</div>';
    $str .= '<div class="bingo_error alert alert_danger">Error</div>';
    $str  .= '</div>';
    return $str;
}

function number_box_outer($atts, $content = null) {

    $count = substr_count($content, "[number_box");
    return '<div data-count="' . $count . '" class="number_box_outer">' . do_shortcode($content) . '</div>';
}

function number_box($atts, $content = null) {
    $attributes = shortcode_atts(array(
        'number' => null,
        'text' => null,
    ), $atts);
    $number = $attributes['number'];
    $text = $attributes['text'];

    $str  = '';
    $str .=  '<div class="number_box">';
    $str .=  '<div class="stat_container">' . $number . '</div>';
    $str .=  '<div class="text_container">' . $text . '</div>';
    $str .= '</div>';
    return $str;
}


add_shortcode('columns', 'columns_shortcode');
function columns_shortcode($atts, $content = null) {
    return '<div class="columns">' . do_shortcode($content) . '</div>';
}

add_shortcode('column', 'column_shortcode');
function column_shortcode($atts, $content = null) {
    return '<div class="column">' . do_shortcode($content) . '</div>';
}




function chilly_nav($menu) {
    wp_nav_menu(
        array(
            'theme_location'  => $menu,
            'menu'            => '',
            'container'       => '',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => '',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '%3$s',
            'depth'           => 0,
            'walker'          => ''
        )
    );
}

function chilly_map($atts, $content = null) {
    $attributes = shortcode_atts(array(
        'title' => "Address here"
    ), $atts);



    $title = $attributes['title'];
    $chilly_map = '<div id="map_container_1"></div>';
    $chilly_map .= "<script> var latt = 0.00; var lonn= 0.00; var map_title = '" . $title . "'  </script>";
    return $chilly_map;
}
add_shortcode('chilly_map', 'chilly_map');


function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    // filter to remove TinyMCE emojis
    // add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action('init', 'disable_wp_emojicons');


function remove_json_api() {

    // Remove the REST API lines from the HTML Header
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');
    // Turn off oEmbed auto discovery.
    add_filter('embed_oembed_discover', '__return_false');
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
    // Remove all embeds rewrite rules.
    // add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
}
add_action('after_setup_theme', 'remove_json_api');




function count_to_bootstrap_class($count) {
    if ($count == 1) {
        $class = 'col-sm-12';
    } elseif ($count == 2) {
        $class = 'col-sm-6';
    } elseif ($count == 3) {
        $class = 'col-sm-4';
    } elseif ($count == 4) {
        $class = 'col-md-3 col-sm-6';
    } elseif ($count <= 6) {
        $class = 'col-sm-2';
    } else {
        $class = 'col-sm-1';
    }
    return $class;
};

function count_to_bootstrap_3max_class($count) {
    if ($count == 1) {
        $class = 'col-sm-12';
    } elseif ($count == 2) {
        $class = 'col-sm-6';
    } elseif ($count == 3) {
        $class = 'col-sm-4';
    } elseif ($count == 2) {
        $class = 'col-sm-6';
    } elseif ($count <= 5) {
        $class = 'col-sm-4';
    } else {
        $class = 'col-sm-1';
    }
    return $class;
};

function thumbnail_of_post_url($post_id, $size = 'large') {
    $image_id = get_post_thumbnail_id($post_id);
    $image_url = wp_get_attachment_image_src($image_id, $size);
    if ($image_url) {
        $image = $image_url[0];
        return $image;
    }
    return '';
}



function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');




function payment_frequency_shortcode($atts, $content = null) {
    $switcher = '<div class="payment_boolean_container payment_frequency">
        <a class="pay_link pay_monthly" href="#" data-freq="month">Paiement mensuel</a>
        <div class="boolean_outer">
            <div class="boolean_inner"></div>
        </div>
        <a class="pay_link pay_annually" href="#" data-freq="year">Paiement annuel</a>
    </div>';
    return $switcher;
}
add_shortcode('payment_frequency_switcher', 'payment_frequency_shortcode');


function payment_currency_shortcode($atts, $content = null) {
    $attributes = shortcode_atts(array(
        'prefix' => "",
    ), $atts);
    $prefix = $attributes['prefix'];


    $switcher = '<p class=" payment_currency"> ' . $prefix . ' : 
        <a class="pay_link pay_eur" href="#" data-currency="eur">EUR</a>
       /
        <a class="pay_link pay_usd" href="#" data-currency="usd">USD</a>
    </p>
    
    ';
    return $switcher;
}
add_shortcode('payment_currency_switcher', 'payment_currency_shortcode');



function pay_freq_option_func($atts, $content = null) {
    $attributes = shortcode_atts(array(
        'button' => "choisir cette offre",
        'month_id' => 'family_month_1',
        'year_id' => 'family_year_1',
        'month_amount' => 50,
        'year_amount' => 100,
        'month_word' => 'mois',
        'year_word' => 'an'
    ), $atts);


    $register_url = 'https://app.savio.fr/register/';
    $button_text = $attributes['button'];
    $month_id = $attributes['month_id'];
    $year_id = $attributes['year_id'];
    $month_amount = $attributes['month_amount'];
    $year_amount = $attributes['year_amount'];
    $month_amount_usd = $attributes['month_amount'];
    $year_amount_usd = $attributes['year_amount'];
    $month_word = $attributes['month_word'];
    $year_word = $attributes['year_word'];

    $pay_option = '<div class="pay_buttons">';
    $pay_option .= '<div class="pay_monthly">
    <p class="cost">
    <span class="amount pay_eur ">' . $month_amount . '</span><span class=" pay_eur currency">&euro;</span>
    <span class="amount pay_usd ">' . $month_amount_usd . '</span><span class=" pay_usd currency">$</span>

    <span class="freq">/' . $month_word . '</span>
    </p>
    <h6  style="display:none;"><a href="' . $register_url .  $month_id . '">' . $button_text . '</a></h6>
    </div>';
    $pay_option .= '<div class="pay_annually">
    <p class="cost">
    <span class="amount pay_eur">' . $year_amount . '</span><span class="currency pay_eur">&euro;</span>
    <span class="amount pay_usd">' . $year_amount_usd . '</span><span class="pay_usd currency">$</span>
    <span class="freq">/' . $year_word . '</span></p>
    <h6 style="display:none;"><a href="' . $register_url .  $year_id . '">' . $button_text . '</a></h6>
    </div>';
    $pay_option .= '</div>';
    return $pay_option;
}
add_shortcode('payment_frequency_option', 'pay_freq_option_func');


function social_meta_properties() {
    $smp =  new stdClass();
    global $post;

    if (is_single()) {
        $post_id = get_the_ID();
        $excerpt  =  get_the_excerpt();
        if ($excerpt == '') {
            $excerpt =  wp_trim_words($post->post_content, 20);
        }
        $smp->title = get_the_title();
        $smp->description = strip_tags($excerpt);
        $smp->image =  thumbnail_of_post_url($post_id, 'medium');
        $smp->url = get_the_permalink();
    } else {
        $smp->title = 'Savio';
        $smp->description = get_bloginfo('description');
        $smp->image =   get_template_directory_uri() . '/images/accueil-savio.jpg';
        $smp->url = get_home_url();
    }


    return $smp;
}



if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Savio settings',
        'menu_title'    => 'Savio settings',
        'menu_slug'     => 'savio-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
}





function sib_config() {
    $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', SIB_KEY);

    return $config;
}

function sib_get_account() {
    $config = sib_config();
    $apiInstance = new SendinBlue\Client\Api\AccountApi(
        new GuzzleHttp\Client(),
        $config
    );
    try {
        $result = $apiInstance->getAccount();
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling AccountApi->getAccount: ', $e->getMessage(), PHP_EOL;
    }
}




function short_date_of($date) {
    $nice_date =  date_i18n('d M y', strtotime(($date)));
    return $nice_date;
}
function shortmonth_of($date) {
    $nice_date =  date_i18n('M', strtotime(($date)));
    return $nice_date;
}

function month_of($date) {
    $nice_date =  date_i18n('F', strtotime(($date)));
    return $nice_date;
}

function day_of($date) {

    $nice_date =  date_i18n('l', strtotime(($date)));
    return $nice_date;
}
function date_of($date) {

    $nice_date =  date_i18n('d', strtotime(($date)));
    return $nice_date;
}


function target_main_category_query_with_conditional_tags($query) {
    if (!is_admin() && $query->is_main_query()) {


        if (isset($_GET['type_post'])) {
            $type_post = 'post';
            if ($_GET['type_post'] == 'event') {
                $type_post = 'event';
            }
            $query->set('meta_key', 'post_type');
            $query->set('meta_value', $type_post);
        }
    }
}
add_action('pre_get_posts', 'target_main_category_query_with_conditional_tags');


function make_date_container($date) {

    echo '<div class="date_container">
<div class="month">' . shortmonth_of($date) . '</div>
<div class="day">' . date_of($date) . '</div>
</div>';
}



function generate_social_links($url, $title) {


    $encoded_url = urlencode($url);
    $encoded_title = urlencode($title);
    $rand_id = 'social_links_' . rand(1000, 1000000);
    $str = '<div class="social_link_container" id="' . $rand_id . '">';
    $str .= '<h4>' .  __("Partager", 'html5blank') . '</h4>';
    $str .= '<a title="Facebook" class="social_link social_link_facebook" href="https://www.facebook.com/sharer/sharer.php?u=' . $encoded_url . '" target="_blank" ><span>Facebook</span></a>';
    $str .= '<a title="LinkedIn" class="social_link social_link_linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=' . $encoded_url . '" target="_blank" ><span>LinkedIn</span></a>';
    $str .= '<a title="X/Twitter" class="social_link social_link_twitter" href="https://twitter.com/share?text=' . $encoded_title . '&url=' . $encoded_url . '&hashtags=jazzra" target="_blank" ><span>X</span></a>';
    $str .= '<a title="Email" class="social_link social_link_email" href="mailto:example@website.com?subject=' . $encoded_url . '" target="_blank" ><span>Email</span></a>';

    $str .= '<a title="' .  __("Copier le lien", 'html5blank') . '" class="social_link  copy_email_button" ><span>Copier le lien</span><em>Le lien a été copié!</em></a>';
    $str .= '<input type="text" class="input_for_copying" name="copy_input" value="' . $url  . '" >';


    $str .= '</div><!-- END OF SOCIAL_LINK_CONTAINER -->';
    echo $str;
}


include("functions_brevo.php");


    ?>