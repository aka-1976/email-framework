<?php

require_once __DIR__ . '/../vendor/autoload.php';

use EmailFramework\Core\Email;
use EmailFramework\Core\Mailer;

// Create a mailer using a DSN
// For example, for SMTP: 'smtp://user:pass@host:port'
// For this example, we'll use the null transport
$mailer = Mailer::fromDsn('null://null');

// Create an email
$email = new Email(
    'recipient@example.com',
    'sender@example.com',
    'Hello from EmailFramework!',
    'This is a test email sent using the EmailFramework.'
);

// Send the email
try {
    $mailer->send($email);
    echo "Email sent successfully!\n";
} catch (Exception $e) {
    echo "Error sending email: " . $e->getMessage() . "\n";
}
