<?php
/*
Plugin Name: NYT Data Block
Description: Display info from the NYT API using a shortcode
Version:     1.0
Author:      Samantha Gray
License:     GPL2+
License URI: https://www.gnu.org/licenses/gpl-2.0.html

*/
class Fone_NYT_Data_Block_Plugin {

    public function __construct() {
    	// Hook into the admin menu
    	add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );

        // Add sections and form fields
    	add_action( 'admin_init', array( $this, 'fone_setup_sections' ) );
    	add_action( 'admin_init', array( $this, 'fone_setup_form_data' ) );
    }

    public function create_plugin_settings_page() {
    	// Add the menu item and page
    	$page_title = 'New York Times Data Block Settings ';
    	$menu_title = 'NYT Data';
    	$capability = 'manage_options';
    	$slug = 'fone_nyt_data_block';
    	$callback = array( $this, 'plugin_settings_page_content' );
    	$icon = 'dashicons-admin-plugins';
    	$position = 100;

    	add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
    }

    public function plugin_settings_page_content() {?>
    	<div class="wrap">
    		<h2>New York Times API - Data Block Settings</h2><?php
            if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ){
                  $this->admin_notice();
            } ?>
    		<form method="POST" action="options.php">
                <?php
                    settings_fields( 'fone_nyt_data_block' );
                    do_settings_sections( 'fone_nyt_data_block' );
                    submit_button();
                ?>
    		</form>
    	</div> <?php
    }
    
    public function admin_notice() { ?>
        <div class="notice notice-success is-dismissible">
            <p>Your settings have been updated!</p>
        </div><?php
    }

    public function fone_setup_sections() {
        add_settings_section( 'our_first_section', 'How to use this plugin', array( $this, 'fone_section_callback' ), 'fone_nyt_data_block' );
        add_settings_section( 'fone_form_settings_section', 'NYT API settings', array( $this, 'fone_section_callback' ), 'fone_nyt_data_block' );
    }

    public function fone_section_callback( $arguments ) {
    	switch( $arguments['id'] ){
    		case 'our_first_section':
    			echo '<a href="https://developer.nytimes.com/apis" target="_blank">See the NYT API docs</a>';
    			break;
    		case 'fone_form_settings_section':
    			echo 'This is where our settings form lives';
    			break;

    	}
    }

    public function fone_setup_form_data(){
        $form_field = array(
            // array(
                'uid' => 'nyt_api_endpoint',
                'label' => 'NYT API Endpoint',
                'section' => 'fone_form_settings_section',
                'type' => 'text',
                'placeholder' => 'https://api.nytimes.com/svc/topstories/v2/home.json?api-key={{api_key}}',
                'helper' => '<a href="https://developer.nytimes.com/get-started" target="_blank">Register for your NYT API key</a>',
                'supplimental' => 'https://api.nytimes.com/svc/topstories/v2/home.json?api-key={{api_key}}',

        );
        add_settings_field( $form_field['uid'], $form_field['label'], array( $this, 'fone_field_callback' ), 'fone_nyt_data_block', $form_field['section'], $form_field );
        register_setting( 'fone_nyt_data_block', $form_field['uid'] );
   
    }

    public function fone_field_callback( $arguments ) {

        $value = get_option( $arguments['uid'] );

        if( ! $value ) {
            $value = $arguments['default'];
        }

        switch( $arguments['type'] ){
            case 'text':
                printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
                break;
            
        }

        if( $helper = $arguments['helper'] ){
            printf( '<span class="helper"> %s</span>', $helper );
        }

        if( $supplimental = $arguments['supplimental'] ){
            printf( '<p class="description">%s</p>', $supplimental );
        }

    }

}
new Fone_NYT_Data_Block_Plugin();