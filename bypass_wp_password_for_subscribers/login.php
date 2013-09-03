<?php

$username = $_POST["username"];

require('../../../wp-blog-header.php');

$query_str = "SELECT ID FROM $wpdb->users WHERE user_login = '$username'";

$user_id = $wpdb->get_var( $query_str );

	if( !user_can( $user_id, 'delete_posts' ) ){

        wp_set_current_user($user_id, $username);

        wp_set_auth_cookie($user_id);

        do_action('wp_login', $username);

		wp_redirect( home_url( ) );

		exit;

    } else {

	wp_redirect( home_url( '/wp-admin' ) );

	exit;

    }

?>