<?php
/**
 * Class Ashlin_Slideshow_Admin_Test
 *
 * @package Ashlin_Slideshow
 */

/**
 * Sample test case.
 */
class Ashlin_Slideshow_Admin_Test extends WP_Ajax_UnitTestCase {

    /**
     * Set up
     * */
    public function set_up() {
        parent::set_up();

        $_SERVER['REQUEST_METHOD'] = 'POST';

        // Create a user with nicename 'Ashlin'
        $user_id = $this->factory->user->create( [
            'user_nicename' => 'Ashlin',
            'role'          => 'administrator',
        ] );

        // Set current user as 'Ashlin' so this user will have capability 'manage_options'
        wp_set_current_user( $user_id );
    }

    /**
     * To make an ajax call
     * */
    protected function make_ajax_call( $action ) {
        // Make the request.
        try {
            $this->_handleAjax( $action );
        } catch ( WPAjaxDieContinueException $e ) {
            unset( $e );
        }
    }

    /**
     * Test for ajax_update_slideshow().
     */
    public function test_ajax_update_slideshow() {
        // Set POST values
        $_POST      =  array(
            'action'    => 'as_update_slideshow',
            'nonce'     => wp_create_nonce( 'ashlin-slideshow-ajax-nonce' ),
            'images'    => '10,11'
        );

        $this->make_ajax_call( 'as_update_slideshow' );

        // Get the results.
        $response   = json_decode( $this->_last_response, true );

        $this->assertTrue( $response['success'] );
    }

}
