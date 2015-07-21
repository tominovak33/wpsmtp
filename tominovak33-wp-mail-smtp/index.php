<?php
/**
 * Plugin Name: TOMINOVAK33-WPMAIL-SMTP
 * Description: Set the right phpmailer settings for using other SMTP servers
 */

defined( 'ABSPATH' ) OR exit; // Only run as part of WP

add_action( 'phpmailer_init', 'phpmailerSMTP' );

function phpmailerSMTP( $phpmailer ) { 
    $phpmailer->IsSMTP();                                         // Set phpmailer to use SMTP
    $phpmailer->Host         = 'smtp.mandrillapp.com';            // Specify SMTP server
    $phpmailer->Port         = 587;                               // Set the SMTP port for your provider
    $phpmailer->SMTPAuth     = true;                              // Enable SMTP authentication
    $phpmailer->Username     = '<USERNAME>';                      // SMTP username (your mandrill username for example)
    $phpmailer->Password     = '<API-KEY>';                       // SMTP password (A valid API key from your account)
    $phpmailer->SMTPSecure   = 'tls';                             // Enable encryption, 'ssl' also accepted
    $phpmailer->addCustomHeader("X-MC-Subaccount: <SUBACCOUNT>"); // Subaccount ID from mandrill to allow for separation
}

