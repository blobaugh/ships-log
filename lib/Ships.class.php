<?php

new BLShips();
class BLShips {
    
    private $mShipPostType = 'blship';
    
    private $mLogPostType = 'blshiplog';
    
    public function __construct() {
        
            
            // Register Ship post type
            add_action( 'init', array( &$this, 'registerShipPostType' ) );
            
            // Save ship info entered in form meta
            add_action( 'save_post', array( &$this, 'saveShipMeta' ) );
            
            // Setup template for ship
            // DISABLE UNTIL A GOOD FIX IS FOUND add_action( 'template_redirect', array( &$this, 'shipTemplate' ) );
            
            // Register Ship Log Post Type
            add_action( 'init', array( &$this, 'registerLogPostType' ) );
            
            // Save log info entered in form meta
            add_action( 'save_post', array( &$this, 'saveLogMeta' ) );
            
            // Setup template for log
            //add_action( 'template_redirect', array( &$this, 'logTemplate' ) );
            
            // Validate ship log before allowing a publish
            add_action( 'publish_' . $this->mLogPostType, array( &$this, 'validateLogForPublish') );
            
            // Add CSS and JS files required for the frontend
            //add_action( 'wp_enqueue_scripts', array( &$this, 'frontend_enqueue' ) );
      
    }
    
    public function frontend_enqueue() {
        wp_register_style('ship-log', SHIPS_LOG_PLUGIN_URL.'/css/ship-log.css');
		wp_enqueue_style('ship-log');
        
    }
    
    public function logTemplate() {
        global $post;
        
        $meta = get_post_meta( $post->ID );
        $ship = get_post( $meta['ShipId'][0] );
        $ship_meta = get_post_meta( $ship->ID );
        
        $meta['ShipName'] = $ship->post_title;;
                
        if( $this->mLogPostType != $post->post_type )
            return;
        
        if(is_singular( $this->mLogPostType ) ) {
            $template = "single-$this->mLogPostType.php";
        } else if( is_post_type_archive( $this->mLogPostType ) ) {
            $template = "archive-$this->mLogPostType.php";
        }
        
       
        if( '' == locate_template( array( $template ) ) ) {
            // Template could not be found in child or parent theme
            $file = SHIPS_LOG_PLUGIN_DIR . "views/$template";
            require_once( $file );
        }
        
        // Do not continue loading
        exit();
    }
    
    
    public function shipTemplate() {
        global $post;
        
        $meta = get_post_meta( $post->ID );
                
        if( $this->mShipPostType != $post->post_type )
            return;
        
        if(is_singular( $this->mShipPostType ) ) {
            $template = "single-$this->mShipPostType.php";
        } else if( is_post_type_archive( $this->mShipPostType ) ) {
            $template = "archive-$this->mShipPostType.php";
        }
        
       
        if( '' == locate_template( array( $template ) ) ) {
            // Template could not be found in child or parent theme
            $file = SHIPS_LOG_PLUGIN_DIR . "views/$template";
            require_once( $file );
        }
        
        // If I get here then I was unable to find a template. Pass back
        return;
    }
    
    public function getShips() {
        $args = array(
            'post_type' => $this->mShipPostType,
            'post_status' => 'any'
        );
        return get_posts( $args );
    }
    
    /*
     * http://codex.wordpress.org/Post_Status_Transitions
     */
    public function validateLogForPublish( $PostId ) {
        //die("attempting to publish a log");
        
        // Check to see if the log is associated with a ship
            // If not
                // Change post status to pending
        
                // Show error message to user
            
            // If it is associated do nothing so the log publishes
    }
    
    /**
     * Creates a new post type for the ship log 
     */
    public function registerLogPostType() {
        
         $labels = array(
            'name' => 'Ship Log',
            'singular_name' => 'Ship Log',
            'add_new' => 'New Log Entry ',
            'add_new_item' => 'New Log Entry',
            'edit_item' => 'Edit Log Entry',
            'new_item' => 'New Log Entry',
            'view_item' => 'View Log Entry',
            'search_items' => 'Search Logs',
            'not_found' => 'No Logs found',
            'not_found_in_trash' => 'No Logs found in trash'
        );
        
        $args = array(
            'public' => true,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'labels' => $labels,
            'hierarchical' => false,
            'has_archive' => true,
            'query_var' => 'shiplog',
            'rewrite' => array( 'slug' => 'ship-log', 'with_front' => false ),
            'menu_icon' => SHIPS_LOG_PLUGIN_URL . 'images/ship-icons/aosicon112.png',
            'register_meta_box_cb' => array( &$this, 'registerLogMetabox' )
            
        );
        
        register_post_type( $this->mLogPostType, $args );
    }
    
    /**
     * Creates the log details metabo 
     */
    public function registerLogMetabox() {
        add_meta_box( 'blshipsmeta', 'Log Details', array( &$this, 'renderLogMetabox' ), $this->mLogPostType, 'advanced', 'high' );
    }
    
    /**
     * Displays the log details for the meta box
     * @param WP_Post $Post 
     */
    public function renderLogMetabox( $Post ) {
        $meta = get_post_custom( $Post->ID );
        $ships = $this->getShips();
        //echo '<pre>'; var_dump($meta); echo '</pre>';
        require_once( SHIPS_LOG_PLUGIN_DIR . 'views/admin/ship-log-entry.php' );
    }
    
    /**
     * Saves the log meta info
     * @param Integer $PostId 
     */
    public function saveLogMeta( $PostId ) {
        
       // Exit early on autosave because we may not have a post id
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
                return false;
        
        if( isset( $_POST['log'] ) ) {
            $_POST['log'] = stripslashes_deep( $_POST['log'] );
            foreach( $_POST['log'] AS $k => $v ) {
                update_post_meta( $PostId, $k, $v );
            }
        }
    }
    
    
    /**
     * Creates the new post type for ships. This lives under the Ship Log top
     * level menu as "Manage Ships" 
     */
    public function registerShipPostType() {
        
        $labels = array(
            'name' => 'Manage Ships',
            'singular_name' => 'Ship',
            'add_new' => 'Add new Ship',
            'add_new_item' => 'Add new Ship',
            'edit_item' => 'Edit Ship',
            'new_item' => 'New Ship',
            'view_item' => 'View Ship',
            'search_items' => 'Search Ships',
            'not_found' => 'No Ships found',
            'not_found_in_trash' => 'No Ships found in trash'
        );
        
        $args = array(
            'public' => true,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'labels' => $labels,
            'hierarchical' => false,
            'has_archive' => true,
            'query_var' => 'ship',
            'rewrite' => array( 'slug' => 'ship', 'with_front' => false ),
            'show_in_menu' => 'edit.php?post_type=' . $this->mLogPostType,
            //'menu_icon' => 'fs/path/to/icon',
            'register_meta_box_cb' => array( &$this, 'registerShipMetabox' ),
          //  'publicly_queryable' => true
            
        );
        
        register_post_type( $this->mShipPostType, $args );
    }
    
    /**
     * Creates the metabox for ship details 
     */
    public function registerShipMetabox() {
        add_meta_box( 'blships', 'Ship Details', array( &$this, 'renderShipMetabox' ), $this->mShipPostType );
    }
    
    /**
     * Displays the ship's meta information
     * @param WP_Post $Post 
     */
    public function renderShipMetabox( $Post ) {
        $meta = get_post_custom( $Post->ID );
        //echo '<pre>'; var_dump($meta); echo '</pre>';
        require_once( SHIPS_LOG_PLUGIN_DIR . 'views/admin/ship-metabox.php' );
    }
    
    /**
     * Save the ship's meta information
     * @param Integer $PostId
     * @return boolean 
     */
    public function saveShipMeta( $PostId ) {
        // Exit early on autosave because we may not have a post id
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
                return false;
        
        if( isset( $_POST['ship'] ) ) {
            $_POST['ship'] = stripslashes_deep( $_POST['ship'] );
            foreach( $_POST['ship'] AS $k => $v ) {
                update_post_meta( $PostId, $k, $v );
            }
        }
        
    }
} // end class
