<?php
/*
 * Plugin Name: Benz List Builder 
 * Plugin URI: http://www.robbenz.com
 * Description: List Builder plugin built with Code College Usemy online course
 * Version: 1.0
 * Author: RobBenz
 * Author URI: http://www.robbenz.com 
 * License: GPL2
 */

// registers all our custom shorcodes on init
add_action('init', 'benz_register_shortcodes');

function benz_register_shortcodes() {
    add_shortcode('benz_form', 'benz_form_shortcode');
}

function benz_form_shortcode( $args, $content="") {
    // Setup output var - form html
    $output = '
        <div class="benz">
        <form id="benz_form" name="benz_form" method="post" class="benz-form">
       
        <p class="benz-input-wrap">
        <label>Your Name</label></br />
        <input type="text" name="benz_fname" placeholder="First Name" />
        <input type="text" name="benz_lname" placeholder="Last Name" />
        </p>
        
        <p class="benz-input-wrap">
        <label>Your Email</label></br />
        <input type="email" name="benz_email" placeholder="you@email.com" />
        </p>';
    if( strlen($content) ):

        $output .= '<div class="benz-content">' . wpautop($content) . '</div>';

        endif;

    $output .='<p class="benz-input-wrap">
        <input type="submit" name="benz_submit" value="Sign Up!" />
        </p>
        
        </form> 
        </div> 
        '; 
    // return output result/html
    return $output;

}
