<?php
/**
 * Simple PHPMailer - Email sending library with SMTP support
 * For use with Arishte contact form
 */

class PHPMailer {
    private $host = '';
    private $port = 587;
    private $username = '';
    private $password = '';
    private $encryption = 'tls';
    private $from = '';
    private $fromName = 'Arishte';
    private $to = '';
    private $replyTo = '';
    private $subject = '';
    private $body = '';
    private $isHTML = true;
    private $error = '';
    private $useSMTP = false;
    private $fromLocked = false;
    
    public function __construct($useSMTP = false) {
        $this->useSMTP = $useSMTP;
    }
    
    public function setFrom($email, $name = '') {
        // Prevent overwriting the from address once it's set
        if ($this->fromLocked) {
            return $this;
        }
        $this->from = $email;
        if ($name) $this->fromName = $name;
        $this->fromLocked = true;  // Lock it after first set
        return $this;
    }
    
    public function addAddress($email, $name = '') {
        $this->to = $email;
        return $this;
    }

    public function setReplyTo($email, $name = '') {
        $this->replyTo = $email;
        return $this;
    }
    
    public function getFromAddress() {
        return $this->from;
    }
    
    public function getToAddress() {
        return $this->to;
    }
    
    public function setHost($host) {
        $this->host = $host;
        return $this;
    }
    
    public function setPort($port) {
        $this->port = $port;
        return $this;
    }
    
    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }
    
    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }
    
    public function setEncryption($encryption) {
        $this->encryption = $encryption;
        return $this;
    }
    
    public function isHTML($isHTML = true) {
        $this->isHTML = $isHTML;
        return $this;
    }
    
    public function Subject($subject) {
        $this->subject = $subject;
        return $this;
    }
    
    public function Body($body) {
        $this->body = $body;
        return $this;
    }
    
    public function AltBody($text) {
        return $this;
    }
    
    public function send() {
        try {
            // Validate required fields
            if (empty($this->to) || empty($this->subject) || empty($this->body)) {
                $this->error = 'Missing required email fields (to, subject, body)';
                return false;
            }
            
            if (empty($this->from)) {
                $this->error = 'Missing from email address';
                return false;
            }
            
            // Log email sending details
            error_log("Sending email - From: {$this->from}, To: {$this->to}, Subject: {$this->subject}");
            
            // Use SMTP if configured
            if ($this->useSMTP && !empty($this->host) && !empty($this->username) && !empty($this->password)) {
                return $this->sendViaSMTP();
            }
            
            // Fallback to basic mail function
            $headers = $this->buildHeaders();
            
            // Use -f flag to set return path (sender address)
            // This helps prevent email servers from rewriting the from address
            $returnPath = '-f' . $this->from;
            
            $result = @mail(
                $this->to,
                $this->subject,
                $this->body,
                $headers,
                $returnPath
            );
            
            if ($result) {
                return true;
            } else {
                $this->error = 'Mail function failed. Try using SMTP configuration or contact your hosting provider.';
                return false;
            }
        } catch (Exception $e) {
            $this->error = 'Exception: ' . $e->getMessage();
            return false;
        }
    }
    
    private function sendViaSMTP() {
        try {
            // Create SMTP connection
            $socket = fsockopen($this->host, $this->port, $errno, $errstr, 10);
            
            if (!$socket) {
                $this->error = "Failed to connect to SMTP server: $errstr ($errno)";
                return false;
            }
            
            // Read server response
            $this->getResponse($socket);
            
            // Send EHLO command
            $this->sendCommand($socket, "EHLO localhost");
            
            // Start TLS if needed
            if ($this->encryption === 'tls') {
                $this->sendCommand($socket, "STARTTLS");
                stream_context_set_default([
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ]
                ]);
                stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
                $this->sendCommand($socket, "EHLO localhost");
            }
            
            // Authenticate
            $this->sendCommand($socket, "AUTH LOGIN");
            $this->sendCommand($socket, base64_encode($this->username));
            $this->sendCommand($socket, base64_encode($this->password));
            
            // Send email
            $this->sendCommand($socket, "MAIL FROM: <{$this->from}>");
            $this->sendCommand($socket, "RCPT TO: <{$this->to}>");
            $this->sendCommand($socket, "DATA");
            
            // Compose headers
            $headers = "From: {$this->fromName} <{$this->from}>\r\n";
            $headers .= "To: {$this->to}\r\n";
            if (!empty($this->replyTo)) {
                $headers .= "Reply-To: {$this->replyTo}\r\n";
            }
            $headers .= "Subject: {$this->subject}\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: " . ($this->isHTML ? "text/html" : "text/plain") . "; charset=UTF-8\r\n\r\n";
            
            // Send message
            $message = $headers . $this->body . "\r\n.\r\n";
            fputs($socket, $message);
            $this->getResponse($socket);
            
            // Close connection
            $this->sendCommand($socket, "QUIT");
            fclose($socket);
            
            return true;
        } catch (Exception $e) {
            $this->error = 'SMTP Error: ' . $e->getMessage();
            return false;
        }
    }
    
    private function sendCommand(&$socket, $command) {
        fputs($socket, $command . "\r\n");
        return $this->getResponse($socket);
    }
    
    private function getResponse(&$socket) {
        $response = '';
        while ($line = fgets($socket, 515)) {
            $response .= $line;
            if (substr($line, 3, 1) === ' ') {
                break;
            }
        }
        return $response;
    }
    
    private function buildHeaders() {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: " . ($this->isHTML ? "text/html" : "text/plain") . "; charset=UTF-8\r\n";
        $headers .= "From: " . $this->fromName . " <" . $this->from . ">\r\n";
        if (!empty($this->replyTo)) {
            $headers .= "Reply-To: " . $this->replyTo . "\r\n";
        }
        $headers .= "X-Mailer: Arishte-PHPMailer\r\n";
        return $headers;
    }
    
    public function ErrorInfo() {
        return $this->error;
    }
}
?>
