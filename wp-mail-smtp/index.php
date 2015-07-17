<?php
defined( 'ABSPATH' ) OR exit;

/**
 * Plugin Name: WPMAL-MANDRILL
 * Description: Set right phpmailer setting for mandrill
 */

add_action( 'phpmailer_init', 'phpmailerSMTP' );
function phpmailerSMTP( $phpmailer )
{
    $phpmailer->IsSMTP();                                           // Set mailer to use SMTP
    $phpmailer->Host = 'smtp.mandrillapp.com';                      // Specify main and backup server
    $phpmailer->Port = 587;                                         // Set the SMTP port
    $phpmailer->SMTPAuth = true;                                    // Enable SMTP authentication
    $phpmailer->Username = 'USERNAME';    // SMTP username
    $phpmailer->Password = 'API-KEY';                // SMTP password
    $phpmailer->SMTPSecure = 'tls';                                 // Enable encryption, 'ssl' also accepted
    $phpmailer->addCustomHeader("X-MC-Subaccount: SUBACCOUNT");

}
