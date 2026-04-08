<?php
require 'config.php';

// Load .env file
Config::load();

// Test all mail config values
echo "Config Test Results:\n";
echo "====================\n\n";

$mailFromEmail = Config::get('MAIL_FROM_EMAIL', 'noreply@arishte.com');
$mailFromName = Config::get('MAIL_FROM_NAME', 'Arishte Kitchen');
$mailToEmail = Config::get('MAIL_TO_EMAIL', 'info@arishte.com');
$mailDriver = Config::get('MAIL_DRIVER', 'php');
$mailHost = Config::get('MAIL_HOST');
$mailPort = Config::get('MAIL_PORT', 587);
$mailUsername = Config::get('MAIL_USERNAME');
$mailPassword = Config::get('MAIL_PASSWORD');
$mailEncryption = Config::get('MAIL_ENCRYPTION', 'tls');

echo "MAIL_FROM_EMAIL: (should be noreply@arishte.com)\n";
echo "  Value: " . $mailFromEmail . "\n";
echo "  Status: " . ($mailFromEmail === 'noreply@arishte.com' ? '✓ CORRECT' : '✗ WRONG') . "\n\n";

echo "MAIL_FROM_NAME: (should be Arishte Kitchen)\n";
echo "  Value: " . $mailFromName . "\n";
echo "  Status: " . ($mailFromName === 'Arishte Kitchen' ? '✓ CORRECT' : '✗ WRONG') . "\n\n";

echo "MAIL_TO_EMAIL: (should be info@arishte.com)\n";
echo "  Value: " . $mailToEmail . "\n";
echo "  Status: " . ($mailToEmail === 'info@arishte.com' ? '✓ CORRECT' : '✗ WRONG') . "\n\n";

echo "MAIL_DRIVER: (should be smtp)\n";
echo "  Value: " . $mailDriver . "\n";
echo "  Status: " . ($mailDriver === 'smtp' ? '✓ CORRECT' : '✗ WRONG') . "\n\n";

echo "MAIL_HOST: (should be smtp.gmail.com or similar)\n";
echo "  Value: " . ($mailHost ? $mailHost : 'NOT SET') . "\n";
echo "  Status: " . ($mailHost ? '✓ SET' : '✗ NOT SET') . "\n\n";

echo "MAIL_PORT: (should be 587)\n";
echo "  Value: " . $mailPort . "\n";
echo "  Status: " . ($mailPort == 587 ? '✓ CORRECT' : '✗ WRONG') . "\n\n";

echo "MAIL_USERNAME: (should be info@arishte.com)\n";
echo "  Value: " . ($mailUsername ? '***SET***' : 'NOT SET') . "\n";
echo "  Status: " . ($mailUsername ? '✓ SET' : '✗ NOT SET') . "\n\n";

echo "MAIL_PASSWORD: (should be set)\n";
echo "  Value: " . ($mailPassword ? '***SET***' : 'NOT SET') . "\n";
echo "  Status: " . ($mailPassword ? '✓ SET' : '✗ NOT SET') . "\n\n";

echo "MAIL_ENCRYPTION: (should be tls)\n";
echo "  Value: " . $mailEncryption . "\n";
echo "  Status: " . ($mailEncryption === 'tls' ? '✓ CORRECT' : '✗ WRONG') . "\n\n";

echo "File Status:\n";
echo "============\n";
echo ".env file exists: " . (file_exists('.env') ? '✓ YES' : '✗ NO') . "\n";
echo ".env file readable: " . (is_readable('.env') ? '✓ YES' : '✗ NO') . "\n";
?>
