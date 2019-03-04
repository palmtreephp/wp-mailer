<?php

namespace Palmtree\WordPress\Mailer\Test;

use Palmtree\WordPress\Mailer\Message;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    public function testSetTo()
    {
        $message = new Message();

        $message->setTo('alice@example.org', 'Alice');

        $this->assertEquals(['alice@example.org' => 'Alice'], $message->getTo());
    }
}
