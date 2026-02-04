<?php

require_once __DIR__ . '/../vendor/autoload.php';

use EmailFramework\Mailer;
use EmailFramework\Transports\SmtpTransport;

// Create mailer with SMTP transport
$transport = new SmtpTransport('smtp.example.com', 587, 'user', 'pass');
$mailer = new Mailer();
$mailer->addTransport($transport);

// Create and send email
$email = $mailer->createEmail()
    ->from('sender@example.com', 'Sender Name')
    ->to('recipient@example.com', 'Recipient Name')
    ->subject('Test Email')
    ->text('This is a plain text email.')
    ->html('<h1>This is an HTML email</h1><p>With some content</p>');

try {
    $result = $mailer->send($email);
    
    if ($result->isSuccess()) {
        echo "✅ Email sent successfully!\n";
        echo "Message: " . $result->getMessage() . "\n";
    } else {
        echo "❌ Failed to send email\n";
        echo "Error: " . $result->getMessage() . "\n";
    }
} catch (Exception $e) {
    echo "❌ Exception: " . $e->getMessage() . "\n";
}