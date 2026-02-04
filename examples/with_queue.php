<?php

require_once __DIR__ . '/../vendor/autoload.php';

use EmailFramework\Core\Email;
use EmailFramework\Core\Mailer;
use EmailFramework\Queue\InMemoryQueue;
use EmailFramework\Queue\QueueableTransport;
use EmailFramework\Transports\SymfonyMailerTransport;
use Symfony\Component\Mailer\Mailer as SymfonyMailer;
use Symfony\Component\Mailer\Transport as SymfonyTransport;

// Create a mailer with a queueable transport
$transport = new SymfonyMailerTransport(
    new SymfonyMailer(
        SymfonyTransport::fromDsn('null://null')
    )
);
$queue = new InMemoryQueue();
$queueableTransport = new QueueableTransport($transport, $queue);

$mailer = new Mailer($queueableTransport);

// Create an email
$email = new Email(
    'recipient@example.com',
    'sender@example.com',
    'Hello from EmailFramework!',
    'This is a test email sent using the EmailFramework with a queue.'
);

// Send the email (it will be queued)
try {
    $mailer->send($email);
    echo "Email sent to queue successfully!\n";
} catch (Exception $e) {
    echo "Error sending email to queue: " . $e->getMessage() . "\n";
}

// You can then have a separate process that processes the queue
// For this example, we'll just show the queued emails
$queuedEmails = $queue->getQueue();
echo "Queued emails:\n";
print_r($queuedEmails);
