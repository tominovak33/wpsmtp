<?php
/**
 * Plugin Name: TOMINOVAK33-WPMAIL-MANDRILL
 * Description: Set the right phpmailer settings for using mandrill SMTP servers
 */

defined( 'ABSPATH' ) OR exit; // Only run as part of WP

add_action( 'phpmailer_init', 'phpmailerSMTP' );

function phpmailerSMTP( $phpmailer ) { 
    $phpmailer->IsSMTP();                                         // Set mailer to use SMTP
    $phpmailer->Host         = 'smtp.mandrillapp.com';            // Specify main and backup server
    $phpmailer->Port         = 587;                               // Set the SMTP port
    $phpmailer->SMTPAuth     = true;                              // Enable SMTP authentication
    $phpmailer->Username     = '<USERNAME>';                      // SMTP username
    $phpmailer->Password     = '<API-KEY>';                       // SMTP password
    $phpmailer->SMTPSecure   = 'tls';                             // Enable encryption, 'ssl' also accepted
    $phpmailer->addCustomHeader("X-MC-Subaccount: <SUBACCOUNT>"); // Subaccount ID from mandrill to allow for separation
}

