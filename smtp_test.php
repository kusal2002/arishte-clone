<?php
require 'config.php';

// Test SMTP Connection
echo "<h1>SMTP Connection Test</h1>";

$host = Config::get('MAIL_HOST');
$port = Config::get('MAIL_PORT', 587);
$username = Config::get('MAIL_USERNAME');
$password = Config::get('MAIL_PASSWORD');

echo "<pre>";
echo "SMTP Host: " . $host . "\n";
echo "SMTP Port: " . $port . "\n";
echo "Username: " . $username . "\n";
echo "Password: " . (str_repeat("*", strlen($password))) . "\n\n";

// Try to connect
echo "Attempting connection...\n";
$socket = @fsockopen($host, $port, $errno, $errstr, 10);

if ($socket) {
    echo "✓ Successfully connected to SMTP server!\n\n";
    
    // Read greeting
    $response = fgets($socket, 515);
    echo "Server response: " . $response;
    
    // Send EHLO
    fputs($socket, "EHLO test\r\n");
    $response = fgets($socket, 515);
    echo "EHLO response: " . $response;
    
    fclose($socket);
    echo "\n\n✓ Connection test passed!";
} else {
    echo "✗ Failed to connect to SMTP server\n";
    echo "Error: " . $errstr . " (" . $errno . ")\n\n";
    echo "Check:\n";
    echo "1. MAIL_HOST is correct\n";
    echo "2. MAIL_PORT is correct (usually 587 for TLS)\n";
    echo "3. Your firewall allows outgoing SMTP\n";
}

echo "</pre>";
?>
