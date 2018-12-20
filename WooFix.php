<?php

/*
  Plugin Name: WooFix-jwp
  Version: 1.1.0
  Plugin URI: https://junglewp.com
  Description: Temporary Fix WooCommerce 3.5.2 and WordPress 5.0.2 0
  Author: JungleWP LTD
  Author URI: https://junglewp.com
 */

//Temporary fix

/**
 * Check if WooCommerce is active
 **/
if ( 
    in_array( 
      'woocommerce-subscriptions/woocommerce-subscriptions.php', 
      apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) 
    ) 
  ) {
    
    echo "<div id='jwp-warning' class='notice notice-warning'><p><strong>" . __("Temporary WooCommerce Fix - Please Remember to deactivate this plugin Before you update WooCommerce to a newer version.", 'jwp_woo') .
            '<a href="https://github.com/Prospress/woocommerce-subscriptions-resource/issues/31">' . __("Github Issue tracking &rarr; WooCommerce - Subscriptions", 'jwp_woo') . '</a>.' . "</strong></p></div>";

    if(version_compare(get_option( 'woocommerce_version' ),"3.5.2","<=") && version_compare(get_bloginfo( 'version' ),"5.0.2","=") ){
        function fix_request_query_args_for_woocommerce( $query_args ) {
            if ( isset( $query_args['post_status'] ) && empty( $query_args['post_status'] ) ) {
                unset( $query_args['post_status'] );
            }
            return $query_args;
        }
        add_filter( 'request', 'fix_request_query_args_for_woocommerce', 1, 1 );
    }


  } else{

  echo "<div id='jwp-warning' class='notice notice-warning'><p><strong>" . __("Temporary WooCommerce Fix - Please Remember to deactivate this plugin Before you update WooCommerce to a newer version.", 'jwp_woo') .
            '<a href="https://github.com/woocommerce/woocommerce/issues/22271">' . __("Github Issue tracking &rarr; WooCommerce", 'jwp_woo') . '</a>.' . "</strong></p></div>";

    if(version_compare(get_option( 'woocommerce_version' ),"3.5.2","<=") && version_compare(get_bloginfo( 'version' ),"5.0.2","=") ){
        function fix_request_query_args_for_woocommerce( $query_args ) {
            if ( isset( $query_args['post_status'] ) && empty( $query_args['post_status'] ) ) {
                unset( $query_args['post_status'] );
            }
            return $query_args;
        }
        add_filter( 'request', 'fix_request_query_args_for_woocommerce', 1, 1 );
    }

}


