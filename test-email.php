<?php
// Simple test to verify email would be sent correctly
require 'config.php';
require 'php_mailer/PHPMailer.php';

Config::load();

// Get config values
$fromEmail = Config::get('MAIL_FROM_EMAIL', 'noreply@arishte.com');
$fromName = Config::get('MAIL_FROM_NAME', 'Arishte Kitchen');
$toEmail = Config::get('MAIL_TO_EMAIL', 'info@arishte.com');
$mailDriver = Config::get('MAIL_DRIVER', 'php');

echo "Email Configuration Test\n";
echo "========================\n\n";
echo "FROM: " . $fromEmail . " (" . $fromName . ")\n";
echo "TO:   " . $toEmail . "\n";
echo "DRIVER: " . $mailDriver . "\n\n";

// Simulate what would happen in the form
$test_client_email = 'admin01@guardeye.com';
$test_client_name = 'Test Client';

$mail = new PHPMailer(true);

// Set the mails address first
$mail->setFrom($fromEmail, $fromName);
echo "After setFrom(): " . $mail->getFromAddress() . "\n";

// Try to set it again (simulating any accidental second call)
// This should be blocked by the lock now
$mail->setFrom($test_client_email, $test_client_name);
echo "After attempting setFrom with client email: " . $mail->getFromAddress() . "\n";

// Set other fields
$mail->addAddress($toEmail, 'Arishte Kitchen');
echo "TO address set to: " . $toEmail . "\n";

// Set reply-to
$mail->setReplyTo($test_client_email, $test_client_name);
echo "REPLY-TO set to: " . $test_client_email . "\n\n";

echo "✓ Test complete. FROM address should always be: " . $fromEmail . "\n";
?>
