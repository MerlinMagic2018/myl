<?php
/**
 * Class covers the administrative side of the plugin
 *
 * @since 1.4.0
 */
class mylk_FAQ_Admin {

    /**
     * The version of this plugin.
     *
     * @since   1.6.0
     * @access  private
     * @var     string      $version    The vurrent version of this plugin.
     */
    private $version;

    /**
     * The directory path to this plugin.
     *
     * @since   1.6.0
     * @access  private
     * @var     string      $dir    The directory path to this plugin
     */
    private $dir;

    /**
     * The url path to this plugin.
     *
     * @since   1.6.0
     * @access  private
     * @var     string      $url    The url path to this plugin
     */
    private $url;


    /**
     * Initialize the class and set its properties.
     *
     * @since   1.4.0
     * @version 1.7.0
     * @param   string      $version    The version of this plugin.
     */
    public function __construct( $version ) {
        $this->version = $version;
        $this->dir = trailingslashit( plugin_dir_path( __FILE__ ) );
        $this->url = trailingslashit( plugin_dir_url( __FILE__ ) );

        register_activation_hook( __FILE__,         array( $this, 'activation' ) );
        register_deactivation_hook( __FILE__,       array( $this, 'deactivation' ) );

        add_action( 'init',                         array( $this, 'content_types' ) );
        add_action( 'wp_enqueue_scripts',           array( $this, 'enq_scripts' ) );
        add_action( 'admin_enqueue_scripts',        array( $this, 'enq_admin_scripts' ) );
        add_action( 'manage_posts_custom_column',   array( $this, 'column_action' ) );
        //add_action( 'dashboard_glance_items',       array( $this, 'at_a_glance' ) );
        //add_action( 'wp_dashboard_setup',           array( $this, 'dashboard_widget' ) );

        add_filter( 'manage_faq_posts_columns',     array( $this, 'columns_filter' ) );
        add_filter( 'post_updated_messages',        array( $this, 'messages' ) );
        add_filter( 'cmb_meta_boxes',               array( $this, 'metaboxes' ) );
        add_action( 'add_meta_boxes_faq',           array( $this, 'add_faq_metabox' ) );

        add_shortcode( 'faq',                       array( $this, 'faq_shortcode' ) );
    }

    /**
     * Runs on plugin activation
     *
     * @since 1.2.0
     */
    function activation() {
        $this->content_types();
        flush_rewrite_rules();
    }

    /**
     * Runs on plugin deactivation
     *
     * @since 1.2.0
     */
    function deactivation() {
        flush_rewrite_rules();
    }

    /**
     * Register the post_type and taxonomy
     *
     * @since 1.2.0
     */
    function content_types() {
        $defaults = $this->defaults();
        register_post_type( $defaults['post_type']['slug'], $defaults['post_type']['args'] );
        register_taxonomy( $defaults['taxonomy']['slug'], $defaults['post_type']['slug'],  $defaults['taxonomy']['args'] );
    }

    /**
     * Define the defaults used in the registration of the post type and taxonomy
     *
     * @since  1.2.0
     * @return array $defaults
     */
    function defaults() {
        // Establishes plugin registration defaults for post type and taxonomy
        $defaults = array(
            'post_type' => array(
                'slug'  => 'faq',
                'args'  => array(
                    'labels' => array(
                        'name'                  => __( "FAQ's",                       'mylk-faq' ),
                        'singular_name'         => __( 'FAQ',                       'mylk-faq' ),
                        'add_new'               => __( 'Add New',                   'mylk-faq' ),
                        'add_new_item'          => __( 'Add New Question',          'mylk-faq' ),
                        'edit'                  => __( 'Edit',                      'mylk-faq' ),
                        'edit_item'             => __( 'Edit Question',             'mylk-faq' ),
                        'new_item'              => __( 'New Question',              'mylk-faq' ),
                        'view'                  => __( 'View FAQ',                  'mylk-faq' ),
                        'view_item'             => __( 'View Question',             'mylk-faq' ),
                        'search_items'          => __( 'Search FAQ',                'mylk-faq' ),
                        'not_found'             => __( 'No FAQs found',             'mylk-faq' ),
                        'not_found_in_trash'    => __( 'No FAQs found in Trash',    'mylk-faq' )
                    ),
                    'public'            => true,
                    'query_var'         => true,
                    'menu_position'     => 20,
                    'menu_icon'         => 'dashicons-editor-help',
                    'has_archive'       => false,
                    'supports'          => array( 'title', 'editor', 'revisions', 'page-attributes' ),
                    'rewrite'           => array( 'with_front' => false )
                )
            ),
            'taxonomy' => array(
                'slug' => 'group',
                'args' => array(
                    'labels' => array(
                        'name'                          => __( 'Groups',                                'mylk-faq' ),
                        'singular_name'                 => __( 'Group',                                 'mylk-faq' ),
                        'search_items'                  => __( 'Search Groups',                         'mylk-faq' ),
                        'popular_items'                 => __( 'Popular Groups',                        'mylk-faq' ),
                        'all_items'                     => __( 'All Groups',                            'mylk-faq' ),
                        'parent_item'                   => null,
                        'parent_item_colon'             => null,
                        'edit_item'                     => __( 'Edit Group' ,                           'mylk-faq' ),
                        'update_item'                   => __( 'Update Group',                          'mylk-faq' ),
                        'add_new_item'                  => __( 'Add New Group',                         'mylk-faq' ),
                        'new_item_name'                 => __( 'New Group Name',                        'mylk-faq' ),
                        'separate_items_with_commas'    => __( 'Separate groups with commas',           'mylk-faq' ),
                        'add_or_remove_items'           => __( 'Add or remove groups',                  'mylk-faq' ),
                        'choose_from_most_used'         => __( 'Choose from the most used groups',      'mylk-faq' ),
                        'menu_name'                     => __( 'Groups',                                'mylk-faq' ),
                    ),
                    'hierarchical'              => false,
                    'show_ui'                   => true,
                    'update_count_callback'     => '_update_post_term_count',
                    'query_var'                 => true,
                    'rewrite'                   => array( 'with_front' => false )
                )
            )
        );

        return apply_filters( 'mylk_faq_defaults', $defaults );
    }

    /**
     * Create the post type metabox
     *
     * @since   1.2.0
     * @param   array $meta_boxes
     * @return  array $meta_boxes
     */
    function metaboxes( $meta_boxes ) {
        $meta_boxes['faq_settings'] =
            apply_filters( 'mylk_faq_metabox', array(
                'id'            => 'faq_settings',
                'title'         => __( 'FAQ Setting', 'mylk-faq' ),
                'pages'         => array( 'faq' ),
                'context'       => 'side',
                'priority'      => 'default',
                'show_names'    => false,
                'fields'        => array(
                    array(
                        'id'    => '_acf_rtt',
                        'name'  => __( 'Show Return to Top', 'mylk-faq' ),
                        'desc'  => __( 'Enable a "Return to Top" link at the bottom of this FAQ. The link will return the user to the top of this specific question', 'mylk-faq' ),
                        'type'  => 'checkbox'
                    ),
                    array(
                        'id'    => '_acf_open',
                        'name'  => __( 'Load FAQ Open', 'mylk-faq' ),
                        'desc'  => __( 'Load this FAQ in the open state (default is closed). This is not available when using the accordion configuration', 'mylk-faq' ),
                        'type'  => 'checkbox'
                    )
                )
            )
        );

        return $meta_boxes;
    }

     /**
     * Load Scripts when FAQs are there on page
     *
     * @since   1.7.0
     * @version 1.7.0
     */
     function load_scripts() {
        // Set our JS to load
        //wp_enqueue_script( 'mylk-faq-js' );

         /**
         * Load the CSS necessary for the accordion script
         *
         * If you plan on adding a filter to use a different jQuery UI theme, it's highly recommended
         * you reference the $wp_scripts global as well as the $ui variable to make sure we load the CSS
         * for the version of jQuery WordPress loads
         */
        //if( apply_filters( 'pre_register_mylk_faq_jqui_css', true ) ) {
           //global $wp_scripts;

            // get registered script object for jquery-ui
            //$ui = $wp_scripts->query( 'jquery-ui-core' );

            // $css_args = apply_filters( 'mylk_jqueryui_css_reg', array(
            //     'url' => '//ajax.googleapis.com/ajax/libs/jqueryui/' . $ui->ver . '/themes/smoothness/jquery-ui.min.css',
            //     'ver' => $ui->ver,
            //     'dep' => false
            // ) );

            //wp_enqueue_style( 'jquery-ui-smoothness', $css_args['url'], $css_args['dep'], $css_args['ver'] );
        //}

        // Load the CSS - Check the theme directory first, the parent theme (if applicable) second, otherwise load the plugin file
        // if( apply_filters( 'pre_register_mylk_faq_css', true ) ) {
        //     if( file_exists( get_stylesheet_directory() . '/mylk-faq.css' ) )
        //         wp_enqueue_style( 'mylk-faq', get_stylesheet_directory_uri() . '/mylk-faq.css', false, $this->version );
        //     elseif( file_exists( get_template_directory() . '/mylk-faq.css' ) )
        //         wp_enqueue_style( 'mylk-faq', get_template_directory_uri() . '/mylk-faq.css', false, $this->version );
        //     else
        //         wp_enqueue_style( 'mylk-faq', $this->url . 'css/mylk-faq.css', false, $this->version );
        // }
     }

    /**
     * Display FAQs
     *
     * @since   0.9
     * @version 1.2.0
     * @param   array $atts
     */
    function faq_shortcode( $atts, $content = null ) {
        
        //$this->load_scripts();

        // Translate 'all' to nopaging = true ( for backward compatibility)
        if( isset( $atts['showposts'] ) ) {
            if( $atts['showposts'] != "all" and $atts['showposts'] > 0 ) {
                $atts['posts_per_page'] = $atts['showposts'];
            }
        }

        $f = new mylk_FAQ_Display;

        return $f->loop( $atts );
    }

    /**
     * Register the necessary Javascript and CSS, which can be overridden in a couple different ways.
     *
     * If you would like to bundle the Javacsript or CSS funtionality into another file and prevent either of the plugin's
     * JS or CSS from loading at all, return false to whichever of the pre_register filters you wish to override
     *
     * @example add_filter( 'pre_register_mylk_faq_js', '__return_false' );
     *
     * If you'd like to use your own JS or CSS file, you can copy the mylk-faq.js or mylk-faq.css files to the
     * root of your theme's folder. That will be loaded in place of the plugin's version, which means you can modify
     * it to your heart's content and know the file will be safe when the plugin is updated in the future.
     *
     * @since   1.2.0
     * @version 1.6.0
     */
    function enq_scripts() {
        // Register the javascript - Check the theme directory first, the parent theme (if applicable) second, otherwise load the plugin file
        // if ( apply_filters( 'pre_register_mylk_faq_js', true ) ) {
        //     if( file_exists( get_stylesheet_directory() . '/mylk-faq.js' ) )
        //         wp_register_script( 'mylk-faq-js', get_stylesheet_directory_uri() . '/mylk-faq.js', array( 'jquery-ui-accordion' ), $this->version );
        //     elseif( file_exists( get_template_directory() . '/mylk-faq.js' ) )
        //         wp_register_script( 'mylk-faq-js', get_template_directory_uri() . '/mylk-faq.js', array( 'jquery-ui-accordion' ), $this->version );
        //     else
        //         wp_register_script( 'mylk-faq-js', $this->url . 'js/mylk-faq.js', array( 'jquery-ui-accordion' ), $this->version );
        // }

        // /**
        //  * Load the CSS necessary for the accordion script
        //  *
        //  * If you plan on adding a filter to use a different jQuery UI theme, it's highly recommended
        //  * you reference the $wp_scripts global as well as the $ui variable to make sure we load the CSS
        //  * for the version of jQuery WordPress loads
        //  */
        // if( apply_filters( 'pre_register_mylk_faq_jqui_css', true ) ) {
        //     global $wp_scripts;

        //     // get registered script object for jquery-ui
        //     $ui = $wp_scripts->query( 'jquery-ui-core' );

        //     $css_args = apply_filters( 'mylk_jqueryui_css_reg', array(
        //         'url' => '//ajax.googleapis.com/ajax/libs/jqueryui/' . $ui->ver . '/themes/smoothness/jquery-ui.min.css',
        //         'ver' => $ui->ver,
        //         'dep' => false
        //     ) );

        //     wp_enqueue_style( 'jquery-ui-smoothness', $css_args['url'], $css_args['dep'], $css_args['ver'] );
        // }

        // // Load the CSS - Check the theme directory first, the parent theme (if applicable) second, otherwise load the plugin file
        // if( apply_filters( 'pre_register_mylk_faq_css', true ) ) {
        //     if( file_exists( get_stylesheet_directory() . '/mylk-faq.css' ) )
        //         wp_enqueue_style( 'mylk-faq', get_stylesheet_directory_uri() . '/mylk-faq.css', false, $this->version );
        //     elseif( file_exists( get_template_directory() . '/mylk-faq.css' ) )
        //         wp_enqueue_style( 'mylk-faq', get_template_directory_uri() . '/mylk-faq.css', false, $this->version );
        //     else
        //         wp_enqueue_style( 'mylk-faq', $this->url . 'css/mylk-faq.css', false, $this->version );
        // }

    }

    /**
     * Includes admin scripts. Use the pre_register filter if you'd like to prevent the file from being loaded
     *
     * @since 1.2.0
     */
    function enq_admin_scripts() {
        if( apply_filters( 'pre_register_mylk_faq_admin_css', true ) )
            wp_enqueue_style( 'mylk-faq-admin', $this->url . 'css/admin.css', false, $this->version );
    }

    /**
     * Change the Post Updated messages
     *
     * @since   0.9
     * @version 1.5.2
     *
     * @global  stdObj  $post
     * @global  int     $post_ID
     * @param   array   $messages
     * @return  array   $messages
     */
    function messages( $messages ) {
        global $post, $post_ID;
        $post_type = get_post_type( $post_ID );

        $obj = get_post_type_object( $post_type );
        $singular = $obj->labels->singular_name;

        $messages[$post_type] = array(
            0  => '', // Unused. Messages start at index 1.
            1  => sprintf( __( $singular . ' updated. <a href="%s">View ' . strtolower( $singular ) . '</a>', 'mylk-faq' ), esc_url( get_permalink( $post_ID ) ) ),
            2  => __( 'Custom field updated.', 'mylk-faq' ),
            3  => __( 'Custom field deleted.', 'mylk-faq' ),
            4  => __( $singular . ' updated.', 'mylk-faq' ),
            5  => isset( $_GET['revision'] ) ? sprintf( __( $singular . ' restored to revision from %s', 'mylk-faq' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6  => sprintf( __( $singular . ' published. <a href="%s">View ' . strtolower( $singular ) . '</a>', 'mylk-faq' ), esc_url( get_permalink( $post_ID ) ) ),
            7  => __( 'Page saved.' ),
            8  => sprintf( __( $singular . ' submitted. <a target="_blank" href="%s">Preview ' . strtolower( $singular ) . '</a>', 'mylk-faq' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
            9  => sprintf( __( $singular . ' scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview ' . strtolower( $singular ) . '</a>', 'mylk-faq' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
            10 => sprintf( __( $singular . ' draft updated. <a target="_blank" href="%s">Preview ' . strtolower( $singular ) . '</a>', 'mylk-faq' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
        );

        return $messages;
    }

    /**
     * Choose the specific columns we want to display
     *
     * @param   array   $columns
     * @return  string  $columns
     * @since   0.9
     * @version 1.2
     */
    function columns_filter( $columns ) {
        $columns = array(
            "cb"            => '<input type="checkbox" />',
            "title"         => __( 'FAQ Title', 'mylk-faq' ),
            "faq_content"   => __( 'Answer', 'mylk-faq' ),
            'faq_groups'    => __( 'Group', 'mylk-faq' ),
            'faq_shortcode' => __( 'Shortcode', 'mylk-faq' ),
            "date"          => __( 'Date', 'mylk-faq' )
        );

        return $columns;
    }

    /**
     * Filter the data that shows up in the columns we defined above
     *
     * @global  stdObj $post
     * @param   array $column
     * @since   0.9
     * @version 1.1
     */
    function column_action( $column ) {
        global $post;

        switch( $column ) {
            case "faq_content":
                the_excerpt();
                break;
            case "faq_groups":
                echo get_the_term_list( $post->ID, 'group', '', ', ', '' );
                break;
            case "faq_shortcode":
                printf( '[faq p=%d]', get_the_ID() );
                break;
            default:
                break;
        }
    }


    /**
     * Adds a metabox to the FAQ creation screen.
     *
     * This metabox shows the shortcode with the post_id for users to display
     * just that faq on a post, page or other applicable location
     *
     * @since   1.6.0
     */
    public function add_faq_metabox() {
        add_meta_box( 'mylk-faq-box', __( 'FAQ Shortcode', 'mylk-faq' ), array( $this, 'faq_box' ), 'faq', 'side' );
    }

    /**
     * Output for the faq shortcode metabox. Creates a readonly inputbox that outputs the faq shortcode
     * plus the $post_id
     *
     * @since   1.6.0
     *
     * @global  int     $post_ID    ID of the current post
     */
    public function faq_box() {
        global $post_ID;
        ?>
        <p class="howto">
            <?php _e( 'To display this question, copy the code below and paste it into your post, page, text widget or other content area.', 'mylk-faq' ); ?>
        </p>
        <p><input type="text" value="[faq p=<?php echo $post_ID; ?>]" readonly="readonly" class="widefat wp-ui-text-highlight code"></p>
        <?php
    }

}