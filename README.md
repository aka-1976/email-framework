# Email Framework

A modern PHP email framework with multiple transports, templating engines, and queue support.

## Features

- 🚀 Multiple transport support (SMTP, Mailgun, Postmark, AWS SES, Sendmail)
- 🎨 Template engines (Blade, Twig, Plain)
- 📦 Queue integration (Redis, Database, Sync)
- 📎 Attachment handling
- 📊 Comprehensive logging
- ✅ Full test coverage
- 🔧 Easy configuration

## Installation

```bash
composer require your-org/email-framework
```

## Quick Start

```php
use EmailFramework\Mailer;
use EmailFramework\Transports\SmtpTransport;

$transport = new SmtpTransport('smtp.example.com', 587, 'user', 'pass');
$mailer = new Mailer();
$mailer->addTransport($transport);

$email = $mailer->createEmail()
    ->from('sender@example.com', 'Sender')
    ->to('recipient@example.com', 'Recipient')
    ->subject('Hello World')
    ->text('This is a test email.')
    ->html('<h1>Hello World</h1><p>This is a test email.</p>');

$result = $mailer->send($email);
```

## Documentation

See the [examples](examples/) directory for more usage patterns.

## Testing

```bash
composer test
```

## License

MIT