<?php

new BLShips();
class BLShips {
    
    private $mShipPostType = 'blship';
    
    private $mLogPostType = 'blshiplog';
    
    public function __construct() {
        
        if( is_admin() ) {
            
            // Register Ship post type
            add_action( 'init', array( &$this, 'registerShipPostType' ) );
            
            // Save ship info entered in form meta
            add_action( 'save_post', array( &$this, 'saveShipMeta' ) );
            
            // Register Ship Log Post Type
            add_action( 'init', array( &$this, 'registerLogPostType' ) );
            
            // Save log info entered in form meta
            add_action( 'save_post', array( &$this, 'saveLogMeta' ) );
        }
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
            'query_var' => 'ship',
            'rewrite' => array( 'slug' => 'ship' ),
            //'menu_icon' => 'fs/path/to/icon',
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
        //echo '<pre>'; var_dump($meta); echo '</pre>';
        require_once( SHIPS_LOG_PLUGIN_DIR . 'views/admin/ship-log-entry.php' );
    }
    
    /**
     * Saves the log meta info
     * @param Integer $PostId 
     */
    public function saveLogMeta( $PostId ) {
        
       
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
            'rewrite' => array( 'slug' => 'ship' ),
            'show_in_menu' => 'edit.php?post_type=' . $this->mLogPostType,
            //'menu_icon' => 'fs/path/to/icon',
            'register_meta_box_cb' => array( &$this, 'registerShipMetabox' )
            
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