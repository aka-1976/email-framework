# Email Framework

A simple and extensible email framework for PHP applications.

## Features

-   **Flexible Transports:** Send emails using various transport layers (e.g., Symfony Mailer for SMTP, Sendgrid, etc.).
-   **Email Queuing:** Asynchronously send emails using a queuing mechanism to improve application performance.
-   **Templating:** Create dynamic email content using simple string-based templates.

## Installation

You can install the package via Composer:

```bash
composer require your-vendor/email-framework
```

*(Note: Replace `your-vendor/email-framework` with the actual package name once published)*

## Usage

### Basic Usage

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use EmailFramework\Core\Email;
use EmailFramework\Core\Mailer;

$mailer = Mailer::fromDsn('null://null'); // Replace with your actual DSN, e.g., 'smtp://user:pass@host:port'

$email = new Email(
    'recipient@example.com',
    'sender@example.com',
    'Hello from EmailFramework!',
    'This is a test email sent using the EmailFramework.'
);

try {
    $mailer->send($email);
    echo "Email sent successfully!\n";
} catch (Exception $e) {
    echo "Error sending email: " . $e->getMessage() . "\n";
}
```

### With Queuing

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use EmailFramework\Core\Email;
use EmailFramework\Core\Mailer;
use EmailFramework\Queue\InMemoryQueue;
use EmailFramework\Queue\QueueableTransport;
use EmailFramework\Transports\SymfonyMailerTransport;
use Symfony\Component\Mailer\Mailer as SymfonyMailer;
use Symfony\Component\Mailer\Transport as SymfonyTransport;

$transport = new SymfonyMailerTransport(
    new SymfonyMailer(
        SymfonyTransport::fromDsn('null://null') // Replace with your actual DSN
    )
);
$queue = new InMemoryQueue(); // In a real application, this would be a persistent queue (e.g., Redis, database)
$queueableTransport = new QueueableTransport($transport, $queue);

$mailer = new Mailer($queueableTransport);

$email = new Email(
    'recipient@example.com',
    'sender@example.com',
    'Hello from EmailFramework!',
    'This is a test email sent using the EmailFramework with a queue.'
);

try {
    $mailer->send($email);
    echo "Email sent to queue successfully!\n";
} catch (Exception $e) {
    echo "Error sending email to queue: " . $e->getMessage() . "\n";
}

// In a real application, a separate worker process would consume messages from the queue.
// For this example, we'll just show the queued emails:
echo "Queued emails:\n";
print_r($queue->getQueue());
```

### With Templates

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use EmailFramework\Core\Mailer;
use EmailFramework\Templates\StringTemplate;
use EmailFramework\Templates\TemplatedEmail;

$mailer = Mailer::fromDsn('null://null'); // Replace with your actual DSN

$template = new StringTemplate('Hello, {{ name }}! Welcome to our service.');

$email = new TemplatedEmail(
    'recipient@example.com',
    'sender@example.com',
    'Welcome!',
    $template,
    ['name' => 'John Doe']
);

try {
    $mailer->send($email);
    echo "Email sent successfully!\n";
    echo "Email body: " . $email->getBody() . "\n";
} catch (Exception $e) {
    echo "Error sending email: " . $e->getMessage() . "\n";
}
```

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [LICENSE.md](LICENSE.md) for more information.
