<?php

require_once __DIR__ . '/../vendor/autoload.php';

use EmailFramework\Core\Mailer;
use EmailFramework\Templates\StringTemplate;
use EmailFramework\Templates\TemplatedEmail;

// Create a mailer
$mailer = Mailer::fromDsn('null://null');

// Create a template
$template = new StringTemplate('Hello, {{ name }}!');

// Create a templated email
$email = new TemplatedEmail(
    'recipient@example.com',
    'sender@example.com',
    'Hello from EmailFramework!',
    $template,
    ['name' => 'World']
);

// Send the email
try {
    $mailer->send($email);
    echo "Email sent successfully!\n";
    echo "Email body: " . $email->getBody() . "\n";
} catch (Exception $e) {
    echo "Error sending email: " . $e->getMessage() . "\n";
}
