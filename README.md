# :palm_tree: WordPress Mailer

[![License](http://img.shields.io/packagist/l/palmtree/wp-mailer.svg)](LICENSE)
[![Travis](https://img.shields.io/travis/palmtreephp/wp-mailer.svg)](https://travis-ci.org/palmtreephp/wp-mailer)

Small OOP wrapper around `wp_mail()`.

## Requirements
* PHP >= 5.6

## Installation

Use composer to add the package to your dependencies:
```bash
composer require palmtree/wp-mailer
```

Create the Mailer service, usually using a DI container:

```php
<?php
use Palmtree\WordPress\Mailer\Mailer;

$mailer = new Mailer('website@example.org', ['bcc@example.org']);
```

## Usage

```php
<?php
use Palmtree\WordPress\Mailer\Message;

$message = new Message('to@example.org');

$message
    ->setSubject('Hello!')
    ->setBody('<p>Hey, this is an HTML email!</p>')
    ->addCc('cc@example.org')
    ->addBcc('anotherbcc@example.org');

$message->attach('/path/to/some/file.pdf');

if ($mailer->send($message)) {
    echo 'Sent!';
} else {
    echo 'Error sending';
}
```

## License

Released under the [MIT license](LICENSE)
