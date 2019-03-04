<?php

namespace Palmtree\WordPress\Mailer;

class Message
{
    /** @var string */
    private $to;
    /** @var array */
    private $cc = [];
    /** @var array */
    private $bcc = [];
    /** @var string */
    private $subject;
    /** @var string */
    private $body;
    /** @var bool */
    private $html;
    /** @var array */
    private $attachments = [];

    /**
     * Message constructor.
     *
     * @param string|array $to
     * @param string       $subject
     * @param bool         $html
     */
    public function __construct($to = null, $subject = null, $html = true)
    {
        $this->to      = $to;
        $this->subject = $subject;
        $this->html    = $html;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * If multiple recipients will receive the message an array should be used.
     * Example: array('receiver@domain.org', 'other@domain.org' => 'A name').
     *
     * If $name is passed and the first parameter is a string, this name will be
     * associated with the address.
     *
     * @param array|string $to
     * @param string|null  $name
     *
     * @return self
     */
    public function setTo($to, $name = null)
    {
        if (!\is_array($to) && $name !== null) {
            $to = [$to => $name];
        }

        $this->to = (array)$to;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     *
     * @return self
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     *
     * @return self
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    public function isHtml()
    {
        return $this->html;
    }

    /**
     * @param bool $html
     */
    public function setHtml($html)
    {
        $this->html = $html;
    }

    /**
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param string $attachment
     *
     * @return self
     */
    public function attach($attachment)
    {
        $this->attachments[] = $attachment;

        return $this;
    }

    /**
     * @return array
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * @return array
     */
    public function getBcc()
    {
        return $this->bcc;
    }

    /**
     * @param string $emailAddress
     *
     * @return self
     */
    public function addCc($emailAddress)
    {
        $this->cc[] = $emailAddress;

        return $this;
    }

    /**
     * @param string $emailAddress
     *
     * @return self
     */
    public function addBcc($emailAddress)
    {
        $this->bcc[] = $emailAddress;

        return $this;
    }
}
