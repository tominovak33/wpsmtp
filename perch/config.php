/*---------------------------
/ SMTP
/--------------------------*/
define('PERCH_EMAIL_METHOD', 'smtp');
define('PERCH_EMAIL_HOST', 'smtp.mandrillapp.com'); // Your smtp provider
define('PERCH_EMAIL_SECURE', 'tls'); // Unlike with WP 'ssl' wont work
define('PERCH_EMAIL_PORT', 587); // Port that your smtp provider uses
define('PERCH_EMAIL_USERNAME', '<your-mandrill-email-username>');
define('PERCH_EMAIL_PASSWORD', '<your-mandrill-api-key>');
define('PERCH_EMAIL_AUTH', true); // To make it work

// Make sure that your hosting provider allows outbound SMTP connections on the port you use for the user that the site is running as!
// If things are really going downhill, set this on the phpmailer object: $phpmailer->SMTPDebug  = 2; // Or 1

/*---------------------------
/ End
/--------------------------*/
