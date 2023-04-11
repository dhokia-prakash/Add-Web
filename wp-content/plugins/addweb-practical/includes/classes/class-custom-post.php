<?php
// Exit if accessed directly
if (!defined('ABSPATH')) { exit; }
if (!class_exists('CUSTOM_POST')) {
    class CUSTOM_POST
    {
        /**
         * Holds a copy of itself, so it can be referenced by the class name.
         *
         * @since 3.5
         *
         * @var CUSTOM_POST
         */       
        public function __construct()
        {
            $this->init();            
                        
        }
        
        /**
         * Call when object of class created.
         */
        public function init()
        {
            /**
             * Activate plugin and create custom post type with Wordpress
             */               
                       
            add_action('init', array($this, 'custom_post_type'));
	    add_action('init', array($this, 'custom_taxonomies_resource'));
        }    

        public static function is_custom_post_plugin_activate()
        {
            if (!function_exists('is_plugin_active')) {
                include_once ABSPATH.'wp-admin/includes/plugin.php';
            }
            if (!is_plugin_active('custom-post/functions.php')) {
                return false;
            }
            return true;
        }
        
        public function custom_post_type()
        {      

		/**
        	* Create custom post type of Resource.
        	*/

		$labels = array(
		'name'               => _x( 'Resource', 'add-web' ),
		'singular_name'      => _x( 'Resource', 'add-web' ),
		'add_new'            => _x( 'Add New', 'resource' ),
		'add_new_item'       => __( 'Add New Resource', 'add-web' ),
		'edit_item'          => __( 'Edit Resource', 'add-web' ),
		'new_item'           => __( 'New Resource', 'add-web' ),
		'all_items'          => __( 'All Resources', 'add-web' ),
		'view_item'          => __( 'View Resource', 'add-web' ),
		'search_items'       => __( 'Search Resources', 'add-web' ),
		'not_found'          => __( 'No Resources found', 'add-web' ),
		'not_found_in_trash' => __( 'No resources found in the Trash', 'add-web' ), 
		'menu_name'          => 'Resources'
		);
		
		/**
        	* Pass the args.
        	*/

		$args = array(
		'labels'        => $labels,
		'description'   => 'Resource',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
		);
		
		/**
        	* Call the default register function.
        	*/

		register_post_type( 'resource', $args );
             
       }

	public function custom_taxonomies_resource()
	{
		/**
        	* Create the labels for taxonomies of Resource Type
        	*/

		$labels = array(
		'name'              => _x( 'Resource Type', 'add-web' ),
		'singular_name'     => _x( 'Resource Type', 'add-web' ),
		'search_items'      => __( 'Search Resource type', 'add-web' ),
		'all_items'         => __( 'All Resource Type', 'add-web' ),
		'parent_item'       => __( 'Parent Resource Type', 'add-web' ),
		'parent_item_colon' => __( 'Parent Resource Type:', 'add-web' ),
		'edit_item'         => __( 'Edit Resource Type', 'add-web' ), 
		'update_item'       => __( 'Update Resource Type', 'add-web' ),
		'add_new_item'      => __( 'Add New Resource Type', 'add-web' ),
		'new_item_name'     => __( 'New Resource Type', 'add-web' ),
		'menu_name'         => __( 'Resource Type', 'add-web' ),
		);

		$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		);

		/**
        	* Call the taxonomy function for resource type
        	*/

		register_taxonomy( 'resource_type', 'resource', $args );
		
		/**
        	* Create the labels for taxonomies of Resource Type
        	*/
		$labels = array(
		'name'              => _x( 'Resource Topic', 'add-web' ),
		'singular_name'     => _x( 'Resource Topic', 'add-web' ),
		'search_items'      => __( 'Search Resource topic', 'add-web' ),
		'all_items'         => __( 'All Resource Topic', 'add-web' ),
		'parent_item'       => __( 'Parent Resource Topic', 'add-web' ),
		'parent_item_colon' => __( 'Parent Resource Topic:', 'add-web' ),
		'edit_item'         => __( 'Edit Resource Topic', 'add-web' ), 
		'update_item'       => __( 'Update Resource Topic', 'add-web' ),
		'add_new_item'      => __( 'Add New Resource Topic', 'add-web' ),
		'new_item_name'     => __( 'New Resource Topic', 'add-web' ),
		'menu_name'         => __( 'Resource Topic', 'add-web' ),
		  );

		$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		);
		
		/**
        	* Call the taxonomy function for resource topic
        	*/

		register_taxonomy( 'resource_topic', 'resource', $args );

	}  		
	

    }
       
}?>
