<?php
defined( 'ABSPATH' ) OR exit;

/**
 * Plugin Name: WPMAIL-SMTP
 * Description: Set WP to use smtp
 */

add_action( 'phpmailer_init', 'WCMphpmailerException' );
function WCMphpmailerException( $phpmailer ) {
    if ( ! defined( 'WP_DEBUG' ) OR ! WP_DEBUG )
    {
        $phpmailer->SMTPDebug = 0;
        $phpmailer->debug = 0;
        return;
    }
    if ( ! current_user_can( 'manage_options' ) )
        return;

    // Enable SMTP
    # $phpmailer->IsSMTP();
    $phpmailer->SMTPDebug = 2;
    $phpmailer->debug     = 1;

    $data = apply_filters(
        'wp_mail',
        compact( 'to', 'subject', 'message', 'headers', 'attachments' )
    );

    current_user_can( 'manage_options' )
    AND print htmlspecialchars( var_export( $phpmailer, true ) );

    $error = null;
    try
    {
        $sent = $phpmailer->Send();
        ! $sent AND $error = new WP_Error( 'phpmailerError', $sent->ErrorInfo );
    }
    catch ( phpmailerException $e )
    {
        $error = new WP_Error( 'phpmailerException', $e->errorMessage() );
    }
    catch ( Exception $e )
    {
        $error = new WP_Error( 'defaultException', $e->getMessage() );
    }

    if ( is_wp_error( $error ) )
        return printf(
            "%s: %s",
            $error->get_error_code(),
            $error->get_error_message()
        );
}
