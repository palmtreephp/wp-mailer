<?php

namespace Palmtree\WordPress\Mailer;

class Mailer
{
    /** @var string */
    private $from;
    /** @var array */
    private $bcc;

    /**
     * Mailer constructor.
     *
     * @param string $from
     * @param array  $bcc
     */
    public function __construct($from, $bcc = [])
    {
        $this->from = $from;
        $this->bcc  = (array)$bcc;
    }

    /**
     * @param Message $message
     *
     * @return bool
     */
    public function send(Message $message)
    {
        return wp_mail(
            $message->getTo(),
            $message->getSubject(),
            $message->getBody(),
            $this->buildHeaders($message),
            $message->getAttachments()
        );
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return array
     */
    public function getBcc()
    {
        return $this->bcc;
    }

    /**
     * @param Message $message
     *
     * @return array
     */
    private function buildHeaders(Message $message)
    {
        $headers = [];

        $headers[] = 'From: ' . $this->from;

        foreach (\array_unique($message->getCc()) as $cc) {
            $headers[] = "Cc: $cc";
        }

        foreach (\array_unique(\array_merge($this->bcc, $message->getBcc())) as $bcc) {
            $headers[] = "Bcc: $bcc";
        }

        if ($message->isHtml()) {
            $headers[] = 'Content-Type: text/html; charset=utf-8';
        } else {
            $headers[] = 'Content-Type: text/plain; charset=utf-8';
        }

        return $headers;
    }
}
