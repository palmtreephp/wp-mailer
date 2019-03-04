<?php

namespace Palmtree\WordPress\Mailer\Test;

use Palmtree\WordPress\Mailer\Mailer;
use Palmtree\WordPress\Mailer\Message;
use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function testHeaders()
    {
        $message = new Message();

        $message->setTo('to@example.org', 'Alice');
        $message->addBcc('bcc2@example.org');
        $message->addCc('Mr Example <cc@example.org>');

        $mailer = new Mailer('from@example.org', ['bcc@example.org']);

        $reflector    = new \ReflectionObject($mailer);
        $buildHeaders = $reflector->getMethod('buildHeaders');
        $buildHeaders->setAccessible(true);

        $headers = $buildHeaders->invoke($mailer, $message);

        $this->assertCount(5, $headers);
        $this->assertContains('From: from@example.org', $headers);
        $this->assertContains('Cc: Mr Example <cc@example.org>', $headers);
        $this->assertContains('Bcc: bcc@example.org', $headers);
        $this->assertContains('Bcc: bcc2@example.org', $headers);
        $this->assertContains('Content-Type: text/html; charset=utf-8', $headers);
    }
}
