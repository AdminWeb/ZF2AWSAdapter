<?php

namespace ZF2AWSAdapter\Ses;

use ZF2AWSAdapter\Ses\Arrayable;
use ZF2AWSAdapter\Ses\Message\Destination;
use ZF2AWSAdapter\Ses\Message\Message;
use InvalidArgumentException;
use Aws\Ses\SesClient;

/**
 * Build the email data
 */
class SimpleEmailBuilder implements Arrayable {

    /**
     * Email destinations
     * @var ZF2AWSAdapter\Email\Message\Destination 
     */
    private $destination = [];

    /**
     * Email message
     * @var ZF2AWSAdapter\Email\Message\Message 
     */
    private $message = null;

    /**
     * Email Reply To Address
     * @var array
     */
    private $ReplyToAddresses = [];

    /**
     * Return Path
     * @var string
     */
    private $ReturnPath = '';

    /**
     * Email source
     * @var string
     */
    private $Source = '';

    /**
     * Aws\Ses\SesClient
     * @var Aws\Ses\SesClient
     */
    private $ses = null;

    /**
     * Set email source and AWS SES Client
     * @param string $source
     * @throws InvalidArgumentException
     */
    public function __construct($source, SesClient $ses) {
        if (filter_var($source, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("{$source} is invalid e-mail");
        }
        $this->setSource($source);
        $this->setSes($ses);
    }

    /**
     * Return Email data
     * @return array
     */
    public function toArray() {
        $array = [];
        if (count($this->getDestination()->toArray()) > 0) {
            $array['Destination'] = $this->getDestination()->toArray();
        }
        $array['Message'] = $this->getMessage()->toArray();
        if (count($this->getReplyToAddresses()) > 0) {
            $array['ReplyToAddresses'] = $this->getReplyToAddresses();
        }
        if (strlen($this->getReturnPath()) > 0) {
            $array['ReturnPath'] = $this->getReturnPath();
        }
        $array['Source'] = $this->getSource();
        return $array;
    }

    /**
     * Reurn the destinations
     * @return \ZF2AWSAdapter\Ses\Message\Destination
     */
    public function getDestination() {
        return $this->destination;
    }

    /**
     * Return email message
     * @return \ZF2AWSAdapter\Ses\Message\Message
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * Return Reply To Address
     * @return array
     */
    public function getReplyToAddresses() {
        return $this->ReplyToAddresses;
    }

    /**
     * Return Return Path
     * @return string
     */
    public function getReturnPath() {
        return $this->ReturnPath;
    }

    /**
     * Return SES Source
     * @return string
     */
    public function getSource() {
        return $this->Source;
    }

    /**
     * Set Email destination
     * @param Destination $destination
     * @return \ZF2AWSAdapter\Ses\SimpleEmailBuilder
     */
    public function setDestination(Destination $destination) {
        $this->destination = $destination;
        return $this;
    }

    /**
     * Set email message
     * @param \ZF2AWSAdapter\Ses\Message\Message $message
     * @return \ZF2AWSAdapter\Ses\SimpleEmailBuilder
     */
    public function setMessage(Message $message) {
        $this->message = $message;
        return $this;
    }

    /**
     * 
     * @param type $ReplyToAddresses
     * @return \ZF2AWSAdapter\Ses\SimpleEmailBuilder
     */
    public function setReplyToAddresses($ReplyToAddresses) {
        $this->ReplyToAddresses = $ReplyToAddresses;
        return $this;
    }

    public function setReturnPath($ReturnPath) {
        $this->ReturnPath = $ReturnPath;
        return $this;
    }

    /**
     * Set source to send email from AWS SES
     * @param string $Source
     * @return \ZF2AWSAdapter\Ses\SimpleEmailBuilder
     */
    public function setSource($Source) {
        $this->Source = $Source;
        return $this;
    }

    /**
     * Return Aws\Ses\SesClient
     * @return Aws\Ses\SesClient
     */
    function getSes() {
        return $this->ses;
    }

    /**
     * Set Aws\Ses\SesClient
     * @param Aws\Ses\SesClient $ses
     */
    function setSes(SesClient $ses) {
        $this->ses = $ses;
    }

    /**
     * Send Email using SesClient
     * Return sent email results
     * @return array
     */
    public function sendEmail() {
     return  $this->getSes()->sendEmail($this->toArray());
    }

}
