<?php

namespace ZF2AWSAdapter\Ses\Message;

use ZF2AWSAdapter\Ses\Arrayable;
use ZF2AWSAdapter\Ses\Message\Body\Html;
use ZF2AWSAdapter\Ses\Message\Body\Text;
use ZF2AWSAdapter\Ses\Message\Body\BodyTypeInterface;

/**
 * Tranform the email parse data to email body message
 */
class Body implements Arrayable{
    
    /**
     * Html parse
     * @var \ZF2AWSAdapter\Email\Message\Body\Html
     */
    private $html = null;
    
    /**
     * Text parse
     * @var \ZF2AWSAdapter\Email\Message\Body\Text
     */
    private $text = null;
    
    /**
     *
     * @var \ZF2AWSAdapter\Email\Message\Body\BodyType
     */
    private $body = null ; 
    
    /**
     * Return The body in array form
     * @return array
     */
    public function toArray() {
        $array = [];
        if(!is_null($this->getHtml())){
            $array['Html'] = $this->getHtml()->toArray();
        }
        if(!is_null($this->getText())){
            $array['Text'] = $this->getText()->toArray();
        }
        if(!is_null($this->getBody())){
            $array[$this->getBody()->getType()] = $this->getBody()->toArray();
        }
        return $array;
    }
    
    /**
     * Get the Html parse email content
     * @return \ZF2AWSAdapter\Email\Message\Body\Html
     */
    public function getHtml() {
        return $this->html;
    }

    /**
     * Get the Text parse email content
     * @return \ZF2AWSAdapter\Email\Message\Body\Text
     */
    public function getText() {
        return $this->text;
    }

    /**
     * Set Html parse email content
     * @param \ZF2AWSAdapter\Email\Message\Body\Html $html
     * @return \ZF2AWSAdapter\Email\Message\Body
     */
    public function setHtml(Html $html) {
        $this->html = $html;
        return $this;
    }

    /**
     * Set Text parse email content
     * @param \ZF2AWSAdapter\Email\Message\Body\Text $text
     * @return \ZF2AWSAdapter\Email\Message\Body
     */
    public function setText(Text $text) {
        $this->text = $text;
        return $this;
    }
    
   /**
    * Return email body content parsed
    * @return array
    */
    public function getBody() {
        return $this->body;
    }

    /**
     * Set the email content parse
     * @param \ZF2AWSAdapter\Email\Message\Body\BodyTypeInterface $body
     * @return \ZF2AWSAdapter\Email\Message\Body
     */
    public function setBody(BodyTypeInterface $body) {
        $this->body = $body;
        return $this;
    }
}
