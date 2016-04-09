<?php

namespace ZF2AWSAdapter\Ses\Message;

use ZF2AWSAdapter\Ses\Arrayable;
use ZF2AWSAdapter\Ses\Message\Body;
use ZF2AWSAdapter\Ses\Message\Subject;

/**
 * Build the email message with body and subject
 */
class Message implements Arrayable {

    /**
     * Email body
     * @var ZF2AWSAdapter\Email\Message\Body
     */
    private $body = null;

    /**
     * Email subject
     * @var ZF2AWSAdapter\Email\Message\Subject
     */
    private $subject = null;

    /**
     * Return the email message in array form
     * @return array
     */
    public function toArray() {
        $array = [];
        $array['Body'] = $this->getBody()->toArray();
        $array['Subject'] = $this->getSubject()->toArray();
        return $array;
    }

    
    /**
     * Return the email body
     * @return ZF2AWSAdapter\Email\Message\Body
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * Return the email subject
     * @return ZF2AWSAdapter\Email\Message\Subject
     */
    public function getSubject() {
        return $this->subject;
    }

    /**
     * Set the email body
     * @param \ZF2AWSAdapter\Email\Message\Body $body
     * @return \ZF2AWSAdapter\Ses\Message\Message
     */
    public function setBody(Body $body) {
        $this->body = $body;
        return $this;
    }

    /**
     * Set the email subject
     * @param \ZF2AWSAdapter\Email\Message\Subject $subject
     * @return \ZF2AWSAdapter\Ses\Message\Message
     */
    public function setSubject(Subject $subject) {
        $this->subject = $subject;
        return $this;
    }
}